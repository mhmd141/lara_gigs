<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\city;
use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Article::factory(100)->create();
       // Article::create(['id' =>'1',
        //'title'=>'mohammed1',
        //'password'=>'123123123',


    //]);

    }
}
