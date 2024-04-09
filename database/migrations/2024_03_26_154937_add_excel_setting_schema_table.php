<?php

use App\Models\ExcelSetting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ExcelSetting::insert([
            [
                "key" => "product_code",
                "name" => "Mã sản phẩm",
            ],
            [
                "key" => "name",
                "name" => "Tên sản phẩm",
            ],
            [
                "key" => "description",
                "name" => "Mô tả sản phẩm",
            ],
            [
                "key" => "price",
                "name" => "Giá sản phẩm",
            ],
            [
                "key" => "new_price",
                "name" => "Giá mới",
            ],
            [
                "key" => "quantity",
                "name" => "Số lượng",
            ],
            [
                "key" => "image",
                "name" => "Hình ảnh sản phẩm",
            ],
            [
                "key" => "product_detail",
                "name" => "Chi tiết sản phẩm",
            ],
            [
                "key" => "cat_id",
                "name" => "Danh mục",
            ],
            [
                "key" => "brand_id",
                "name" => "Thương hiệu",
            ],
            [
                "key" => "start_row",
                "name" => "Dòng bắt đầu",
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
