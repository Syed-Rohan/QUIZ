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
        Schema::create('written_marks', function (Blueprint $table) {
            $table->id('written_marks_id');
            $table->integer('written_marks_user_id');
            $table->integer('written_marks_question_id');
            $table->integer('written_answer');
            $table->float('written_marks_total');
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
        Schema::dropIfExists('written_marks');
    }
};
