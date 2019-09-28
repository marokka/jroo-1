<?php
/**
 * Created by PhpStorm.
 * User: aushev
 * Date: 15.09.2019
 * Time: 17:44
 */

namespace App\Services\Order;


use App\Http\Requests\Order\OrderRequest;
use App\Models\Cart\Cart;
use App\Models\Order\Order;
use App\Repositories\Order\OrderRepository;
use Illuminate\Support\Facades\Session;

class OrderService
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
     * @param OrderRequest $request
     * @return Order
     * @throws \Exception
     */
    public function save(OrderRequest $request)
    {
        try {
            $cart                  = Cart::where(Cart::ATTR_SESSION, Session::get(Cart::SESSION_KEY))->first();
            $attributes            = $request->all([
                Order::ATTR_NAME,
                Order::ATTR_PHONE,
                Order::ATTR_ADDRESS,
                Order::ATTR_COMMENT,
                Order::ATTR_PAY_TYPE,
            ]);
            $attributes['cart_id'] = $cart->id;
            $attributes['total']   = $cart->total;

            $order = $this->orderRepository->store($attributes);
            //$cart->delete();
            return $order;
        } catch (\Throwable $exception) {
            throw new \Exception('Возникла непридвиденная ошибка');
        }

    }

    public function pay(Order $order)
    {
        $mrh_login = env('DEMO_MRH_LOGIN');
        $mrh_pass1 = env('DEMO_MRH_PASSWORD');
        $inv_id    = $order->id;
        $inv_desc  = "Техническая документация по ROBOKASSA";
        $out_summ  = $order->total;
        $crc       = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1");
        print "<html><script language=JavaScript " .
            "src='https://auth.robokassa.ru/Merchant/PaymentForm/FormMS.js?" .
            "MerchantLogin=$mrh_login&OutSum=$out_summ&InvoiceID=$inv_id" .
            "&Description=$inv_desc&SignatureValue=$crc&isTest=1'></script></html>";

    }
}
