<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($a=0;$a<10;$a++) {
            DB::table('tags')->insert([
                'name' => $faker->jobTitle
            ]);
        }
    }
}
