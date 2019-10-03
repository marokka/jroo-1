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
        if ($order::TYPE_CASH === (int) $order->pay_type) {
            $properties = $this->orderRepository->getOrderProperties($order->cart_id)->toArray();

            $this->tillypadService->sendingOrderToTillypad($order, $properties);
            session()->regenerate();
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
        if ($order::TYPE_ONLINE === $order->pay_type) {
            $properties = $this->orderRepository->getOrderProperties($order->cart_id);
            $this->tillypadService->sendingOrderToTillypad($order, $properties);
            session()->regenerate();
        }
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
