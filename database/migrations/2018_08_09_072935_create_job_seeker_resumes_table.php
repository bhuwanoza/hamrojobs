<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSeekerResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_seeker_resumes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_seekers_id')->unsigned();
            $table->enum('is_uploaded',['Yes','No'])->default('No');
            $table->string('file_name')->nullable();
            $table->string('resume_name');
            $table->enum('is_default',['Yes','No'])->default('Yes');
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
        Schema::dropIfExists('job_seeker_resumes');
    }
}
