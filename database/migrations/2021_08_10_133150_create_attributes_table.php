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
        DB::table('features')->insert([
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

        DB::table('features')->insert([
            'slug' =>  'normal advertisement',
            'ar_name' => 'اعلان عادي',
            'en_name' => 'normal advertisement',
            'ar_description' => 'normal advertisement',
            'en_description' => 'normal advertisement',
            'price' => 100,
            'count' => 100,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('features')->insert([
            'slug' =>  'normal advertisement',
            'ar_name' => 'اعلان عادي',
            'en_name' => 'normal advertisement',
            'ar_description' => 'normal advertisement',
            'en_description' => 'normal advertisement',
            'price' => 100,
            'count' => 250,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]); 
        DB::table('features')->insert([
            'slug' =>  'normal advertisement',
            'ar_name' => 'اعلان عادي',
            'en_name' => 'normal advertisement',
            'ar_description' => 'normal advertisement',
            'en_description' => 'normal advertisement',
            'price' => 100,
            'count' => 50,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('features')->insert([
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
        DB::table('features')->insert([
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
        DB::table('features')->insert([
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
        DB::table('features')->insert([
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
