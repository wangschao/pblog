<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user_ids = ['1','2','3'];

         

        factory(App\Article::class, 50)->create()->each(function(){

        });


        



    }
}
