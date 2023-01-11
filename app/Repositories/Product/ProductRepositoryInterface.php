<?php

namespace App\Repositories\Product;

interface ProductRepositoryInterface 
{
    public function getAllProduct($search);
    public function getProductActive($search);
    public function getProductRemove($search);
    public function createProduct($search);
    public function updateProduct($search);
    public function deleteProduct($search);
    public function count();
    public function total();
}