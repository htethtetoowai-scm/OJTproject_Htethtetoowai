<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->notNullable()->unique();
            $table->string('email')->notNullable()->unique();
            $table->text('password')->notNullable();
            $table->string('profile',255)->notNullable();
            $table->string('type',1)->notNullable();
            $table->string('phone',20)->nullable();
            $table->string('address',255)->nullable();
            $table->date('dob')->nullable();
            $table->unsignedBigInteger('create_user_id')->index()->nullable();
            $table->foreign('create_user_id')->references('id')->on('users');
            $table->unsignedBigInteger('updated_user_id')->index()->nullable();
            $table->foreign('updated_user_id')->references('id')->on('users');
            $table->integer('deleted_user_id')->nullable();
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
        Schema::dropIfExists('users');
    }
}