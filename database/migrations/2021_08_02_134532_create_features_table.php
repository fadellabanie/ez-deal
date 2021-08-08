<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('ar_name');
            $table->string('en_name');
            $table->string('ar_description');
            $table->string('en_description');
            $table->float('price');
            $table->integer('count');
            $table->string('icon');
            $table->string('is_active');
            $table->timestamps();
        });

        DB::table('features')->insert([
            'slug' =>  'special',
            'ar_name' => 'special',
            'en_name' => 'special',
            'ar_description' => 'special',
            'en_description' => 'special',
            'price' => 100,
            'count' => 5,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('features')->insert([
            'slug' =>  'city-story',
            'ar_name' => 'city-story',
            'en_name' => 'city-story',
            'ar_description' => 'city-story',
            'en_description' => 'city-story',
            'price' => 100,
            'count' => 5,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('features')->insert([
            'slug' =>  'country-story',
            'ar_name' => 'country-story',
            'en_name' => 'country-story',
            'ar_description' => 'country-story',
            'en_description' => 'country-story',
            'price' => 100,
            'count' => 5,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('features')->insert([
            'slug' =>  'banner',
            'ar_name' => 'banner',
            'en_name' => 'banner',
            'ar_description' => 'banner',
            'en_description' => 'banner',
            'price' => 100,
            'count' => 5,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('features')->insert([
            'slug' =>  'snap-chat',
            'ar_name' => 'snap-chat',
            'en_name' => 'snap-chat',
            'ar_description' => 'snap-chat',
            'en_description' => 'snap-chat',
            'price' => 100,
            'count' => 5,
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
        Schema::dropIfExists('features');
    }
}
