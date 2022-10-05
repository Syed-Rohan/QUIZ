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
        Schema::create('attemp_exams', function (Blueprint $table) {
            $table->id('attempt_id');
            $table->integer('attemp_user_id');
            $table->integer('attemp_course_id');
            $table->integer('attemp_batch_id');
            $table->integer('attemp_exam_id');
            $table->integer('attemp_number');
            $table->string('attemp_start');
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
        Schema::dropIfExists('attemp_exams');
    }
};
