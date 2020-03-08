<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Import\SurveyAnswerImport;
use App\survey_answer;
use App\course;
use App\industry;
use App\job_type;
use App\school;
use App\education_history;
use App\Tier;
use App\employment_history;
use DB;
use Carbon\Carbon;

class SurveyAnswerController extends Controller
{
    /**
     * Fetches survey data
     *
     * @param  [string] page
     * @param  [string] per_page
     * @return [string] message
     */
    public function surveys(Request $request)
    {
        if(count($request->all()) > 0) {
            $users = survey_answer::with([
                "education.school",
                "education.course",
                "employment.industry",
                "employment.jobType",
                "latestEmployment"
            ])
            ->whereHas('latestEmployment',function ( $subquery ) use($request){
                $subquery->when(!empty($request['job_description']) , function ($query) use($request){
                    return $query->where('job_description', 'like', '%' . $request['job_description']. '%');
                });
            })
            ->when(!empty($request['full_name']) , function ($query) use($request){
                return $query->where('first_name','like', '%' . $request['full_name']. '%')
                    ->orWhere('middle_name', 'like', '%' . $request['full_name']. '%')
                    ->orWhere('last_name', 'like', '%' . $request['full_name']. '%');
            })
            ->when(!empty($request['employment_status']) , function ($query) use($request){
                return $query->where('employment_status', $request['employment_status']);
            })
            ->orderBy($request->sort_by != null ? $request->sort_by : 'created_at',$request->order != null ? $request->order : 'desc')
            ->paginate(intval($request->per_page));
            
        } else {
            $users = survey_answer::with([
                "education.school",
                "education.course",
                "employment.industry",
                "employment.jobType",
                "latestEmployment"
            ])
            ->whereHas('latestEmployment',function ( $subquery ) use($request){
                $subquery->when(!empty($request['job_description']) , function ($query) use($request){
                    return $query->where('job_description', 'like', '%' . $request['job_description']. '%');
                });
            })
            ->when(!empty($request['full_name']) , function ($query) use($request){
                return $query->where('first_name',$request['full_name'])
                    ->orWhere('middle_name', 'like', '%' . $request['full_name']. '%')
                    ->orWhere('last_name', $request["full_name"]);
            })
            ->when(!empty($request['employment_status']) , function ($query) use($request){
                return $query->where('employment_status', $request['employment_status']);
            })
            ->orderBy($request->sort_by != null ? $request->sort_by : 'created_at',$request->order != null ? $request->order : 'desc')
            // ->whereHas("latestEmployment", function($q) use($request) {
            //     if(isset($request['job_description'])) {
            //         $q->where('job_description','like', '%' . $request['job_description']. '%');
            //     }
            // })
            ->get();
        }
        return response()->json([
            'message' => "Successfully fetched survey data",
            'meta' => $users
        ], 200);
    }

