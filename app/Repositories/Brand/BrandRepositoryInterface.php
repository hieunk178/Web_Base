<?php

namespace App\Repositories\Brand;

interface BrandRepositoryInterface 
{
    public function find($id);
    public function getAll();
    public function createBrand($search);
    public function edit($id);
    public function updateBrand($search);
    public function deleteBrand($search);
    public function getBrandName();
    public function total();
}