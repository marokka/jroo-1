<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\OrderRequest;
use App\Models\Order\Order;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * @var OrderService
     */
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function addOrder(OrderRequest $request)
    {
        $order = $this->orderService->save($request);

        if($order->pay_type == Order::TYPE_ONLINE) {

            $this->orderService->pay($order);
        }

        //return redirect()->route('complete', $order->id);
    }
}
