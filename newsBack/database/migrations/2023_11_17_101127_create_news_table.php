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
            $table->increments("newsId");
            $table->unsignedInteger('categoryId');
            $table->foreign('categoryId')->references('categoryId')->on('categories');
            $table->unsignedInteger('creatorId');
            $table->foreign('creatorId')->references('userId')->on('users');
            $table->enum('newsStatus', ['publish', 'archive']);
            $table->string("title");
            $table->string("slug")->unique();
            $table->string('newsImage')->nullable();
            $table->text('newsContent');
            $table->timestamps();
        });
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
