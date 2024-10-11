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
        Schema::create('articles', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->id();
            $table->unsignedBigInteger('source_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('author_id');
            $table->foreign('source_id')->references('id')->on('sources');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('author_id')->references('id')->on('authors');
            $table->string('title',100);
            $table->string('description',255)->nullable();
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
