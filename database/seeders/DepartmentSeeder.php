<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department1 = new Department();
        $department1->name = 'Отдел разработки';
        $department1->save();

        $department2 = new Department();
        $department2->name = 'Финансовый отдел';
        $department2->save();

        DB::table('users_departments')->insert([
            'user_id' => 1,
            'department_id' => 1,
        ]);

        DB::table('users_departments')->insert([
            'user_id' => 1,
            'department_id' => 2,
        ]);

        DB::table('users_departments')->insert([
            'user_id' => 2,
            'department_id' => 1,
        ]);

        DB::table('users_departments')->insert([
            'user_id' => 2,
            'department_id' => 2,
        ]);

        DB::table('users_departments')->insert([
            'user_id' => 3,
            'department_id' => 1,
        ]);
    }
}
