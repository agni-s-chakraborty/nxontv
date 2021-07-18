<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'hiren', 
            'email' => 'hiren@gmail.com',
            'password' => bcrypt('123456'),
            'role_id' => '2'
        ]);
    
        $role = Role::create(['name' => 'User']);
     
        $permissions = Permission::select('id',4)->first();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
