<?php

namespace App\Repositories\Product;

interface ProductRepositoryInterface 
{
    public function getProduct($where, $search);
    public function createProduct($product);
    public function updateProduct($productId);
    public function deleteProduct($productId);
    public function count();
    public function total();
    public function getCatProductName();
    public function getBrandName();
    public function find($id);
    public function findByCode($code);
    public function getProductByCatId($id);
    public function getProductByCategory();
    public function getSellingProducts();
    public function removeProduct($id);
    public function restoreProduct($id);

}