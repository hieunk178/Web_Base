<?php

namespace App\Repositories\Brand;

interface BrandRepositoryInterface 
{
    public function find($id);
    public function getAll();
    public function createBrand($search);
    public function updateBrand($search);
    public function deleteBrand($search);
    public function total();
}