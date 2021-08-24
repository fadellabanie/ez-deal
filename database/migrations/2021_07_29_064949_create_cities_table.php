<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->string('ar_name');
            $table->string('en_name');
            $table->string('icon');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        DB::table('cities')->insert([
            'country_id' => 1,
            'ar_name' => 'جده',
            'en_name' => 'Jeddah',
            'icon' => 'image.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('cities')->insert([
            'country_id' => 1,
            'ar_name' => 'مكة المكرمة',
            'en_name' => 'makkah',
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
        Schema::dropIfExists('cities');
    }
}
