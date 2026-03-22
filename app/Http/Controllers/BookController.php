<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the books.
     */
    public function index()
    {
        // Fetch books with pagination (matching your index view)
        $books = Book::latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new book.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created book in storage.
     */
 public function store(Request $request)
{
    $validated = $request->validate([
        'book_id'        => 'required|unique:books,book_id',
        'title'          => 'required|string|max:255',
        'author'         => 'required|string|max:255',
        'genre'          => 'required|string|max:100',
        // PALITAN ITO: Gawing 'date' imbes na 'integer'
        'year_published' => 'required|date|before_or_equal:today', 
    ]);

    // HINDI mo na kailangan lagyan ng . "-01-01" dahil kumpleto na ang date mula sa calendar
    Book::create($validated);

    return redirect()->route('books.index')->with('success', 'Book created!');
}

        public function update(Request $request, Book $book)
        {
            $validated = $request->validate([
                'book_id'        => 'required|unique:books,book_id,' . $book->id,
                'title'          => 'required|string|max:255',
                'author'         => 'required|string|max:255',
                'genre'          => 'required|string|max:100',
                
                'year_published' => 'required|date|before_or_equal:today',
            ]);

            $book->update($validated);

            return redirect()->route('books.index')->with('success', 'Book updated!');
        }

    /**
     * Display the specified book.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified book.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified book in storage.
     */
 

    /**
     * Remove the specified book from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully');
    }
}