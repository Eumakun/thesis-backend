<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\school;

class SchoolController extends Controller
{
    /**
     * Create a new school instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
        $school = new school;
        $request->validate([
            'name' => 'required|unique:schools|string',
        ]);
        $school->fill($request->input())->save();
        $school->save();
        return response()->json([
            'message' => "Successfully created school!"
        ], 200);
    }

    /**
     * Update a school instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request, $data)
    {
        $school = school::find($data);
        if(!school::find($data)) {
            return response()->json([
                'message' => "No school was found!"
            ], 404);
        }
        if($school->name != $request->name) {
            $request->validate([
                'name' => 'required|unique:schools|string',
            ]);
        }
        $school->fill($request->input())->save();
        $school->save();
        return response()->json([
            'message' => "Successfully updated school!"
        ], 200);
    }

    /**
     * Delete schools
     *
     * @param  [string] id
     * @return [string] message
     */
    public function delete($data)
    {
        if(!school::find($data)) {
            return response()->json([
                'message' => "No school was found!"
            ], 404);
        }
        $id = school::find( $data );
        $id->delete();
        return response()->json([
            'message' => "Successfully deleted school!"
        ], 200);
    }

    /**
     * Fetches schools
     *
     * @param  [string] page
     * @param  [string] per_page
     * @return [string] message
     */
    public function schools(Request $request)
    {
        if(count($request->all()) > 0) {
            $school = school::paginate(intval($request->per_page));
        } else {
            $school = school::all();
        }
        return response()->json([
            'message' => "Successfully fetched schools",
            'meta' => $school
        ], 200);
    }
}
