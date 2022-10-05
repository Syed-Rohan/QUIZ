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
        Schema::create('mcq_marks', function (Blueprint $table) {
            $table->id('mcq_marks_id');
            $table->integer('mcq_marks_user_id');
            $table->integer('mcq_marks_question_id');
            $table->float('mcq_marks_total');
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
        Schema::dropIfExists('mcq_marks');
    }
};
