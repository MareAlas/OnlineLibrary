<?php

namespace App\Http\Controllers\Librarian;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookFormRequest;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('librarian.books.index', compact('books'));
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
    
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('librarian.books.edit', compact('book', 'authors'));
    }

    public function update(BookFormRequest $request, Book $book)
    {
        $validatedData = $request->validated();

        $author        = Author::findOrFail($validatedData['author_id'])
                            ->books()->where('id', $book->author_id)->first();

        if($author)
        {
            Book::where('id', $book->id)->update([
                'title'         => $validatedData['title'],
                'description'   => $validatedData['description'],
                'book_number'   => $validatedData['book_number'],
                'author_id'     => $validatedData['author_id'],
            ]);
    
            return redirect('librarian/books')->with('message', 'Books updated successufully');
        }
        else
        {
            return redirect('librarian/books')->with('message', 'Author ID not found found');
        }
    }

    public function destroy(int $book_id)
    {
        $book = Book::findOrFail($book_id);

        $book->delete();
        return redirect()->back()->with('message', 'Book deleted');
    }


}
