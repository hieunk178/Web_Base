<?php

namespace App\Repositories\Product;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Models\Product;
use GuzzleHttp\Psr7\Request;

class ProductRepository implements ProductRepositoryInterface 
{
    private Product $product;
    public function __construct(Product $product) 
    {
        $this->product = $product;
    }

    public function count(){
        $count = [];
        $count['all_pro'] = $this->product->withTrashed()->count();
        $count['pro_active'] = $this->product->all()->count();
        $count['pro_remove'] = $this->product->onlyTrashed()->count();
        return $count;
    }

    public function find($id)
    {
        $result = $this->product->withTrashed()->find($id);

        return $result;
    }
    public function getAllProduct($search)
    {
        return $this->product->withTrashed()->where('name', 'LIKE', "%{$search}%")->paginate(15);
    }
    public function getProductActive($search)
    {
        return $this->product->where('name', 'LIKE', "%{$search}%")->paginate(15);
    }
    public function getProductRemove($search)
    {
        return $this->product->onlyTrashed()->where('name', 'LIKE', "%{$search}%")->paginate(15);
    }
    public function createProduct($product){
        return $this->product->create($product);
    }
    public function updateProduct($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function removeProduct($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
    public function restoreProduct($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->restore();

            return true;
        }

        return false;
    }
    

    public function deleteProduct($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->forceDelete();
            return true;
        }

        return false;
    }
    public function total(){
        return $this->product->total();
    }
}