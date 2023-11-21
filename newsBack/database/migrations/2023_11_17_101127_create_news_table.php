<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments("newsId");
            $table->unsignedInteger('categoryId');
            $table->foreign('categoryId')->references('categoryId')->on('categories');
            $table->string('headLineImage')->nullable();
            $table->string("title");
            $table->string("slug")->unique();
            $table->text('newsContent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
