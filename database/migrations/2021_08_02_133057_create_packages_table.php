<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('color');
            $table->string('ar_name');
            $table->string('en_name');
            $table->string('ar_description');
            $table->string('en_description');
            $table->float('price');
            $table->integer('days')->default(0);
            $table->string('icon');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        DB::table('packages')->insert([
            'slug' =>  'silver',
            'color' =>  '#12455',
            'ar_name' => 'silver',
            'en_name' => 'silver',
            'ar_description' => 'silver',
            'en_description' => 'silver',
            'price' => 222,
            'days' => 222,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('packages')->insert([
            'slug' =>  'gold',
            'color' =>  '#234133',
            'ar_name' => 'gold',
            'en_name' => 'gold',
            'ar_description' => 'gold',
            'en_description' => 'gold',
            'price' => 100,
            'days' => 100,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       
        DB::table('packages')->insert([
            'slug' =>  'bronze',
            'color' =>  '#114164',
            'ar_name' => 'bronze',
            'en_name' => 'bronze',
            'ar_description' => 'bronze',
            'en_description' => 'bronze',
            'price' => 33,
            'days' => 33,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);  
        DB::table('packages')->insert([
            'slug' =>  'bromo',
            'color' =>  '#234164',
            'ar_name' => 'bromo',
            'en_name' => 'bromo',
            'ar_description' => 'bromo',
            'en_description' => 'bromo',
            'price' => 0,
            'icon' => 'image.png',
            'status' => false,
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
        Schema::dropIfExists('packages');
    }
}
