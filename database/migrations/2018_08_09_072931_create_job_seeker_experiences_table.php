<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSeekerExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_seeker_experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_seekers_id')->unsigned();
            $table->string('organization_title')->nullable();
            $table->string('organization_nature')->nullable();
            $table->string('job_location')->nullable();
            $table->string('job_title');
            $table->integer('job_industry')->unsigned();
            $table->enum('job_level',['Top Level','Senior Level', 'Mid Level','Entry Level'])->default('Entry Level');
            $table->enum('hide_organization',['Yes','No'])->default('No');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('organization',['Private','Public','Government','NGO','INGOS'])->nullable();
            $table->string('duties_responsibilities')->nullable();

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
        Schema::dropIfExists('job_seeker_experiences');
    }
}
