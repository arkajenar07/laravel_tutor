<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    
public function index(Request $request)
{
    // Validation
    $validated = $request->validate([
        // Searching
        'search' => 'nullable|string',

        // Filtering
        'category' => 'nullable|string',
        'status' => 'nullable|string',

        // Sorting
        'sort_by' => 'nullable|in:id,subject_name,category,status,created_at,updated_at',
        'sort_direction' => 'nullable|in:asc,desc',

        // Pagination
        'page' => 'nullable|integer|min:1',
        'per_page' => 'nullable|integer|min:1',
    ]);

    // Get parameters with default values
    $search = trim($request->input('search', ''));
    $category = $request->input('category', '');
    $status = $request->input('status', '');

    $sortBy = $request->input('sort_by') ?: 'id';
    $sortDirection = $request->input('sort_direction') ?: 'asc';

    $page = max(1, (int) ($request->input('page') ?: 1));
    $per_page = max(1, (int) ($request->input('per_page') ?: 5));

    // Base query
    $query = Subject::query();

    // Searching
    if ($search !== '') {
        $query->where(function ($searchQuery) use ($search) {
            $searchQuery->where('subject_name', 'like', "%{$search}%")
                ->orWhere('mentor_name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('duration', 'like', "%{$search}%");
        });
    }

    // Filtering
    if ($category !== '') {
        $query->where('category', $category);
    }

    if ($status !== '') {
        $query->where('status', $status);
    }

    // Sorting
    $query->orderBy($sortBy, $sortDirection);

    if ($sortBy !== 'id') {
        $query->orderBy('id', 'asc');
    }

    // Pagination
    $subjects = $query
        ->paginate($per_page, ['*'], 'page', $page)
        ->withQueryString();

    // Response
    return response()->json($subjects);
}

    public function store(Request $request)
    {
        $validate = $request->validate([
            'subject_name' => 'required',
            'mentor_name' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'category' => 'required',
            'status' => 'required',
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
            'category' => 'required',
            'status' => 'required',
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
