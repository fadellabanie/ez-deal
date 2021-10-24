<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAppBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_banners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('city_id')->index();
            $table->string('make_by')->nullable();
            $table->string('ar_name');
            $table->string('en_name');
            $table->string('ar_description');
            $table->string('en_description');
            $table->string('image');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
        DB::table('app_banners')->insert([
            'user_id' =>  1,
            'city_id' =>  1,
            'ar_name' => 'silver',
            'en_name' => 'silver',
            'ar_description' => 'silver',
            'en_description' => 'silver',
            'image' => 'image.png',
            'status' => true,
            'start_date' => now(),
            'end_date' => now()->addDays(350),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('app_banners')->insert([
            'user_id' =>  1,
            'city_id' =>  1,
            'ar_name' => 'silver',
            'en_name' => 'silver',
            'ar_description' => 'silver',
            'en_description' => 'silver',
            'image' => 'image.png',
            'status' => true,
            'start_date' => now(),
            'end_date' => now()->addDays(350),
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
        Schema::dropIfExists('app_banners');
    }
}
