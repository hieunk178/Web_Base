<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\CategoryProduct;
use App\Models\ExcelSetting;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductImport implements ToModel, WithStartRow
{
    private $excelSetting;
    public function __construct()
    {
        $this->excelSetting = ExcelSetting::get()->pluck('value', 'key')->toArray();
    }
    public function model(array $row)
    {
        $category = CategoryProduct::where('name', $row[$this->excelSetting['cat_id']] )->first();
        if ($category) {
            $catId = $category->id;
        }else {
            $category = CategoryProduct::create([
                'name' => $row[$this->excelSetting['cat_id']],
            ]);
            $catId = $category->id;
        }
        $brand = Brand::where('name', $row[$this->excelSetting['brand_id']])->first();
        if ($brand) {
            $brandId = $brand->id;
        } else {
            $brand = Brand::create([
                'name' => $row[$this->excelSetting['brand_id']],
            ]);
            $brandId = $brand->id;
        }
        $product = Product::where('product_code', $row[$this->excelSetting['product_code']])->first();
        if ($product) {
            return;
        }
        return new Product([
            'product_code' => $row[$this->excelSetting['product_code']],
            'name' => $row[$this->excelSetting['name']],
            'description' => $row[$this->excelSetting['description']],
            'price' => $row[$this->excelSetting['price']],
            'new_price' => $row[$this->excelSetting['new_price']],
            'quantity' => $row[$this->excelSetting['quantity']],
            'image' => $row[$this->excelSetting['image']],
            'product_detail' => $row[$this->excelSetting['product_detail']],
            'cat_id' => $catId,
            'brand_id' => $brandId,
        ]);
    }

    public function startRow(): int
    {
        return $this->excelSetting['start_row'];
    }
}
