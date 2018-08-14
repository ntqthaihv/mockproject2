<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        $limit = 20;
        DB::table('course')->truncate();
        for($i = 0; $i < $limit; $i++) {
            DB::table('course')->insert([
                'title' => $faker->name,
                'slug' => $faker->slug,
                'thumbnail' => $faker->text(30) ,
                'content' => $faker->text(30) ,
         ]);
        }
    }
}
