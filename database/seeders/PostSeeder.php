<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post1 = new Post();
        $post1->name = 'Директор';
        $post1->save();

        $post2 = new Post();
        $post2->name = 'Менеджер';
        $post2->save();

        $post3 = new Post();
        $post3->name = 'Веб-разработчик';
        $post3->save();
    }
}
