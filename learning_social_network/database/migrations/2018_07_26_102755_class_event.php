<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClassEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classEvent',function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('class_id');
            $table->foreign('class_id')->references('id')->on('ntqClass');
            $table->string('title', 191);
            $table->text('description');
            $table->string('documents', 191);
            $table->dateTime('start');
            $table->dateTime('end');
            $table->integer('duration');
            $table->unsignedInteger('author');
            $table->foreign('author')->references('id')->on('users');
            $table->unsignedInteger('speaker');
            $table->foreign('speaker')->references('id')->on('users');
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
        Schema::drop('classEvent');
    }
}
