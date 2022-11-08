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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->required();
            $table->timestamps();
        });

        DB::table('categories')->insert([
            'name' => 'Общество'
        ]);

        DB::table('categories')->insert([
            'name' => 'День города'
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Спорт'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
