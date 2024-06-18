<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleAndPermissionSeeder extends Seeder
{
	public function run()
	{
		$permissionsShore = [
		   'cart.index',
		   'cart.add'
		];
		$permissionsAdmin = array_merge([
			'users.index',
			'users.create',
			'users.store',
			'users.update',
			'users.destroy',
		], $permissionsShore);

		$admin = Role::create(['name' => 'admin']);
		Role::create(['name' => 'user']);

		foreach($permissionsAdmin as $permission){
			$permission = Permission::create(['name' => $permission]);
			$admin->givePermissionTo($permission);
		}
	}
}