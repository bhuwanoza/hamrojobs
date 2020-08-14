<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSeekersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('image')->nullable();
            $table->enum('gender',['Male','Female','Not Specified'])->default('Not Specified');
            $table->date('dob')->nullable();
            $table->enum('marital_status',['Single','Married','Not Specified'])->default('Not Specified');
            $table->string('religion')->nullable();
            $table->string('nationality')->nullable();
            $table->string('mobile')->nullable();
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->enum('status',['Active','Inactive']);
            $table->longText('about_me')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

        });
    }


    public function down()
    {
        Schema::dropIfExists('job_seekers');
    }
}
