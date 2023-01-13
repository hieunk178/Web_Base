<?php

namespace App\Repositories\Brand;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Repositories\Brand\BrandRepositoryInterface;
use App\Models\Brand;
use GuzzleHttp\Psr7\Request;

class BrandRepository implements BrandRepositoryInterface 
{
    private Brand $Brand;
    public function __construct(Brand $Brand) 
    {
        $this->Brand = $Brand;
    }
    public function find($id)
    {
        $result = $this->Brand->find($id);
        return $result;
    }
    public function getAll()
    {
        return $this->Brand->paginate(15);
    }
    public function createBrand($Brand){
        return $this->Brand->create($Brand);
    }
    public function updateBrand($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }
    public function deleteBrand($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->forceDelete();
            return true;
        }

        return false;
    }
    public function total(){
        return $this->Brand->total();
    }
}