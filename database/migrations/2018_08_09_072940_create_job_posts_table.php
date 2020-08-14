<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('service_type',['Top Job','Hot Job','Featured Job','Free Job','Newspaper Job','Other Job'])->default('Free Job');
            $table->integer('number_of_vacancies')->unsigned();
            $table->enum('job_type',['Contract','Part Time', 'Full Time','Home Based'])->default('Full Time');
            $table->enum('job_level',['Top Level','Senior Level', 'Mid Level','Entry Level'])->default('Entry Level');
            $table->enum('salary_type',['Fixed','Range','Negotiable'])->default('Negotiable');
            $table->string('min_salary')->nullable();
            $table->string('max_salary')->nullable();
            $table->date('job_deadline');
            $table->enum('status',['Active','Inactive','Pending','Draft'])->default('Pending');
            $table->string('location')->nullable();
            $table->integer('count');
            $table->ipAddress('ip_address');
            $table->string('job_banner')->nullable();
            $table->integer('employer_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('industry_id')->unsigned();
            $table->timestamps();

            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('industry_id')->references('id')->on('industries');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
}
