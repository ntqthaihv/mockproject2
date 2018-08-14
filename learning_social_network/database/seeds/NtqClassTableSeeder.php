<?php

use Illuminate\Database\Seeder;

class NtqClassTableSeeder extends Seeder
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
        DB::table('ntqclass')->truncate();
        for($i = 0; $i < $limit; $i++) {
            DB::table('ntqclass')->insert([
                'name' => $faker->name,
                'slug' => $faker->slug,
                'description' => $faker->text(30),
                'thumbnail' => $faker->text(30),
                'course_id' => $faker->numberBetween(1,1),
                'creator' => $faker->numberBetween(1,1),
                'start_date' => $faker->datetime,
                'end_date' => $faker->datetime,
         ]);
        }
    }
}
