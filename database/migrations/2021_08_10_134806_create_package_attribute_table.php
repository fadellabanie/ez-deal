<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePackageAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_attribute', function (Blueprint $table) {
            $table->unsignedBigInteger('package_id')->index();
            $table->unsignedBigInteger('attribute_id')->index();
            // $table->string('type');
            // $table->integer('count')->nullable();
            // $table->integer('days')->nullable();
            // $table->date('from')->nullable();
            // $table->date('to')->nullable();

            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('attribute_id')->references('id')->on('attributes');
        });
        DB::table('package_attribute')->insert([
            'package_id' =>  1,
            'attribute_id' => 1,
        ]);
        DB::table('package_attribute')->insert([
            'package_id' =>  1,
            'attribute_id' => 2,
        ]);
        DB::table('package_attribute')->insert([
            'package_id' =>  1,
            'attribute_id' => 3,
        ]);
        DB::table('package_attribute')->insert([
            'package_id' =>  1,
            'attribute_id' => 4,
        ]);
        DB::table('package_attribute')->insert([
            'package_id' =>  1,
            'attribute_id' => 5,
        ]);
        DB::table('package_attribute')->insert([
            'package_id' =>  1,
            'attribute_id' => 6,
        ]);
        DB::table('package_attribute')->insert([
            'package_id' =>  2,
            'attribute_id' => 1,
        ]);
        DB::table('package_attribute')->insert([
            'package_id' =>  2,
            'attribute_id' => 1,
        ]);
        DB::table('package_attribute')->insert([
            'package_id' =>  2,
            'attribute_id' => 1,
        ]);
        DB::table('package_attribute')->insert([
            'package_id' =>  2,
            'attribute_id' => 1,
        ]);

        DB::table('package_attribute')->insert([
            'package_id' =>  4,
            'attribute_id' => 1,
        ]);
        DB::table('package_attribute')->insert([
            'package_id' =>  4,
            'attribute_id' => 2,
        ]);
        DB::table('package_attribute')->insert([
            'package_id' =>  4,
            'attribute_id' => 3,
        ]);
        DB::table('package_attribute')->insert([
            'package_id' =>  4,
            'attribute_id' => 4,
        ]);
        DB::table('package_attribute')->insert([
            'package_id' =>  4,
            'attribute_id' => 5,
        ]);
        DB::table('package_attribute')->insert([
            'package_id' =>  4,
            'attribute_id' => 6,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_attribute');
    }
}
