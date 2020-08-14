<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('industry_id')->unsigned();
            $table->integer('employers_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('email')->nullable();
            $table->string('seo')->nullable();
            $table->string('logo')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->enum('total_employees',['1-10','10-50','50-100','100-500','500-1000','Above 1000'])->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->longText('description')->nullable();
            $table->integer('branches')->nullable();
            $table->date('established_date')->nullable();
            $table->enum('ownership',['Private','Public','Government','NGO','INGOS']);
            $table->enum('status',['Active','Inactive','Blocked']);
            $table->enum('top_company',['Yes','No']);
            $table->timestamps();

            $table->foreign('industry_id')->references('id')->on('industries');
            $table->foreign('employers_id')->references('id')->on('employers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
