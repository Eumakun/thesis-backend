<?php

use Illuminate\Database\Seeder;
use App\industry;

class IndustrySeeder extends Seeder
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
                "name" => "Aviation",
            ),
            array(
                "name" => "Arts",
            ),
            array(
                "name" => "Business",
            ),
            array(
                "name" => "Law Enforcement",
            ),
            array(
                "name" => "Media",
            ),
            array(
                "name" => "Medical",
            ),
            array(
                "name" => "Service Industry",
            ),
            array(
                "name" => "Teaching",
            ),
            array(
                "name" => "Technology",
            ),
            array(
                "name" => "Military",
            ),
            array(
                "name" => "Social Welfare",
            ),
            array(
                "name" => "Animal Welfare",
            ),
        );

        foreach ($data as $key => $value) {
            industry::create($value);
        }
    }
}
