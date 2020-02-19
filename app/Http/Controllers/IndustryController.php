<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\industry;

class IndustryController extends Controller
{
    /**
     * Create a new industry instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
        $industry = new industry;
        $request->validate([
            'name' => 'required|unique:industries|string',
        ]);
        $industry->fill($request->input())->save();
        $industry->save();
        return response()->json([
            'message' => "Successfully created industry!"
        ], 200);
    }

    /**
     * Update a industry instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request, $data)
    {
        $industry = industry::find($data);
        if(!industry::find($data)) {
            return response()->json([
                'message' => "No course was found!"
            ], 404);
        }
        if($industry->name != $request->name) {
            $request->validate([
                'name' => 'required|unique:industries|string',
            ]);
        }
        $industry->fill($request->input())->save();
        $industry->save();
        return response()->json([
            'message' => "Successfully updated industry!"
        ], 200);
    }

    /**
     * Delete industry
     *
     * @param  [string] id
     * @return [string] message
     */
    public function delete($data)
    {
        if(!industry::find($data)) {
            return response()->json([
                'message' => "No industry was found!"
            ], 404);
        }
        $id = industry::find( $data );
        $id->delete();
        return response()->json([
            'message' => "Successfully deleted industry!"
        ], 200);
    }

    /**
     * Fetches industries
     *
     * @param  [string] page
     * @param  [string] per_page
     * @return [string] message
     */
    public function industries(Request $request)
    {
        if(count($request->all()) > 0) {
            $industry = industry::paginate(intval($request->per_page));
        } else {
            $industry = industry::all();
        }
        return response()->json([
            'message' => "Successfully fetched industries",
            'meta' => $industry
        ], 200);
    }
}
