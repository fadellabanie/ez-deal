<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('type');
            $table->integer('count')->nullable();
            $table->integer('days')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade')->onUpdate('cascade');
        });
       
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
