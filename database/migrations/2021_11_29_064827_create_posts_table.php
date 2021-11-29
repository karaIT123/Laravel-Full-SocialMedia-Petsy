<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('content');
            $table->unsignedSmallInteger('user_id')->index();
            $table->timestamps();
        });

        Schema::create('pet_post', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pet_id')->index();
            $table->unsignedBigInteger('post_id')->index();
            $table->foreign('pet_id')->references('id')->on('posts')->cascadeOnDelete();
            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('pet_post');
    }
}
