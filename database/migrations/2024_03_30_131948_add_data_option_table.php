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
                "key" => "iframe",
                "name" => "Nhúng iframe",
                "type" => "textarea",
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
        Option::where('key', 'iframe')->delete();
    }
};
