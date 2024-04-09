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
            $table->string('name',200);
            $table->text('description', 500)->nullable();
            $table->unsignedInteger('price');
            $table->unsignedInteger('new_price');
            $table->unsignedInteger('quantity');
            $table->string('image',255)->nullable();
            $table->text('product_detail')->nullable();
            $table->unsignedInteger('cat_id');
            $table->unsignedInteger('brand_id');
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
