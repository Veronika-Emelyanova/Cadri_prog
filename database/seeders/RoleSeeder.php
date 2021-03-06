<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = 'admin';
        $admin->slug = 'admin';
        $admin->save();
        
        $manager = new Role();
        $manager->name = 'manager';
        $manager->slug = 'manager';
        $manager->save();

        $user = new Role();
        $user->name = 'user';
        $user->slug = 'user';
        $user->save();
    }
}