<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('views', function (Blueprint $table) {
            $table->id();
            $table->string('ar_name');
            $table->string('en_name');
        });
        DB::table('views')->insert([
            'en_name' => 'east',
            'ar_name' => 'شمال',
        ]);
        DB::table('views')->insert([
            'en_name' => 'wast',
            'ar_name' => 'جنوب',
        ]);
        DB::table('views')->insert([
            'en_name' => 'east wast',
            'ar_name' => 'شمال جنوب',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('views');
    }
}
