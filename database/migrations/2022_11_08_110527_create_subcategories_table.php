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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->required();
            $table->string('name')->required();
            $table->timestamps();
        });

        DB::table('subcategories')->insert([
            'category_id' => 1,
            'name' => 'городская жизнь'
        ]);

        DB::table('subcategories')->insert([
            'category_id' => 1,
            'name' => 'выборы'
        ]);
        
        DB::table('subcategories')->insert([
            'category_id' => 2,
            'name' => 'салюты'
        ]);
        
        DB::table('subcategories')->insert([
            'category_id' => 2,
            'name' => 'детская площадка'
        ]);
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategories');
    }
};
