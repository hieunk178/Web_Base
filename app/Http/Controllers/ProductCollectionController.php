<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductCollectionController extends Controller
{
    public function __invoke(Request $request)
    {
        $title = app('proxy')->getOptionByKey('title');
        $description = app('proxy')->getOptionByKey('description');
        $imageShareUrl = app('proxy')->getOptionByKey('image');
        $categories = app('proxy')->getCategory(true);
        if ($request->orderBy) {
            $orderBy = [
                'condition' => 'price',
                'value' => $request->orderBy
            ];
        }else {
            $orderBy = [
                'condition' => 'id',
                'value' => 'DESC'
            ];
        }
        $products = app('proxy')->getProducts(
            limit: $request->limit ?? 12,
            orderBy: $orderBy,
        );
        return view('product-category', compact('title', 'description', 'imageShareUrl', 'categories', 'products'));
    }
}
