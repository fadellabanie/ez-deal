<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSpeciesToRealestatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('realestates', function (Blueprint $table) {
            $table->string('species')->nullable()->after('neighborhood_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('realestates', function (Blueprint $table) {
            $table->dropColumn('species');
        });
    }
}
