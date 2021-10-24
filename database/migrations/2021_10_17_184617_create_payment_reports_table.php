<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('package_id')->index();
            $table->double('amount');
            $table->longText('track_id')->nullable()->comment('reference number');
            $table->longText('trandata_request')->nullable()->comment('encrypted url request');
            $table->longText('trandata_respond')->nullable()->comment('encrypted url respond');
            $table->string('payment_id')->nullable()->comment('id of web view');
            $table->string('data')->nullable();
            $table->string('trans_id')->nullable();
            $table->string('card_type')->nullable();
            $table->string('result')->nullable();
            $table->string('ref')->nullable();
            $table->string('fc_cust_id')->nullable();
            $table->string('payment_timestamp')->nullable();
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
        Schema::dropIfExists('payment_reports');
    }
}
