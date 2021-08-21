<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('ar_name');
            $table->string('en_name');
            $table->string('ar_description');
            $table->string('en_description');
            $table->float('price');
            $table->integer('count');
            $table->string('icon');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        DB::table('attributes')->insert([
            'slug' =>  'special-real-estate',
            'ar_name' => 'special-real-estate',
            'en_name' => 'special-real-estate',
            'ar_description' => 'special-real-estate',
            'en_description' => 'special-real-estate',
            'price' => 100,
            'count' => 50,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('attributes')->insert([
            'slug' =>  'normal-real-estate',
            'ar_name' => 'normal-real-estate',
            'en_name' => 'normal-real-estate',
            'ar_description' => 'normal-real-estate',
            'en_description' => 'normal-real-estate',
            'price' => 100,
            'count' => 50,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('attributes')->insert([
            'slug' =>  'city-story',
            'ar_name' => 'city-story',
            'en_name' => 'city-story',
            'ar_description' => 'city-story',
            'en_description' => 'city-story',
            'price' => 100,
            'count' => 50,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('attributes')->insert([
            'slug' =>  'country-story',
            'ar_name' => 'country-story',
            'en_name' => 'country-story',
            'ar_description' => 'country-story',
            'en_description' => 'country-story',
            'price' => 100,
            'count' => 50,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('attributes')->insert([
            'slug' =>  'banner',
            'ar_name' => 'banner',
            'en_name' => 'banner',
            'ar_description' => 'banner',
            'en_description' => 'banner',
            'price' => 100,
            'count' => 50,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('attributes')->insert([
            'slug' =>  'snap-chat',
            'ar_name' => 'snap-chat',
            'en_name' => 'snap-chat',
            'ar_description' => 'snap-chat',
            'en_description' => 'snap-chat',
            'price' => 100,
            'count' => 50,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('attributes')->insert([
            'slug' =>  'live-chat',
            'ar_name' => 'live-chat',
            'en_name' => 'live-chat',
            'ar_description' => 'live-chat',
            'en_description' => 'live-chat',
            'price' => 0,
            'count' => 0,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('attributes')->insert([
            'slug' =>  'order',
            'ar_name' => 'order',
            'en_name' => 'order',
            'ar_description' => 'order',
            'en_description' => 'order',
            'price' => 100,
            'count' => 100,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('attributes')->insert([
            'slug' =>  'show-order',
            'ar_name' => 'show-order',
            'en_name' => 'show-order',
            'ar_description' => 'show-order',
            'en_description' => 'show-order',
            'price' => 100,
            'count' => 0,
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
        Schema::dropIfExists('attributes');
    }
}
