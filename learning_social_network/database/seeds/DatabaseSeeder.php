<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            CourseTableSeeder::class,
            NtqClassTableSeeder::class,
            ClassMenberTableSeeder::class,
            ClassDocumentTableSeeder::class,
            ClassContentTableSeeder::class,
            ClassEventTableSeeder::class,
            ClassAttendanceTableSeeder::class,
        ]);
    }
}
