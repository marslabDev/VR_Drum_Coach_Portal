<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendencesTable extends Migration
{
    public function up()
    {
        Schema::create('attendences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_efk');
            $table->integer('lesson_time_efk');
            $table->datetime('attended_at');
            $table->datetime('leave_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
