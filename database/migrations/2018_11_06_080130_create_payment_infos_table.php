<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentInfosTable extends Migration
{

    public function up()
    {
        Schema::create('payment_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bank_title')->nullable();
            $table->string('slug')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->enum('account_type',['Saving','Fixed','Current'])->default('saving');
            $table->string('image')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
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
        Schema::dropIfExists('payment_infos');
    }
}
