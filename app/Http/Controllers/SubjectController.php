<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    //api

    public function index()
    {
        $subjects = Subject::all();
        return response()->json($subjects);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'subject_name' => 'required',
            'mentor_name' => 'required',
            'description' => 'required',
            'duration' => 'required',
        ]);

        $subject = Subject::create($validate);
        return response()->json($subject, 201);
    }

    public function show($id)
    {
        $subject = Subject::find($id);
        if (!$subject) {
            return response()->json([
                "message" => "Subject not found",
                "status" => "error"
            ], 404);
        }
        return response()->json($subject);
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return response()->json([
                "message" => "Subject not found",
                "status" => "error"
            ], 404);
        }
        
        $validate = $request->validate([
            'subject_name' => 'required',
            'mentor_name' => 'required',
            'description' => 'required',
            'duration' => 'required',
        ]);
        
        
        $subject->update($validate);
        return response()->json($subject);
    }

    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return response()->json($subject);
    }
}
