<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealestatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realestates', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('user_id')->default(0)->index();
            $table->unsignedBigInteger('realestate_type_id')->index();
            $table->unsignedBigInteger('contract_type_id')->index();
            $table->unsignedBigInteger('view_id')->index();
            $table->unsignedBigInteger('city_id')->index();
            $table->unsignedBigInteger('country_id')->index();
            $table->string('name');
            $table->string('neighborhood');
            $table->float('price');
            $table->float('space');
            $table->float('number_building');
            $table->float('age_building');
            $table->float('street_width');
            $table->integer('street_number');
            $table->string('video_url')->nullable();
            $table->boolean('elevator')->default(false);
            $table->boolean('parking')->default(false);
            $table->boolean('ac')->default(false);
            $table->boolean('furniture')->default(false);
            $table->text('note')->nullable();
            $table->boolean('is_active')->default(false);
            $table->integer('number_of_views')->default(0);
            $table->string('type')->nullable();
            $table->string('type_of_owner')->nullable();
            $table->string('number_card')->nullable();
            $table->string('status')->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();
            $table->string('address')->nullable();
            $table->date('end_date');
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
        Schema::dropIfExists('realestates');
    }
}
