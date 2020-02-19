<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tier;

class TierController extends Controller
{
    /**
     * Create a new Tier  instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
        $tier = new Tier;
        if (Tier::where([
            'course_id' => $request->course_id,
             'job_id' => $request->job_id,
              'industry_id' => $request->industry_id,
            //   'tier_number' => $request->tier_number
              ])->exists()) { 

                return response()->json([
                    'error' => "Tier Specification Already Exist!"
                ], 500);   
        }
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'job_id' => 'required|exists:job_types,id',
            'industry_id' => 'required|exists:industries,id',
            'tier_number' => 'required'
        ]);
        $tier->fill($request->input())->save();
        $tier->save();
        return response()->json([
            'message' => "Successfully created tier specification!"
        ], 200);
    }

    /**
     * Update a Tier  instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request, $data)
    {
        $tier = Tier::find($data);
        if(!Tier::find($data)) {
            return response()->json([
                'message' => "No Tier  specification was found!"
            ], 404);
        }
        if($tier->course_id != $request->course_id || $tier->job_id != $request->job_id || $tier->industry_id != $request->industry_id || $tier->tier_number != $request->tier_number) {
            if (Tier::where([
                'course_id' => $request->course_id,
                 'job_id' => $request->job_id,
                  'industry_id' => $request->industry_id,
                  'tier_number' => $request->tier_number
                  ])->exists() ) { 
    
                    return response()->json([
                        'error' => "Tier Specification Already Exist!"
                    ], 500);   
            }
            $request->validate([
                'course_id' => 'required|exists:courses,id',
                'job_id' => 'required|exists:job_types,id',
                'industry_id' => 'required|exists:industries,id',
                'tier_number' => 'required'
            ]);
        }
        $tier->fill($request->input())->save();
        $tier->save();
        return response()->json([
            'message' => "Successfully updated Tier specification!"
        ], 200);
    }

    /**
     * Delete tier spec
     *
     * @param  [string] id
     * @return [string] message
     */
    public function delete($data)
    {
        if(!Tier::find($data)) {
            return response()->json([
                'message' => "No Tier specification was found!"
            ], 404);
        }
        $id = Tier::find( $data );
        $id->delete();
        return response()->json([
            'message' => "Successfully deleted Tier Spec!"
        ], 200);
    }

    /**
     * Fetches Tier Specs
     *
     * @param  [string] page
     * @param  [string] per_page
     * @return [string] message
     */
    public function tier(Request $request)
    {
        if(count($request->all()) > 0) {
            $tier = Tier::with(["course","industry","jobType"])->paginate(intval($request->per_page));
        } else {
            $tier = Tier::with(["course","industry","jobType"])->get();
        }
        return response()->json([
            'message' => "Successfully fetched Tier",
            'meta' => $tier
        ], 200);
    }
}
