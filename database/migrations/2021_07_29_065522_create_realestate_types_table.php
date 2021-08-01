<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealestateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realestate_types', function (Blueprint $table) {
            $table->id();
            $table->string('ar_name');
            $table->string('en_name');
        });

        DB::table('realestate_types')->insert([
            'ar_name' => 'فيلا',
            'en_name' => 'Villa',
        ]);
        DB::table('realestate_types')->insert([
            'ar_name' => 'شقة',
            'en_name' => 'Apartment',
        ]);
        DB::table('realestate_types')->insert([
            'ar_name' => 'ارض',
            'en_name' => 'Land',
        ]);
        DB::table('realestate_types')->insert([
            'ar_name' => 'مزرعة',
            'en_name' => 'Farm',
        ]);
        DB::table('realestate_types')->insert([
            'ar_name' => 'شالية',
            'en_name' => 'Chalet',
        ]);
        DB::table('realestate_types')->insert([
            'ar_name' => 'إستراحة',
            'en_name' => 'Vacation house',
        ]);
        DB::table('realestate_types')->insert([
            'ar_name' => 'دور',
            'en_name' => 'Floor',
        ]);
        DB::table('realestate_types')->insert([
            'ar_name' => 'مكتب',
            'en_name' => 'office',
        ]);
        DB::table('realestate_types')->insert([
            'ar_name' => 'محلات تجارية',
            'en_name' => 'Stores',
        ]);
        DB::table('realestate_types')->insert([
            'ar_name' => 'برج',
            'en_name' => 'Tower',
        ]);
        DB::table('realestate_types')->insert([
            'ar_name' => 'عمارة',
            'en_name' => 'Building',
        ]);
        DB::table('realestate_types')->insert([
            'ar_name' => 'مخيم',
            'en_name' => 'Tent',
        ]);
        DB::table('realestate_types')->insert([
            'ar_name' => 'مصنع',
            'en_name' => 'factory',
        ]);
        DB::table('realestate_types')->insert([
            'ar_name' => 'فندق',
            'en_name' => 'Hotel',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realestate_types');
    }
}
