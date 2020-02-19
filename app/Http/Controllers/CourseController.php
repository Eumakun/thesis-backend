<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\course;

class CourseController extends Controller
{
    /**
     * Create a new course instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
        $course = new course;
        $request->validate([
            'name' => 'required|unique:courses|string',
        ]);
        $course->fill($request->input())->save();
        $course->save();
        return response()->json([
            'message' => "Successfully updated course!"
        ], 200);
    }

    /**
     * Update a course instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request, $data)
    {
        $course = course::find($data);
        if(!course::find($data)) {
            return response()->json([
                'message' => "No course was found!"
            ], 404);
        }
        if($course->name != $request->name) {
            $request->validate([
                'name' => 'required|unique:courses|string',
            ]);
        }
        $course->fill($request->input())->save();
        $course->save();
        return response()->json([
            'message' => "Successfully updated course!"
        ], 200);
    }

    /**
     * Delete course
     *
     * @param  [string] id
     * @return [string] message
     */
    public function delete($data)
    {
        if(!course::find($data)) {
            return response()->json([
                'message' => "No course was found!"
            ], 404);
        }
        $id = course::find( $data );
        $id->delete();
        return response()->json([
            'message' => "Successfully deleted course!"
        ], 200);
    }

    /**
     * Fetches course
     *
     * @param  [string] page
     * @param  [string] per_page
     * @return [string] message
     */
    public function courses(Request $request)
    {
        if(count($request->all()) > 0) {
            $course = course::paginate(intval($request->per_page));
        } else {
            $course = course::all();
        }
        return response()->json([
            'message' => "Successfully fetched courses",
            'meta' => $course
        ], 200);
    }
}