    /**
     * Create survey
     *
     * @param  [string] first_name
     * @param  [string] last_name
     * @param  [string] address
     * @param  [int] age
     * @param  [int] course_id
     * @param  [int] school_id
     * @param  [int] job_id
     * @param  [int] industry_id
     * @param  [string] job_description
     * @param  [date] date_graduated
     * @param  [date] date_employed
     * @return [string] message
     */
    public function create(Request $request)
    {
        if(survey_answer::where([
            'first_name' => $request->first_name,
             'middle_name' => $request->middle_name,
              'last_name' => $request->last_name,
              'birth_date' => $request->birth_date,
              ])->exists()) {
                $survey = survey_answer::where([
                    'first_name' => $request->first_name,
                     'middle_name' => $request->middle_name,
                      'last_name' => $request->last_name,
                      'birth_date' => $request->birth_date,
                      ])->first();
                foreach($request->education as $key => $input) {
                    $data = array(
                        "survey_id" => $survey->id,
                        "course_id" => $input["course_id"],
                        "school_id" => $input["school_id"],
                        "date_graduated" => $input["date_graduated"],
                    );
                    $education_history = new education_history;
                    $education_history->fill($data)->save();
                }
                if(isset($request->employment)) {
                    foreach($request->employment as $key => $input) {
                        $data = array(
                            "survey_id" => $survey->id,
                            "job_id" => $input["job_id"],
                            "industry_id" => $input["industry_id"],
                            "job_description" => $input["job_description"],
                            "date_employed" => $input["date_employed"],
                            "date_resigned" => isset($input["date_resigned"]) ? $input["date_resigned"] : null,
                        );
                        $employment_history = new employment_history;
                        $employment_history->fill($data)->save();
                    }
                }
                return response()->json([
                    'message' => "Successfully created survey data!"
                ], 200);  
        }
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|string',
            // 'age' => 'required|numeric',
            'birth_date' => 'required|date',
            'employment_status' => 'required|string',
            "education"    => "required|array|min:1",
            "employment"    => "array",
            'education.*.course_id' => 'required|exists:courses,id',
            'education.*.school_id' => 'required|exists:schools,id',
            'education.*.date_graduated' => 'required|date',
            // 'employment.*.job_id' => 'required|exists:job_types,id',
            // 'employment.*.industry_id' => 'required|exists:industries,id',
            // 'employment.*.date_employed' => 'required|date',
            // 'employment.*.date_resigned' => 'date',
        ]);
        $survey = new survey_answer;
        $survey->fill($request->input())->save();
        foreach($request->education as $key => $input) {
            $data = array(
                "survey_id" => $survey->id,
                "course_id" => $input["course_id"],
                "school_id" => $input["school_id"],
                "date_graduated" => $input["date_graduated"],
            );
            $education_history = new education_history;
            $education_history->fill($data)->save();
        }
        if(isset($request->employment)) {
            foreach($request->employment as $key => $input) {
                $data = array(
                    "survey_id" => $survey->id,
                    "job_id" => $input["job_id"],
                    "industry_id" => $input["industry_id"],
                    "job_description" => $input["job_description"],
                    "date_employed" => $input["date_employed"],
                    "date_resigned" => isset($input["date_resigned"]) ? $input["date_resigned"] : null,
                );
                $employment_history = new employment_history;
                $employment_history->fill($data)->save();
            }
        }
        return response()->json([
            'message' => "Successfully created survey data!"
        ], 200);
    }

    /**
     * Update survey
     *
     * @param  [string] first_name
     * @param  [string] last_name
     * @param  [string] address
     * @param  [int] age
     * @param  [int] course_id
     * @param  [int] school_id
     * @param  [int] job_id
     * @param  [int] industry_id
     * @param  [string] job_description
     * @param  [date] date_graduated
     * @param  [date] date_employed
     * @return [string] message
     */
    public function update(Request $request, $data)
    {
        $survey = survey_answer::find($data);
        if(!survey_answer::find($data)) {
            return response()->json([
                'message' => "No survey data was found!"
            ], 404);
        }
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'employment_status' => 'required|string',
            // 'age' => 'required|numeric',
            "education"    => "required|array|min:1",
            'gender' => 'required|string',
            "employment"    => "array",
            'birth_date' => 'required|date',
            'education.*.course_id' => 'required|exists:courses,id',
            'education.*.school_id' => 'required|exists:schools,id',
            'education.*.date_graduated' => 'required|date',
            // 'employment.*.job_id' => 'required|exists:job_types,id',
            // 'employment.*.industry_id' => 'required|exists:industries,id',
            // 'employment.*.date_employed' => 'required|date',
            // 'employment.*.date_resigned' => 'date',
        ]);
        $educ = [];
        $emp = [];
        foreach($request->education as $key => $input) {
            $data = array(
                "survey_id" => $survey->id,
                "course_id" => $input["course_id"],
                "school_id" => $input["school_id"],
                "date_graduated" => $input["date_graduated"],
            );
            $education_history = new education_history;
            if(isset($input["id"]) && education_history::find($input["id"]) != null) {
                $education_history = education_history::find($input["id"]);
                $educ[] = $input["id"];
            }
            $education_history::where('survey_id',$survey->id)->whereNotIn('id', $educ)->delete();
            $education_history->fill($data)->save();

        }
        if(isset($request->employment)) {
            foreach($request->employment as $key => $input) {
                $data = array(
                    "survey_id" => $survey->id,
                    "job_id" => $input["job_id"],
                    "industry_id" => $input["industry_id"],
                    "job_description" => $input["job_description"],
                    "date_employed" => $input["date_employed"],
                    "date_resigned" => isset($input["date_resigned"]) ? $input["date_resigned"] : null,
                );
                $employment_history = new employment_history;
                if(isset($input["id"]) && employment_history::find($input["id"]) != null) {
                    $employment_history = employment_history::find($input["id"]);
                    $emp[] = $input["id"];
                }
                $employment_history::where('survey_id',$survey->id)->whereNotIn('id', $emp)->delete();
                $employment_history->fill($data)->save();
            }
        }
        $survey->fill($request->input())->save();
        return response()->json([
            'message' => "Successfully updated survey data!"
        ], 200);
    }
    
    /**
     * Delete survey data
     *
     * @param  [string] id
     * @return [string] message
     */
    public function delete($data)
    {
        if(!survey_answer::find($data)) {
            return response()->json([
                'message' => "No survey data was found!"
            ], 404);
        }
        $employment_history = new employment_history;
        $education_history = new education_history;
        $id = survey_answer::find( $data );
        $employment_history::where('survey_id',$data)->delete();
        $education_history::where('survey_id',$data)->delete();
        $id->delete();
        return response()->json([
            'message' => "Successfully deleted survey data!"
        ], 200);
    }

    /**
     * Fetches survey statistics
     *
     * @return [string] message
     */
    public function dashboard(Request $request) {
        $employed = survey_answer::where('employment_status', "employed")
            ->whereHas("latestEducation", function($q) use($request){
               $q->when(!empty($request['school_id']) , function ($query) use($request){
                    return $query->where('school_id', $request['school_id']);
                });
            })
            ->count();
        $unemployed = survey_answer::where('employment_status', "unemployed")
            ->whereHas("latestEducation", function($q) use($request){
                $q->when(!empty($request['school_id']) , function ($query) use($request){
                    return $query->where('school_id', $request['school_id']);
                });
            })
            ->count();

        $age =  survey_answer::groupBy('age')->whereHas("latestEducation", function($q) use($request){
            $q->when(!empty($request['school_id']) , function ($query) use($request){
                 return $query->where('school_id', $request['school_id']);
             });
         })
        ->get("age");

        $unemployedAge = DB::table('survey_answers')
        ->select('age', DB::raw('SUM(case when employment_status = "unemployed" then 1 else 0 end) as unemployed'))
        ->leftJoin('education_histories','survey_answers.id','=', 'education_histories.survey_id')
        ->when(!empty($request['school_id']) , function ($query) use($request){
            return $query->where('school_id', $request['school_id']);
        })
        // ->latest('education_histories.created_at')
        ->groupBy('age')
        ->get();

        $employedAge = DB::table('survey_answers')
        ->select('age', DB::raw('SUM(case when employment_status = "employed" then 1 else 0 end) as employed'))
        ->leftJoin('education_histories','survey_answers.id','=', 'education_histories.survey_id')
        ->when(!empty($request['school_id']) , function ($query) use($request){
            return $query->where('school_id', $request['school_id']);
        })
        // ->latest('education_histories.created_at')
        ->groupBy('age')
        ->get();

        $date_graduated =  education_history::get("date_graduated")
        ->groupBy(function($q) {
            return Carbon::parse($q->date_graduated)->format('Y');
        });

        $unemployedDateGraduated = DB::table('education_histories')
        ->select(DB::raw('year(date_graduated) as year'),DB::raw('SUM(case when employment_status = "unemployed" then 1 else 0 end) as unemployed'))
        ->leftJoin('survey_answers','education_histories.survey_id','=', 'survey_answers.id')
        ->when(!empty($request['school_id']) , function ($query) use($request){
            return $query->where('school_id', $request['school_id']);
        })
        ->groupBy(DB::raw('year(date_graduated)'))
        ->get();

        $employedDateGraduated = DB::table('education_histories')
        ->select(DB::raw('year(date_graduated) as year'),DB::raw('SUM(case when employment_status = "employed" then 1 else 0 end) as employed'))
        ->leftJoin('survey_answers','education_histories.survey_id','=', 'survey_answers.id')
        ->when(!empty($request['school_id']) , function ($query) use($request){
            return $query->where('school_id', $request['school_id']);
        })
        ->groupBy(DB::raw('year(date_graduated)'))
        ->get();

        $gender =  survey_answer::groupBy('gender')
        ->get("gender");

        $unemployedGender = DB::table('survey_answers')
        ->select('gender', DB::raw('SUM(case when employment_status = "unemployed" then 1 else 0 end) as unemployed'))
        ->leftJoin('education_histories','survey_answers.id','=', 'education_histories.survey_id')
        ->when(!empty($request['school_id']) , function ($query) use($request){
            return $query->where('school_id', $request['school_id']);
        })
        ->groupBy('gender')
        ->get();

        $employedGender = DB::table('survey_answers')
        ->select('gender', DB::raw('SUM(case when employment_status = "employed" then 1 else 0 end) as employed'))
        ->leftJoin('education_histories','survey_answers.id','=', 'education_histories.survey_id')
        ->when(!empty($request['school_id']) , function ($query) use($request){
            return $query->where('school_id', $request['school_id']);
        })
        ->groupBy('gender')
        ->get();
        
        $tierlist = survey_answer::with(["latestEmployment", "latestEducation"])
        ->where("employment_status", "employed")
        ->whereHas("latestEmployment")
        ->whereHas("latestEducation", function($q) use($request){
            $q->when(!empty($request['school_id']) , function ($query) use($request){
                 return $query->where('school_id', $request['school_id']);
             });    
         })
        ->get();
        // return $tierlist;
        $tier1 = 0;
        $tier2 = 0;
        $tier3 = 0;
        $tier4 = 0;
        $unclassified = 0;
        foreach($tierlist as $key => $row) {
            if (Tier::where([
                'course_id' => $row->latestEducation->course_id,
                 'job_id' => $row->latestEmployment->job_id,
                  'industry_id' => $row->latestEmployment->industry_id,
                  'tier_number' => 1
                  ])->exists() ) {  
                    $tier1++;
            }
            if (Tier::where([
                'course_id' => $row->latestEducation->course_id,
                 'job_id' => $row->latestEmployment->job_id,
                  'industry_id' => $row->latestEmployment->industry_id,
                  'tier_number' => 2
                  ])->exists() ) { 
                    $tier2++;
            }
            if (Tier::where([
                'course_id' => $row->latestEducation->course_id,
                 'job_id' => $row->latestEmployment->job_id,
                  'industry_id' => $row->latestEmployment->industry_id,
                  'tier_number' => 3
                  ])->exists() ) {  
                    $tier3++;
            } 
            if (Tier::where([
                'course_id' => $row->latestEducation->course_id,
                 'job_id' => $row->latestEmployment->job_id,
                  'industry_id' => $row->latestEmployment->industry_id,
                  'tier_number' => 4
                  ])->exists() ) {  
                    $tier4++;
            } 
        }
        $total = survey_answer::whereHas("latestEducation", function($q) use($request){
            $q->when(!empty($request['school_id']) , function ($query) use($request){
                 return $query->where('school_id', $request['school_id']);
             });
         })
         ->count();
        $dashboard = array(
            'total' => $total,
            'employed' => $employed,
            'unemployed' => $unemployed,
            'employedAge' => $employedAge,
            'age' => $age,
            'date_graduated' => $date_graduated,
            'unemployedAge' => $unemployedAge,
            'unemployedDateGraduated' => $unemployedDateGraduated,
            'employedDateGraduated' => $employedDateGraduated,
            'gender' => $gender,
            'unemployedGender' => $unemployedGender,
            'employedGender' => $employedGender,
            'tier1' => $tier1,
            "tier2" => $tier2,
            "tier3" => $tier3,
            "tier4" => $tier4,
            "unclassified" => $employed - ($tier1 + $tier2 + $tier3 + $tier4)
        );
        return response()->json([
            'message' => "Successfully fetched dashboard data!",
            'meta' => $dashboard,
        ], 200);
    }

    /**
     * Imports survey answers from external sources (e.g spreadsheet)
     * @param data
     */
    public function importAnswer(Request $request) {
        if(!isset($request["file"])) {
          return  response()->json([
                'message' => 'No file was selected.'
            ], 404);
        }
        $excel = Excel::toCollection(new SurveyAnswerImport, $request['file']);
        $data = [];
        foreach($excel[0] as $key => $value) 
        {
        
            if($key != 0) {
                $course_id = course::where('name','like', '%' . $value[7] . '%')->first();
                $school_id = school::where('name','like', '%' . $value[8] . '%')->first();
                if($value[0] != null && 
                    $value[2] != null &&
                    $course_id != null &&
                     $school_id != null &&
                     $value[3] != null && 
                      $value[4] != null &&
                      $value[5] != null &&
                      $value[6] != null ) {
                
                    $job_id = null;
                    $industry_id = null;
                    if($value[10] != null && $value[11] != null) {
                        $job_id = job_type::where('name','like', '%' . $value[10] . '%')->first();
                        $industry_id = industry::where('name','like', '%' . $value[11] . '%')->first();
                    }
                    if(!$job_id && !$industry_id) {
                        $data[] = array (
                            'first_name' => $value[0],
                            'middle_name' => $value[1],
                            'last_name' => $value[2],
                            'address' => $value[3],
                            'employment_status' => strtolower($value[4]),
                            'birth_date' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[5])),
                            'gender' => strtolower($value[6]),
                            'education' => [
                                array(
                                    'course_id' => $course_id->id,
                                    'school_id' => $school_id->id,
                                    'date_graduated' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[9]))
                                )
                            ]
                        );
                    } else {
                        $data[] = array (
                            'first_name' => $value[0],
                            'middle_name' => $value[1],
                            'last_name' => $value[2],
                            'address' => $value[3],
                            'employment_status' => strtolower($value[4]),
                            'birth_date' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[5])),
                            'gender' => strtolower($value[6]),
                            'education' => [
                                array(
                                    'course_id' => $course_id->id,
                                    'school_id' => $school_id->id,
                                    'date_graduated' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[9]))
                                )
                            ],
                            'employment' => [
                                array(
                                    'job_id' => $job_id->id,
                                    'industry_id' => $industry_id->id,
                                    'job_description' => $value[12],
                                    'date_employed' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[13])),
                                    'date_resigned' => $value[15] != null ? Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[14])) : null
                                )
                            ],
                        );
                    }
                }
            }
        }
        foreach($data as $key => $row) {
            $this->create(new Request($row));
        }
        return response()->json([
            'message' => "Successfully imported survey data!",
        ], 200);
    }
}
