<?php

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;


class CreateArticlesTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('articles', function (Blueprint $table) {

            $table->increments('id');

            $table->string('title');

            $table->text('description',140);

            $table->text('contingut');

            $table->text('path');

            $table->integer('user_id')->unsigned();

            $table->integer('seccio_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')

                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('seccio_id')->references('id')->on('seccios')

                ->onUpdate('cascade')->onDelete('cascade');

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

        Schema::drop("articles");

    }

}