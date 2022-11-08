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
        Schema::create('news_categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('news_id')->required();
            $table->bigInteger('category_id')->required();
            $table->bigInteger('subcategory_id')->nullable();
            $table->bigInteger('subcategory_parametr_id')->nullable();
            $table->timestamps();
        });

        DB::table('news_categories')->insert([
            'news_id' => 1,
            'category_id' => 2,
            'subcategory_id' => 2,
            'subcategory_parametr_id' => 1,
        ]);

        DB::table('news_categories')->insert([
            'news_id' => 1,
            'category_id' => 1,
            'subcategory_id' => 2,
        ]);

        DB::table('news_categories')->insert([
            'news_id' => 1,
            'category_id' => 3,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_categories');
    }
};
