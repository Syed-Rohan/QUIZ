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
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->integer('batch_number')->nullable();
            $table->string('batch_name')->nullable();
            $table->string('batch_teacher')->nullable();
            $table->string('batch_schedule')->nullable();
            $table->text('batch_status')->default('Enable');
            $table->integer('batch_delete')->default(0);
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
        Schema::dropIfExists('batches');
    }
};
