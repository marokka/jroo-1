<?php

namespace App\Observers;

use App\Models\Order\Order;
use App\Repositories\Order\OrderRepository;
use GuzzleHttp\Client;

class OrderObserver
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Handle the order "created" event.
     *
     * @param  \App\Models\Order\Order $order
     * @return void
     */
    public function created(Order $order)
    {
        $json = [];


        $properties = $this->orderRepository->getOrderProperties($order->cart_id);

        foreach ($properties as $key => $property) {
            $json[] = [
                "clnt_id"       => "2743C52E-D523-49F8-8B8B-91D7AF88A8BF",
                "mitm_ID"       => $property->mitm_id,
                "mitm_value"    => "1",
                "mitm_count"    => $property->quantity,
                "delivery_type" => "1",
                "gest_Phone"    => "9876543210",
                "City"          => "2",
                "Street"        => "2",
                "House"         => "1",
                "Building"      => "1",
                "Apartment"     => "1",
                "Entrance"      => "1",
                "Floor"         => "1",
                "Intercom"      => "1",
                "Comment"       => "1",
                "gest_comment"  => "Тестовый заказ с сайта",
                "RegionCode"    => "1",
                "PostCode"      => "1"
            ];
        }
        $client = new Client([
            'http_error' => false
        ]);

        $response = $client->post('https://api.tillypad.online/_v1.0/Request.php', [
            'headers' => [
                'Authorization' => env('TILLYPAD_TOKEN'),
                'Content-Type'  => 'application/json',
                'Target'        => 'Delivery',
            ],

            'body' => json_encode($json),
        ]);

        dd($response->getStatusCode(), json_decode($response->getBody()->getContents()));

    }

    /**
     * Handle the order "updated" event.
     *
     * @param  \App\Models\Order\Order $order
     * @return void
     */
    public function updated(Order $order)
    {
        //
    }

    /**
     * Handle the order "deleted" event.
     *
     * @param  \App\Models\Order\Order $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the order "restored" event.
     *
     * @param  \App\Models\Order\Order $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the order "force deleted" event.
     *
     * @param  \App\Models\Order\Order $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
