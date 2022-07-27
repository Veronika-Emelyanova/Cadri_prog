<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
    }
}
