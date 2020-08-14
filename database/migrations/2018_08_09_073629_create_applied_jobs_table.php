<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppliedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applied_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id')->unsigned();
            $table->integer('seeker_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->string('expected_salary')->nullable();
            $table->longText('cover_letter')->nullable();
            $table->ipAddress('ip_address');
            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('job_posts')->onDelete('cascade');;
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');;
            $table->foreign('seeker_id')->references('id')->on('job_seekers')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applied_jobs');
    }
}
