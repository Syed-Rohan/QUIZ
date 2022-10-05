<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcq_answers', function (Blueprint $table) {
            $table->id('mcq_answer_id');
            $table->integer('mcq_answer_question_id');
            $table->integer('mcq_answer_user_id');
            $table->integer('mcq_answer_mcq_id');
            $table->string('user_answer');
            $table->string('correct_answer');
            $table->string('mcq_answer_status');
            $table->float('mcq_answer_mark');
            $table->float('mcq_answer_minus_mark');
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
        Schema::dropIfExists('mcq_answers');
    }
};
