<?php

namespace App\Http\Controllers;

class ProductDetailController extends Controller
{
    public function __invoke($slug)
    {
        $title = app('proxy')->getOptionByKey('title');
        $description = app('proxy')->getOptionByKey('description');
        $imageShareUrl = app('proxy')->getOptionByKey('image');
        $product = app('proxy')->getProductBySlug($slug);
        $catId = null;
        if ($product->category->count() > 0) {
            $catId = [$product->category->id, ...$product->category->children()->pluck('id')->toArray()];
        }
        $relatedProduct = app('proxy')->getProducts(
            catId: $catId,
            orderBy: [
                'condition' => 'id',
                'value' => 'DESC',
            ],
            limit: 8
        );
        return view('product-detail', compact('title', 'description', 'imageShareUrl', 'product', 'relatedProduct'));
    }
}
