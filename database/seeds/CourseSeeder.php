<?php

use Illuminate\Database\Seeder;
use App\course;

class CourseSeeder extends Seeder
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
                "name" => "Animal Production NC II",
            ),
            array(
                "name" => "Aquaculture NC II",
            ),
            array(
                "name" => "Automotive Servicing NC I",
            ),
            array(
                "name" => "Automotive Servicing NC II",
            ),
            array(
                "name" => "Bartending NC II",
            ),
            array(
                "name" => "Beauty Care NC II",
            ),
            array(
                "name" => "Caregiving NC II",
            ),
            array(
                "name" => "Hotel & Restaurant Services NC II",
            ),
            array(
                "name" => "Cookery NC II",
            ),
            array(
                "name" => "Driving NC II",
            ),
            array(
                "name" => "Food Processing NC II",
            ),
            array(
                "name" => "Front Office Services NC II",
            ),
            array(
                "name" => "Health Care Services NC II",
            ),
            array(
                "name" => "Household Services NC II",
            ),
            array(
                "name" => "Housekeeping NC II",
            ),
            array(
                "name" => "Masonry NC II",
            ),
            array(
                "name" => "Massage Therapy NC II",
            ),
            array(
                "name" => "Programming NC IV",
            ),
            array(
                "name" => "Shielded Metal Arc Welding (SMAW) NC I",
            ),
            array(
                "name" => "Shielded Metal Arc Welding (SMAW) NC II",
            ),
        );

        foreach ($data as $key => $value) {
            course::create($value);
        }
    }
}
