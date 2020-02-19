<?php

use Illuminate\Database\Seeder;
use App\school;

class SchoolSeeder extends Seeder
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
                "name" => "Caraga College of Technology",
            ),
            array(
                "name" => "Christian Academy in Davao Oriental Inc.",
            ),
            array(
                "name" => "Doña Jacinta Esteves Memorial College",
            ),
            array(
                "name" => "Don Bosco Training Center",
            ),
            array(
                "name" => "Eastern Davao Academy Inc.",
            ),
            array(
                "name" => "Informatic Technological College of Davao Oriental",
            ),
            array(
                "name" => "Lupon School of Fisheries",
            ),
            array(
                "name" => "Lupon School of Fisheries - Annex",
            ),
            array(
                "name" => "Manay Institute of Technology Inc.",
            ),
            array(
                "name" => "Maritime Technical School of Davao Oriental Inc.",
            ),
            array(
                "name" => "Mati Doctors College Inc.",
            ),
            array(
                "name" => "Mati Polytechnic College Inc. (Mati Polytechnic Institute)",
            ),
            array(
                "name" => "Mati Polytechnic College Inc.- Caraga Extension Campus",
            ),
            array(
                "name" => "Provincial Training Center (SIMTRAC)",
            ),
            array(
                "name" => "Richmond Montessori College Inc.",
            ),
            array(
                "name" => "Software Technological Institute Inc.",
            ),
            array(
                "name" => "St. Mary's College of Baganga Inc.",
            ),
        );

        foreach ($data as $key => $value) {
            school::create($value);
        }
    }
}
