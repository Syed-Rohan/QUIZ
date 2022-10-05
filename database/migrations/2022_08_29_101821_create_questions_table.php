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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id');
            $table->integer('course_id');
            $table->string('course_title');
            $table->string('course_name');
            $table->string('batch_id');
            $table->string('batch_name');
            $table->text('question_level');
            $table->text('subject');
            $table->integer('question_type');
            $table->integer('mark');
            $table->float('minus_mark')->nullable()->comment('per question');
            $table->string('exam_duration')->comment('min');
            $table->date('exam_date');
            $table->string('exam_start_time');
            $table->string('exam_end_time');
            $table->timestamps();
            $table->text('question_status')->default('Disable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
