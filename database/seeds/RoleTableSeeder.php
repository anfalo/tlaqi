<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
	    $role_user->name = 'user';
	    $role_user->description = 'End User';
	    $role_user->save();

	    $role_admin = new Role();
	    $role_admin->name = 'admin';
	    $role_admin->description = 'An Administration User';
	    $role_admin->save();
    }
}
