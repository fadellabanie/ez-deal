<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('city_id')->index();
            $table->unsignedBigInteger('country_id')->index();
            $table->string('make_by')->nullable();
            $table->string('title');
            $table->string('image');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
        DB::table('stories')->insert([
            'user_id' =>  1,
            'city_id' =>  1,
            'country_id' =>  1,
            'title' => 'stories 1',
            'image' => 'image.png',
            'status' => true,

            'start_date' => now(),
            'end_date' => now()->addDays(350),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
          DB::table('stories')->insert([
            'user_id' =>  1,
            'city_id' => 2,
            'country_id' =>  1,
            'title' => 'stories 1',
            'image' => 'image.png',
            'status' => true,

            'start_date' => now(),
            'end_date' => now()->addDays(350),
            'created_at' => now(),
            'updated_at' => now(),
        ]); DB::table('stories')->insert([
            'user_id' =>  1,
            'city_id' => 2,
            'country_id' =>  1,
            'title' => 'stories 1',
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
        Schema::dropIfExists('stories');
    }
}
