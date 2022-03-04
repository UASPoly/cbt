<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->integer('level_course_id')
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('level_courses');
            $table->string('semester');
            $table->string('session');
            $table->date('date');
            $table->time('start');
            $table->time('end');
            $table->boolean('hasStarted')->default(0);
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
