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
            $table->string('ar_name');
            $table->string('en_name');
            $table->string('ar_description');
            $table->string('en_description');
            $table->float('price');
            $table->string('icon');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        DB::table('packages')->insert([
            'slug' =>  'silver',
            'ar_name' => 'silver',
            'en_name' => 'silver',
            'ar_description' => 'silver',
            'en_description' => 'silver',
            'price' => 222,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('packages')->insert([
            'slug' =>  'gold',
            'ar_name' => 'gold',
            'en_name' => 'gold',
            'ar_description' => 'gold',
            'en_description' => 'gold',
            'price' => 100,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       
        DB::table('packages')->insert([
            'slug' =>  'bronze',
            'ar_name' => 'bronze',
            'en_name' => 'bronze',
            'ar_description' => 'bronze',
            'en_description' => 'bronze',
            'price' => 33,
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);  
        DB::table('packages')->insert([
            'slug' =>  'bromo',
            'ar_name' => 'bromo',
            'en_name' => 'bromo',
            'ar_description' => 'bromo',
            'en_description' => 'bromo',
            'price' => 0,
            'icon' => 'image.png',
            'status' => true,
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
