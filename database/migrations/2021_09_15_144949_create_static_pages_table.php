<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStaticPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_pages', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('ar_title');
            $table->string('en_title');
            $table->longText('ar_description');
            $table->longText('en_description');
            $table->timestamps();
        });

        DB::table('static_pages')->insert([
            'type' => 'type',
            'ar_title' => 'ar_title',
            'en_title' => 'en_title',
            'ar_description' => 'ar_description',
            'en_description' => 'en_description',
            'created_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('static_pages');
    }
}
