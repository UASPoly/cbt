<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('level_id')
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('levels');
            $table->integer('course_id')
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('courses');
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
        Schema::dropIfExists('level_courses');
    }
}
