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
        if (!Schema::hasColumn('category_products', 'slug')) {
            Schema::table('category_products', function (Blueprint $table) {
                $table->string('slug')->nullable()->after('id');
            });
        } else {
            Schema::table('category_products', function (Blueprint $table) {
                $table->string('slug')->nullable()->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_products', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
