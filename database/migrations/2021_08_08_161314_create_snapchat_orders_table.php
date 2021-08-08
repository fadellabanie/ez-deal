<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnapchatOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snapchat_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('real_estate_id')->index();
            $table->boolean('status')->default(false);

            $table->timestamps();

            $table->foreign('real_estate_id')->references('id')->on('realestates')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('snapchat_orders');
    }
}
