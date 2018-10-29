<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('college_name');
            $table->integer('examiner_id')->unsigned();
            $table->foreign('examiner_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('time');
            $table->string('date');
            $table->string('spicalized');
            $table->integer('quesion_number');
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
        Schema::dropIfExists('exams');
    }
}
