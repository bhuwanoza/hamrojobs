<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSeekerAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_seeker_academics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_seekers_id')->unsigned();
            $table->integer('academic_degree')->unsigned();
            $table->string('academic_program')->nullable();
            $table->string('academic_board')->nullable();
            $table->date('academic_institute')->nullable();
            $table->year('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('grade_type',['CGPA','Percentage']);
            $table->string('mark_secured')->nullable();
            $table->timestamps();

            $table->foreign('job_seekers_id')->references('id')->on('job_seekers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_seeker_academics');
    }
}
