<?php

declare(strict_types=1);

namespace App\Services\Cart;


use App\Http\Requests\Cart\CartRequest;
use App\Models\Food\FoodProperty;
use App\Repositories\Cart\CartRepository;
use Illuminate\Support\Facades\Cookie;
use App\Models\Cart\Cart;
use Illuminate\Support\Facades\Session;

class CartService
{
    /**
     * @var CartRepository
     */
    private $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function save(CartRequest $request): Cart
    {
        // Required data
        $session        = $request->session()->get(Cart::SESSION_KEY);
        $foodPropertyId = $request->get('foodPropertyId');
        $foodProperty   = FoodProperty::findOrFail($foodPropertyId);

        $cart = Cart::where(Cart::ATTR_SESSION, $session)->first();

        if (null == $cart) {
            $cart = $this->cartRepository->store($session, 0);
            $this->cartRepository->setProperty($cart->id, $foodProperty->id, (int)$foodProperty->price);
            return $cart;
        }

        $this->cartRepository->setProperty($cart->id, $foodProperty->id, (int)$foodProperty->price);

        return $cart;
    }
}
