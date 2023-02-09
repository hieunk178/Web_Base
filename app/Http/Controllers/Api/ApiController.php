<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Slider\SliderRepository;
use App\Repositories\CategoryProduct\CategoryRepository;
use Exception;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $productRepo;
    private $sliderRepo;
    private $catRepo;
    public function __construct(ProductRepositoryInterface $productRepo, SliderRepository $sliderRepo, CategoryRepository $catRepo)
    {
        $this->productRepo = $productRepo;
        $this->sliderRepo = $sliderRepo;
        $this->catRepo = $catRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index(){
        $sliders = $this->sliderRepo->getAllSlider();
        $sellingProducts = $this->productRepo->getSellingProducts();
        $products = $this->productRepo->getProductByCategory();
        return response()->json(
            [
                "sliders" => $sliders,
                "selling_products" => $sellingProducts,
                "products" => $products,
                "status" => 200,
                "message" => "OK"
            ]
        );
    }
    
    public function getCatMenu(){
        $data = $this->catRepo->getCatMenu();
        return response()->json(
            [
                "CatMenu" => $data
            ]
        );
    }

    public function productDetail($id){
        $product = $this->productRepo->find($id);
        return response()->json([
            "product"=> $product,
        ]);
    }

    public function sameCategory($cat_id){
        $products = $this->productRepo->getProductByCatId($cat_id);
        return response()->json([
            'products' => $products
        ]);
    }
    public function productAll(Request $request){
        $products = \DB::table('products')
        ->select('id', 'name', 'image', 'price', 'new_price')
        ->paginate(16);
        $categorys = \DB::table('category_products')
        ->select('id', 'name')
        ->get();
        $brands = \DB::table('brands')
        ->select('id', 'name')
        ->get();
        return response()->json([
            'categorys' => $categorys,
            'brands' => $brands,
            'products' => $products

        ]);
    }
}
