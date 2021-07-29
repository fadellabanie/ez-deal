<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealestateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realestate_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('realestate_id')->index();
            $table->text('image');
            $table->timestamps();
            $table->foreign('realestate_id')->references('id')->on('realestates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realestate_media');
    }
}
