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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->required();
            $table->string('preview')->nullable();
            $table->longText('text')->nullable();
            $table->bigInteger('author_id')->required();
            $table->timestamps();
        });

        DB::table('news')->insert([
            'title' => 'author 1',
            'preview' => 'Author@gmail.com',
            'text' => 'img/ds4f8d4s6_avatar.png',
            'author_id' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
