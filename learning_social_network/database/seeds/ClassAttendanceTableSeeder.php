<?php

use Illuminate\Database\Seeder;

class ClassAttendanceTableSeeder extends Seeder
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
        DB::table('classattendance')->truncate();
        for($i = 0; $i < $limit; $i++) {
            DB::table('classattendance')->insert([
                'class_id' => $faker->numberBetween(1,1),
                'contents' => $faker->numberBetween(1,1),
                'member' => $faker->numberBetween(1,1),
                'date' => $faker->datetime,
            ]);
        }
    }
}
