<?php
namespace App\Services;

use App\Models\Brand;
use App\Models\CategoryProduct;
use App\Models\Option;
use App\Models\Product;
use App\Models\Slider;

class ProxyService
{
    public function __construct()
    {
        //
    }

    public function getOptionByKey($key)
    {
        $option = Option::where('key', $key)->first();
        if ($option) {
            $option = $option->value;
        }
        return $option;
    }

    public function getProductNew($limit, $orderBy)
    {
        return Product::where('status', 1)->orderBy('id', $orderBy)->limit($limit)->get();
    }

    public function getSlide()
    {
        return Slider::get();
    }

    public function getCategory($nested = false)
    {
        $query = CategoryProduct::query();
        if ($nested) {
            $query->with(['children'])->where('id_parent', 0);
        }
        return $query->get();
    }

    public function getCategoryBySlug($slug)
    {
        return CategoryProduct::where('slug', $slug)->firstOrFail();
    }

    public function getProducts($catId = null, $limit = -1, $orderBy = null, $keyWord = "")
    {
        $query = Product::query();
        if (strlen($keyWord) > 0) {
            $query->where('name', 'like', '%' . $keyWord . '%');
        }
        if ($catId != null) {
            $query->whereIn('cat_id', $catId);
        }
        if ($orderBy != null) {
            $query->orderBy($orderBy['condition'], $orderBy['value']);
        }

        return $query->paginate($limit);
    }

    public function getProductBySlug($slug)
    {
        return Product::where('slug', $slug)->firstOrFail();
    }

    public function getBrands()
    {
        return Brand::get();
    }
}
