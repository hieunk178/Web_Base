<?php

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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_code')->unique();
            $table->string('name',200)->unique();
            $table->text('short_des', 500)->nullable();
            $table->unsignedInteger('price')->unique();
            $table->unsignedInteger('new_price')->nullable();
            $table->unsignedInteger('quantity')->unique();
            $table->string('image',255)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('cat_id')->unique();
            $table->unsignedInteger('brand_id')->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cat_id')->references('id')->on('category_products');
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
