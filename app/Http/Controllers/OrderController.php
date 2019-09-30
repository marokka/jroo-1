<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\OrderRequest;
use App\Models\Order\Order;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

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

    public function addOrder(OrderRequest $request, Payment $payment)
    {
        $order = $this->orderService->save($request);

        if ($order->pay_type == Order::TYPE_ONLINE) {
            return Redirect::away($this->orderService->setValuesForPayment($order, $payment));
        }

        return redirect()->route('complete', $order->id);
    }

    public function webhook(Request $request)
    {
        $order = Order::findOrFail($request->all('InvId'));

        Log::info("Информация об оплате", $request->all());
    }
}
