<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;


class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Harveer',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        if($user) {
            $role = Role::create(['name' => 'super-admin']);
            $permissions = Permission::pluck('id','id')->all();
   
            $role->syncPermissions($permissions);
         
            $user->assignRole([$role->id]);

        }
    }
}
