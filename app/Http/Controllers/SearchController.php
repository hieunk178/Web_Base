<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $products = app('proxy')->getProducts(
            keyWord: $request->keyWord,
            limit: 12,
            orderBy: [
                'condition' => 'id',
                'value' => 'DESC'
            ],
        );
        return view('search-page', compact('products'));
    }
}
