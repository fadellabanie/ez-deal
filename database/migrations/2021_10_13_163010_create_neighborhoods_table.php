<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateNeighborhoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neighborhoods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('city_id');
            $table->string('ar_name');
            $table->string('en_name');
            $table->string('icon')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        DB::table('neighborhoods')->insert([
            'country_id' => 1,
            'city_id' => 1,
            'ar_name' => '1 جده',
            'en_name' => '1 Jeddah',
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neighborhoods');
    }
}
