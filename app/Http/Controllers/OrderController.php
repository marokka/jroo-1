<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\OrderRequest;
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

        return redirect()->route('complete', $order->id);
    }
}
