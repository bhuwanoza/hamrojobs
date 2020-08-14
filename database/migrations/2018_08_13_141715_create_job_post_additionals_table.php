<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_post_additionals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id')->unsigned();
            $table->integer('education_level')->unsigned();
            $table->longText('required_education')->nullable();
            $table->enum('experience_boundary',['Greater than','Greater or Equals to','Less than','Less or Equals to','Equals to'])->nullable();;
            $table->integer('experience')->nullable();
            $table->enum('experience_measure',['Years','Months'])->nullable();;
            $table->string('gender')->nullable();
            $table->enum('age_boundary',['Greater than','Greater or Equals to','Less than','Less or Equals to','Equals to'])->nullable();;
            $table->integer('age')->nullable();
            $table->longText('specification')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('job_posts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_post_additionals');
    }
}
