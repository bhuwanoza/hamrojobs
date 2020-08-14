<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndustriesJobSeekerAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industries_job_seeker_additionals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_seeker_additionals_id')->unsigned();
            $table->integer('industries_id')->unsigned();
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
        Schema::dropIfExists('industries_job_seeker_additionals');
    }
}
