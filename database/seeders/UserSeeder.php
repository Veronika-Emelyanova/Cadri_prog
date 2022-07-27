<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('slug','admin')->first();
        $manager = Role::where('slug', 'manager')->first();
        $user = Role::where('slug', 'user')->first();
        // $createTasks = Permission::where('slug','create-tasks')->first();
        // $manageUsers = Permission::where('slug','manage-users')->first();
        $user1 = new User();
        $user1->name = 'Васнецов Александр Сергеевич';
        $user1->email = 'vasnec.alex.11@gmail.com';
        $user1->post_id = 1;
        $user1->password = bcrypt('secret');
        $user1->save();
        $user1->roles()->attach($admin);
        // $user1->permissions()->attach($createTasks);
        $user2 = new User();
        $user2->name = 'Кирсанова Мария Степановна';
        $user2->email = 'Marya.Kir.11@gmail.com';
        $user2->post_id = 2;
        $user2->password = bcrypt('secret');
        $user2->save();
        $user2->roles()->attach($manager);
        // $user2->permissions()->attach($manageUsers);

        $user3 = new User();
        $user3->name = 'Артамонов Максим Григорьевич';
        $user3->email = 'Mcsim.Artam@gmail.com';
        $user3->post_id = 3;
        $user3->password = bcrypt('secret');
        $user3->save();
        $user3->roles()->attach($user);
    }
}
