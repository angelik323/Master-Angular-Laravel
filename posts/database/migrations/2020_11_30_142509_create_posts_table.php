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
            $table->bigIncrements('id');
            $table->biginteger('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->biginteger('categorias_id')->unsigned();
            $table->foreign('categorias_id')->references('id')->on('categorias');
            $table->string('titulo');
            $table->longText('contenido');
            $table->string('image');
            $table->dateTime('created_at', 0);
            $table->dateTime('updated_at', 0);
            /*$table->id();
            $table->timestamps();*/
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
