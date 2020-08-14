<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSeekerAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_seeker_additionals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_seekers_id')->unsigned();
            $table->enum('looking_for',['Top Level','Senior Level', 'Mid Level','Entry Level']);
            $table->string('available_for')->nullable();
            $table->string('specialization')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('current_salary')->nullable();
            $table->string('job_preference_location')->nullable();
            $table->longText('career_objective')->nullable();
            $table->enum('current_salary_boundary',['Equals','Below','Above']);
            $table->enum('current_salary_currency',['NRS','INR','USD']);
            $table->enum('current_salary_basic',['Hourly','Daily','Weekly','Monthly','Yearly']);
            $table->enum('expected_salary_boundary',['Equals','Below','Above']);
            $table->enum('expected_salary_currency',['NRS','INR','USD']);
            $table->enum('expected_salary_basic',['Hourly','Daily','Weekly','Monthly','Yearly']);
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
        Schema::dropIfExists('job_seeker_additionals');
    }
}
