<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\job_type;

class JobTypeController extends Controller
{
    /**
     * Create a new job_type instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
        $job_type = new job_type;
        $request->validate([
            'name' => 'required|unique:job_types|string',
        ]);
        $job_type->fill($request->input())->save();
        $job_type->save();
        return response()->json([
            'message' => "Successfully created job_type!"
        ], 200);
    }

    /**
     * Update a job_type instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request, $data)
    {
        $job_type = job_type::find($data);
        if(!job_type::find($data)) {
            return response()->json([
                'message' => "No job_type was found!"
            ], 404);
        }
        if($job_type->name != $request->name) {
            $request->validate([
                'name' => 'required|unique:job_types|string',
            ]);
        }
        $job_type->fill($request->input())->save();
        $job_type->save();
        return response()->json([
            'message' => "Successfully updated job_type!"
        ], 200);
    }

    /**
     * Delete job_type
     *
     * @param  [string] id
     * @return [string] message
     */
    public function delete($data)
    {
        if(!job_type::find($data)) {
            return response()->json([
                'message' => "No job_type was found!"
            ], 404);
        }
        $id = job_type::find( $data );
        $id->delete();
        return response()->json([
            'message' => "Successfully deleted job_type!"
        ], 200);
    }

    /**
     * Fetches job types
     *
     * @param  [string] page
     * @param  [string] per_page
     * @return [string] message
     */
    public function jobTypes(Request $request)
    {
        if(count($request->all()) > 0) {
            $job_type = job_type::paginate(intval($request->per_page));
        } else {
            $job_type = job_type::all();
        }
        return response()->json([
            'message' => "Successfully fetched job types",
            'meta' => $job_type
        ], 200);
    }
}
