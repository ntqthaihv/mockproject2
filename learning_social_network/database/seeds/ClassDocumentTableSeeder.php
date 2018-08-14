<?php

use Illuminate\Database\Seeder;

class ClassDocumentTableSeeder extends Seeder
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
        DB::table('classdocument')->truncate();
        for($i = 0; $i < $limit; $i++) {
            DB::table('classdocument')->insert([
                'class_id' => $faker->numberBetween(1,1),
                'description' => $faker->text(1,20),
                'url' => $faker->url,
                'creator' => $faker->numberBetween(1,1),
            ]);
        }
    }
}
