<?php

use Illuminate\Database\Seeder;
use App\job_type;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array(
                "name" => "Computer Hardware Maintenance",
            ),
            array(
                "name" => "Software Engineering",
            ),
            array(
                "name" => "Janitorial and Utility",
            ),
            array(
                "name" => "Medical Practicioner",
            ),
            array(
                "name" => "Business Management",
            ),
            array(
                "name" => "Human Resource Management",
            ),
            array(
                "name" => "Finance and Accounting",
            ),
        );

        foreach ($data as $key => $value) {
            job_type::create($value);
        }
    }
}
