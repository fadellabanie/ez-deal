<?php

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertDataToPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('permissions')->truncate();

        DB::table('role_has_permissions')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        ## Users
        Permission::create(['name' => 'access users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'export users']);
        Permission::create(['name' => 'freeze users']);

        ## Admins
        Permission::create(['name' => 'access admins']);
        Permission::create(['name' => 'create admins']);
        Permission::create(['name' => 'edit admins']);
        Permission::create(['name' => 'delete admins']);
        Permission::create(['name' => 'export admins']);

        ## Roles
        Permission::create(['name' => 'access roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);

        ## Order
        Permission::create(['name' => 'access orders']);
        Permission::create(['name' => 'create orders']);
        Permission::create(['name' => 'edit orders']);
        Permission::create(['name' => 'show orders']);
        Permission::create(['name' => 'delete orders']);
        Permission::create(['name' => 'export orders']);

        ## RealEstate
        Permission::create(['name' => 'access real estates']);
        Permission::create(['name' => 'create real estates']);
        Permission::create(['name' => 'edit real estates']);
        Permission::create(['name' => 'show real estates']);
        Permission::create(['name' => 'delete real estates']);
        Permission::create(['name' => 'export real estates']);

        ## Banners
        Permission::create(['name' => 'access banners']);
        Permission::create(['name' => 'create banners']);
        Permission::create(['name' => 'edit banners']);
        Permission::create(['name' => 'delete banners']);
        Permission::create(['name' => 'export banners']);

        ## Stories
        Permission::create(['name' => 'access stories']);
        Permission::create(['name' => 'create stories']);
        Permission::create(['name' => 'edit stories']);
        Permission::create(['name' => 'delete stories']);
        Permission::create(['name' => 'export stories']);

        ## Cities
        Permission::create(['name' => 'access cities']);
        Permission::create(['name' => 'create cities']);
        Permission::create(['name' => 'edit cities']);
        Permission::create(['name' => 'delete cities']);

        ## Country
        Permission::create(['name' => 'access countries']);
        Permission::create(['name' => 'create countries']);
        Permission::create(['name' => 'edit countries']);
        Permission::create(['name' => 'delete countries']);

        ## Package
        Permission::create(['name' => 'access packages']);
        Permission::create(['name' => 'create packages']);
        Permission::create(['name' => 'edit packages']);
        Permission::create(['name' => 'delete packages']);

        ## Attribute
        Permission::create(['name' => 'access attributes']);
        Permission::create(['name' => 'create attributes']);
        Permission::create(['name' => 'edit attributes']);
        Permission::create(['name' => 'delete attributes']);

        ## AppSetting
        Permission::create(['name' => 'access notifications']);
        Permission::create(['name' => 'send notifications']);
        Permission::create(['name' => 'access app settings']);
        Permission::create(['name' => 'access activity logs']); 
        
        ## Static Page
        Permission::create(['name' => 'access static page']);
        Permission::create(['name' => 'create static page']);
        Permission::create(['name' => 'edit static page']);
        Permission::create(['name' => 'delete static page']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            DB::table('permissions')->truncate();
            DB::table('role_has_permissions')->truncate();
        });
    }
}
