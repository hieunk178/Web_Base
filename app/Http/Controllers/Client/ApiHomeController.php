<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
class ApiHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $apiRepo;
    public function __construct(ProductRepositoryInterface $apiRepo)
    {
        $this->apiRepo = $apiRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = $this->apiRepo->getProduct('','');  
        return response()->json(
            [
                "products"=> $products,
            ]
        );
    }
}
