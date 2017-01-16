<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($a=0;$a<25;$a++) {
            DB::table('posts')->insert([
                'title' => rtrim($faker->sentence(5), "."),
                'content' => $faker->text(200)
            ]);
        }    
    }
}
