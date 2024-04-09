<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('category_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',200)->unique();
            $table->text('description', 500)->nullable();
            $table->string('image',255)->nullable();
            $table->unsignedInteger('id_parent')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_products');
    }
};
