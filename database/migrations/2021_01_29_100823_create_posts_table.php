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
            $table->string('title',255)->notNullable()->unique();
            $table->string('description')->notNullable();
            $table->integer('status')->notNullable();
            $table->unsignedBigInteger('create_user_id');
            $table->foreign('create_user_id')->references('id')->on('users');
            $table->unsignedBigInteger('updated_user_id')->nullable();
            $table->foreign('updated_user_id')->references('id')->on('users');
            $table->integer('deleted_id')->nullable();
            $table->dateTime('created_at',0)->notNullable();
            $table->dateTime('updated_at',0)->notNullable();
            $table->dateTime('deleted_at',0)->nullable();
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
    }
}



