<?php

use App\Models\Option;
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
        Option::insert([
            [
                "key" => "logo",
                "name" => "Logo website",
                "type" => "file",
            ],
            [
                "key" => "favicon",
                "name" => "Favicon website",
                "type" => "file",
            ],
            [
                "key" => "title",
                "name" => "Tiêu đề website",
                "type" => "text",
            ],
            [
                "key" => "description",
                "name" => "Mô tả website",
                "type" => "text",
            ],
            [
                "key" => "image",
                "name" => "Hình ảnh khi chia sẻ",
                "type" => "file",
            ],
            [
                "key" => "phone",
                "name" => "Số điện thoại liên hệ",
                "type" => "text",
            ],
            [
                "key" => "address",
                "name" => "Địa chỉ liên hệ",
                "type" => "text",
            ],
            [
                "key" => "email",
                "name" => "Địa chỉ email",
                "type" => "text",
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
