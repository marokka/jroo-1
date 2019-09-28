<?php

namespace App\Observers;

use App\Models\Order\Order;
use App\Repositories\Order\OrderRepository;
use App\Services\Tillypad\TillypadService;
use GuzzleHttp\Client;

class OrderObserver
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var TillypadService
     */
    private $tillypadService;

    public function __construct(OrderRepository $orderRepository, TillypadService $tillypadService)
    {
        $this->orderRepository = $orderRepository;
        $this->tillypadService = $tillypadService;
    }

    /**
     * Handle the order "created" event.
     *
     * @param  \App\Models\Order\Order $order
     * @return void
     */
    public function created(Order $order)
    {
        if (true !== env('APP_DEBUG')) {
            $json = [];

            $orderClient = $this->tillypadService->getClient($order);

            $properties = $this->orderRepository->getOrderProperties($order->cart_id);

            foreach ($properties as $key => $property) {
                $json[] = [
                    "clnt_id"       => $orderClient[0]['clnt_ID'],
                    "mitm_ID"       => $property->mitm_id,
                    "mitm_value"    => "1",
                    "mitm_count"    => $property->quantity,
                    "delivery_type" => "1",
                    "gest_Phone"    => $order->phone,
                    "City"          => 'Ялта',
                    "Street"        => $order->address,
                    "House"         => $order->home,
                    "Building"      => "",
                    "Apartment"     => "",
                    "Entrance"      => $order->porch,
                    "Floor"         => $order->floor,
                    "Intercom"      => "",
                    "Comment"       => $order->comment,
                    "gest_comment"  => "",
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

        }
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
