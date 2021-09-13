<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Role::create(['name' => 'super admin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'support']);
        $role = Role::whereName('super admin')->first();
        
        $permission = Permission::get();
        $role->givePermissionTo($permission);

        $user = User::where('email','admin@admin.com')->first();
        $user->assignRole('super admin');
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
