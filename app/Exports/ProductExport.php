<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }

    public function headings(): array {
        return [
            'Code',
            'Tên sản phẩm',
            'Mô tả',
            "Giá",
            "Giá khuyến mãi",
            "Số lượng",
            "Hình ảnh sản phẩm",
            "Chi tiết sản phẩm",
            "Danh mục",
            "Thương hiệu"

        ];
    }

    public function map($product): array {
        return [
            $product->product_code,
            $product->name,
            $product->desctiption,
            $product->price,
            $product->new_price,
            $product->quantity,
            $product->image,
            $product->product_detail,
            $product->category->name,
            $product->brand->name,
        ];
    }
}
