<?php

namespace App\Repositories\Cart;

use App\Models\ShoppingCart;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CartRepository
{
    private $cart;
    public function __construct(ShoppingCart $cart)
    {
        $this->$cart = $cart;
    }
    //API
    public function addToCart(Request $request){
        $this->cart->create([
            'product_id'=> $request->id,
            'user_id'=> Auth::id(),
            'quantity'=> $request->quantity ? $request->quantity : 1
        ]);
    }
}
