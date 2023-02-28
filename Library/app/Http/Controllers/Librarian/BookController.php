<?php

namespace App\Http\Controllers\Librarian;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        return view('librarian.books.index');
    }

    public function create()
    {
        $authors = Author::all();
        return view('librarian.books.create', compact('authors'));
    }

    public function store(BookFormRequest $request)
    {
        $validatedData  = $request->validated();
        $author         = Author::findOrFail($validatedData['author_id']);

        $book = $author->books()->create([
            'author_id'   => $validatedData['author_id'],
            'title'       => $validatedData['title'],
            'description' => $validatedData['description'],
            'book_number' => $validatedData['book_number'],
        ]);

        return redirect('librarian/books')->with('message', 'Book added');
    }
    
}
