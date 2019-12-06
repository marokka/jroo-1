<?php

namespace App\Services\Telegram;


use App\Models\Order\Order;
use GuzzleHttp\Client;

class TelegramService
{
    public function sendToTelegram(Order $order)
    {

        $client  = new Client([
            'http_errors' => false
        ]);

        $response = $client->post('http://limitless-journey-95386.herokuapp.com/public/jroo/?text=' . "https://dostavka-jroo.com/order/" . $order->id);

    }
}
