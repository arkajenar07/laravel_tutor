<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $student = Student::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'class' => $request->class,
        ]);

        return response()->json($student, 201);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'class' => $request->class,
        ]);

        return response()->json($student, 200);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return response()->json($student, 200);
    }
}
