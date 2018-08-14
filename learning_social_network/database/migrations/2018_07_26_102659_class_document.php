<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClassDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classDocument',function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('class_id');
            $table->foreign('class_id')->references('id')->on('ntqClass');
            $table->string('description', 191);
            $table->string('url', 191);
            $table->unsignedInteger('creator');
            $table->foreign('creator')->references('id')->on('users');
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
        Schema::drop('classDocument');
    }
}
