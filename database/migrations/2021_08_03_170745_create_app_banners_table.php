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
            $table->string('ar_title');
            $table->string('en_title');
            $table->string('ar_description');
            $table->string('en_description');
            $table->string('image');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
        DB::table('stories')->insert([
            'user_id' =>  1,
            'city_id' =>  1,
            'title' => 'stories 1',
            'ar_name' => 'silver',
            'en_name' => 'silver',
            'ar_description' => 'silver',
            'en_description' => 'silver',
            'image' => 'image.png',
            'start_date' => now(),
            'end_date' => now()->addDays(15),
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
