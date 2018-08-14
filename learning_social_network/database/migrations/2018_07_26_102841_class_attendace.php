<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClassAttendace extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classAttendance',function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('class_id');
            $table->foreign('class_id')->references('id')->on('ntqClass');
            $table->unsignedInteger('content_id');
            $table->foreign('content_id')->references('id')->on('classContent');
            $table->unsignedInteger('member_id');
            $table->foreign('member_id')->references('id')->on('classMember');
            $table->date('date');
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
        Schema::drop('classAttendance');
    }
}
