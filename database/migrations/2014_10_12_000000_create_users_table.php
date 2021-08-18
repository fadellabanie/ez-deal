<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country_code')->nullable();
            $table->string('mobile')->nullable();
            $table->string('whatsapp_mobile')->nullable();
            $table->unsignedBigInteger('city_id')->nullable()->index();
            $table->unsignedBigInteger('package_id')->nullable()->index();
            $table->date('subscribe_to')->nullable();
            $table->text('trading_certification')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->boolean('is_dark')->default(false);
            $table->text('remember_token')->nullable();
            $table->text('device_token')->nullable();

            $table->timestamps();
        });

        // DB::table('users')->insert([
        //     'username' => 'fadellabanie',
         
        //     'status' => 'done',
        //     'mobile' => '011315200',
        //     'address' => 'egypt',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     'type' => 'user',
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
