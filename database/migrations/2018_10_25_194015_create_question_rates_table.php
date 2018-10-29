<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->string('rate');
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
        Schema::dropIfExists('question_rates');
    }
}
