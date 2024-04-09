<?php
namespace App\Http\Controllers;

use App\Repositories\CategoryProduct\CategoryRepositoryInterface;

class HomeController extends Controller
{
    public function __invoke()
    {
        $title = app('proxy')->getOptionByKey('title');
        $description = app('proxy')->getOptionByKey('description');
        $imageShareUrl = app('proxy')->getOptionByKey('image');
        $slide = app('proxy')->getSlide();
        $productNew = app('proxy')->getProductNew(6, 'desc');
        $categories = app('proxy')->getCategory();
        foreach ($categories as $category) {
            $category->products = app('proxy')->getProducts(catId: [$category->id], limit: 8, orderBy: ['condition' => 'id', 'value' => 'desc']);
        }
        $brands = app('proxy')->getBrands();
        return view('home-page', compact('title', 'description', 'imageShareUrl', 'productNew', 'slide', 'categories', 'brands'));
    }
}
