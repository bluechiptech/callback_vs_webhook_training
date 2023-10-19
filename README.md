# CALLBACK URL VS WEBHOOK NOTIFICATION

## INTRODUCTION
```Callback URL``` and ```Webhook Notifications``` are both methods for handling real-time or near-real-time data exchange and event notifications in web development and API integrations. 

However, ```Callback URL``` can further be used in SDK implementation. ```Callback URL``` are also sometimes referred to as ```Redirect URL```

## HISTORY/ORIGIN
```Callback URL``` has been around for a long time in web development. It is rooted in the early days of the internet when web applications started to interact with external services and needed a way to receive responses. 

```Webhook Notifications``` became more popular in the mid-2000s. The term "webhook" is relatively recent and signifies a specific design pattern that emerged as web applications required a more efficient way to handle real-time notifications.

## SIMILARITIES
* Both callback URLs and webhooks are used for real-time or near-real-time communication.
* They both rely on HTTP and URLs to facilitate communication.

## DIFFERENCES
1. Purpose:
    * Callback URLs are primarily used for providing a response to a specific request, while webhooks are used for real-time event-driven notifications.
2. Request Direction:
    * Callback URLs involve responses initiated by a client, whereas webhooks involve server-initiated data pushes to a client.
3. Usage Pattern:
    * Callback URLs are often used for one-time interactions, whereas webhooks facilitate ongoing, asynchronous communication.
4. Configuration:
    * Callback URLs are provided by the client as part of a request, whereas webhooks require the client to provide a URL that the server uses to push data.
5. State:
    * Callback URLs are typically stateless, whereas webhooks can be stateful, allowing the server to maintain context related to the subscription and events.
6. Delivery Guarantees:
    * Webhooks often employ mechanisms like retries and acknowledgments for reliable delivery, whereas the delivery of callback URL responses relies on the client's repeated requests or retries.

## USE CASES/APPLICATION
1. Callback URLs are majorly used in the following fields:
    * OAuth2 authorization callbacks.
    * Payment gateway responses.
    * API endpoints that provide one-time responses to client requests.
2. Webhook Notification:
    * Real-time notifications for new emails.
    * Order processing notifications.
    * Updating content or data in response to external events.


## ABOUT THE PRACTICAL APPLICATION
The application example to explain the simple usage of ```Callback URL``` and ```Webhook Notifications``` can be found in the ```client``` directory. This is a LARAVEL (PHP) application.

### HOW TO SETUP THE PRACTICAL APPLICATION
1.  Ensure that you have PHP >= 8.1 and composer installed on your machine.
2. Clone this repository 
```
git clone https://github.com/bluechiptech/callback_vs_webhook_training.git
```
3. CD into the `client` directory
4. Run the following commands line by line
```php
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```
5. Ensure that the env parameters are set.
6. For webhook to successfully work, use a tunneling service to route your localhost to the internet and provide the full webhook url to remote server (or service provider)