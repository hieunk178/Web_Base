<?php
namespace App\Http\Controllers;

class ProductCategoryController extends Controller
{

    public function __invoke($slug = null)
    {
        $title = app('proxy')->getOptionByKey('title');
        $description = app('proxy')->getOptionByKey('description');
        $imageShareUrl = app('proxy')->getOptionByKey('image');
        $categories = app('proxy')->getCategory(true);
        $category = app('proxy')->getCategoryBySlug($slug);
        $products = [];
        if ($category)
        {
            $products = app('proxy')->getProducts(
                catId: [$category->id, ...$category->children()->pluck('id')->toArray()],
                limit: 12,
                orderBy: [
                    'condition' => 'id',
                    'value' => 'desc',
                ]

            );
        }
        return view('product-category', compact('title', 'description', 'imageShareUrl', 'categories', 'products', 'category'));
    }
}
