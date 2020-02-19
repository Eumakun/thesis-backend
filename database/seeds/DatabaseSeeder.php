<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(SchoolSeeder::class);
         $this->call(CourseSeeder::class);
         $this->call(IndustrySeeder::class);
         $this->call(JobTypeSeeder::class);
         $this->call(UserSeeder::class);
    }
}
