<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        $limit = 10;
        DB::table('users')->truncate();
        for($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'id' => $i++,
                'email' => $faker->unique()->email,
                'full_name' => $faker->name,
                'family_name' => $faker->lastName,
                'given_name' => $faker->name(10),
                'avatar' => $faker->text(20),
                'password' => $faker->text(20),
                //'password' => '1234567',
         ]);
        }
    }
}
