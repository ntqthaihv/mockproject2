<?php

use Illuminate\Database\Seeder;

class ClassEventTableSeeder extends Seeder
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
        DB::table('classevent')->truncate();
        for($i = 0; $i < $limit; $i++) {
            DB::table('classevent')->insert([
                'class_id' => $faker->numberBetween(1,1),
                'title' => $faker->title,
                'thumbnail' => $faker->text(20),
                'content' => $faker->text(20),
                'documents'=> $faker->text(20),
                'start_date' => $faker->datetime,
                'end_date' => $faker->datetime,
                'author' => $faker->numberBetween(1,1),
                'speaker' => $faker->name,
            ]);
        }
    }
}
