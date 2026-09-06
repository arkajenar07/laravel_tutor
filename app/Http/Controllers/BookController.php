<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Validate request parameters against allowed values
        $validated = $request->validate([
            'sort_by' => 'nullable|string|in:title,author,publisher,year,description,stock',
            'sort_order' => 'nullable|string|in:asc,desc',
            'search' => 'nullable|string',
        ]);

        $sortBy = $validated['sort_by'] ?? 'title';
        $sortOrder = $validated['sort_order'] ?? 'asc';
        $search = $validated['search'] ?? '';
 
        $books = Book::where('title', 'like', "%$search%")
            ->orWhere('author', 'like', "%$search%")
            ->orWhere('publisher', 'like', "%$search%")
            ->orWhere('year', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->orWhere('stock', 'like', "%$search%")
            ->orderBy($sortBy, $sortOrder)
            ->get();

        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'publisher'   => 'required|string|max:255',
            'year'        => 'required|integer',
            'description' => 'required|string',
            'cover'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock'       => 'required|integer',
        ]);

        $book = Book::create($validatedData);

        // Handle cover upload if provided
        if ($request->hasFile('cover')) {
            $book->cover = $request->file('cover')->store('books', 'public');
            $book->save();
        }

        return redirect()
            ->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'publisher'   => 'required|string|max:255',
            'year'        => 'required|integer',
            'description' => 'required|string',
            'cover'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock'       => 'required|integer',
        ]);

        $book->update($validatedData);

        if($request->hasFile('cover')){
            if($book->cover && Storage::disk('public')->exists($book->cover)){
                Storage::disk('public')->delete($book->cover);
            }
            $book->cover = $request->file('cover')->store('books', 'public');
            $book->save();
        }

        return redirect()
            ->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);

        if($book->cover && Storage::disk('public')->exists($book->cover)){
            Storage::disk('public')->delete($book->cover);
        }

        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
 
        $books = Book::where('title', 'like', "%$search%")
            ->orWhere('author', 'like', "%$search%")
            ->orWhere('publisher', 'like', "%$search%")
            ->orWhere('year', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->orWhere('stock', 'like', "%$search%")
            ->get();

        return view('books.index', ["books"=> $books]);
    }

    public function sort(Request $request)
    {
        $sortBy = $request->input('sort_by');
        $sortOrder = $request->input('sort_order');
        
        $books = Book::orderBy($sortBy, $sortOrder)->get();
        return view('books.index', ["books"=> $books]);
    }
}