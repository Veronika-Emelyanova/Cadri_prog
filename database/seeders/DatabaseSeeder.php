<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(RoleSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
    }
}

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

// class DatabaseSeeder extends Seeder
// {

//     /**
//      * Seed the application's database.
//      *
//      * @return void
//      */
//     public function run()
//     {
//         //\App\Models\User::factory(3)->create();

//         DB::table('users')->insert([
//             'name' => 'Кирсанова Мария Степановна',
//             'email' => 'Marya.Kir.11@gmail.com',
//             'post_id' => 1,
//             'password' => '$2y$10$4jeCsF3qUiyBJISG3OVADOT/qguHnWpNAM3xrmQSqJldG/QDzXgdK', //12345678
//         ]);

//         DB::table('users')->insert([
//             'name' => 'Васнецов Александр Васильевич',
//             'email' => 'vasnec.alex.11@gmail.com',
//             'post_id' => 1,
//             'password' => '$2y$10$91oys4ZFa/zHJlrDb2Sp8OZQze9OEDyhInqtE/ZIL7HPd3o717Rfy' //111222333
//         ]);

//         DB::table('posts')->insert([
//             'name' => 'Директор'
//         ]);

//         DB::table('departments')->insert([
//             'name' => 'Отдел разработки ИС'
//         ]);

//         DB::table('departments')->insert([
//             'name' => 'Отдел поддержки пользователей'
//         ]);
        
//         DB::table('departments')->insert([
//             'name' => 'Отдел развития инфраструктуры'
//         ]);

//         DB::table('departments')->insert([
//             'name' => 'Финансовый отдел'
//         ]);
//     }
// }
