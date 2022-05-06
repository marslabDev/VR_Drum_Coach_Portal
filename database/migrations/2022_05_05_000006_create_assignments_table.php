<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_efk');
            $table->integer('coach_efk');
            $table->string('title');
            $table->longText('instructions')->nullable();
            $table->datetime('start_at');
            $table->integer('lesson_time_efk');
            $table->datetime('deadline')->nullable();
            $table->integer('time_given')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
