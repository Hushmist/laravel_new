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
        Schema::create('subcategory_parameters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('subcategory_id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('subcategory_parameters')->insert([
            'subcategory_id' => 4,
            'name' => '0-3 года'
        ]);
        
        DB::table('subcategory_parameters')->insert([
            'subcategory_id' => 4,
            'name' => '3-7 года'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategory_parameters');
    }
};
