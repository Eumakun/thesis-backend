<?php

namespace App\Import;

use App\survey_answer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SurveyAnswerImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        return $rows;
    }
}