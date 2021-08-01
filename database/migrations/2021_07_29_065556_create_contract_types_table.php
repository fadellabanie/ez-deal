<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateContractTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_types', function (Blueprint $table) {
            $table->id();
            $table->string('ar_name');
            $table->string('en_name');
        });
        DB::table('contract_types')->insert([
            'ar_name' => 'تجاري/ة',
            'en_name' => 'Commercial',
        ]);
        DB::table('contract_types')->insert([
            'ar_name' => 'سكني/ة',
            'en_name' => 'Residential',
        ]);
        DB::table('contract_types')->insert([
            'ar_name' => 'صناعية/ة',
            'en_name' => 'Industrial',
        ]);
        DB::table('contract_types')->insert([
            'ar_name' => 'زراعية',
            'en_name' => 'Farming land',
        ]);
        DB::table('contract_types')->insert([
            'ar_name' => 'تجاري إداري',
            'en_name' => 'Commercial & Offices',
        ]);
        DB::table('contract_types')->insert([
            'ar_name' => 'تجاري سكني',
            'en_name' => 'Commercial & Residential',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_types');
    }
}
