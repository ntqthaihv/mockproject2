<?php

use Illuminate\Database\Seeder;

class ClassMenberTableSeeder extends Seeder
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
        DB::table('classmember')->truncate();
        for($i = 0; $i < $limit; $i++) {
            DB::table('classmember')->insert([
                'class_id' => $faker->numberBetween(1,1),
                'user_id' => $faker->numberBetween(1,1),
                'is_captain' => $faker->numberBetween(0,1),
                'is_mentor' => $faker->numberBetween(0,1),
                'statust' => $faker->text(20),
            ]);
        }
    }
}
