<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClassContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classContent',function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('class_id');
            $table->foreign('class_id')->references('id')->on('ntqClass');
            $table->string('title');
            $table->string('thumbnail');
            $table->text('content_short');
            $table->text('content');
            $table->string('level');
            $table->integer('duration'); // khoang thoi gian
            $table->string('documents');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('author'); //tac gia tao content. thong thuong chinh la id cua nguoi dang nhap tao.
            $table->foreign('author')->references('id')->on('users');
            $table->boolean('is_done');
            $table->boolean('is_approve');
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
        Schema::drop('classContent');
    }
}
