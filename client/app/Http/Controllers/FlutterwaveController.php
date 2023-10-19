<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FlutterwaveController extends Controller
{
    public function makePayment(Request $request) {
        $payload = [
            "tx_ref" => time(),
            "amount" => "100",
            "currency" => "NGN",
            "redirect_url" => env("TUNNEL_URL") . "/flutterwave/callback",
            "meta" => [
                "consumer_id" => 23,
                "consumer_mac" => "92a3-912ba-1192a"
            ],
            "customer" => [
                "email" => "user@gmail.com",
                "phonenumber" => "080****4528",
                "name" => "Yemi Desola"
            ],
            "customizations" => [
                "title" => "Pied Piper Payments",
                "logo" => "http://www.piedpiper.com/app/themes/joystick-v27/images/logo.png",
            ]
        ];

        $response = Http::withToken(env('FLUTTERWAVE_SECRET_KEY', ""))->post('https://api.flutterwave.com/v3/payments', $payload);

        if($response->status() == 200) {
            // dd($response->body());
            return redirect($response->json()['data']['link']);
        } else {
            $body = $response->json();
            $message = isset($body['message']) ? "Payment initialization failed. Error: " .$body['message'] : "Payment initialization failed";
            dd($message);
        }
    }

    public function callback(Request $request) {
        Log::info("Flutterwave callback request received. Payload: " . json_encode($request->all()));

        //TODO: Process transaction - 1. Validate payment, 2. Update payment status, 3. Release Value, 4. Send notification

        // dd("Callback URL called with payload: " . json_encode($request->all()));

        return response()->json(["message" => "Payment processed successfully", "data" => $request->all()]);
    }

    public function webhook(Request $request) {
        Log::info("Flutterwave Webhook request received. Payload: " . json_encode($request->all()));

        //TODO: Process transaction - 1. Validate payment, 2. Update payment status, 3. Release Value, 4. Send notification

        return response()->json([], 200);
    }
}
