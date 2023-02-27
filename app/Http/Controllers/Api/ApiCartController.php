<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\Cart\CartRepository;


class ApiCartController extends Controller
{
    protected $cartRepo;
    public  function __construct(CartRepository $cartRepo)
    {
        $this->cartRepo = $cartRepo;
    }
    public function addToCart(Request $request){
        $this->cartRepo->addToCart($request);
    }

}
