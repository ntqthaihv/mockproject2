<?php

use Illuminate\Database\Seeder;

class ClassContentTableSeeder extends Seeder
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
        DB::table('classcontent')->truncate();
        for($i = 0; $i < $limit; $i++) {
            DB::table('classcontent')->insert([
                'class_id' => $faker->numberBetween(1,1),
                'title' => $faker->title,
                'thumbnail' => $faker->text(20),
                'content' => $faker->text(20),
                'level' => $faker->text(10),
                'duration' => $faker->numberBetween(1,100),
                'documents'=> $faker->name,
                'start_date' => $faker->datetime,
                'end_date' => $faker->datetime,
                'author' => $faker->numberBetween(1,1),
                'is_done' => $faker->numberBetween(0,1),
                'is_approve' => $faker->numberBetween(0,1),
            ]);
        }
    }
}
