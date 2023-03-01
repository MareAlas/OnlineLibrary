<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        $author = Author::all();
        $books = Book::all();
        return view('home', compact('books','author'));
    }

    public function searchBook(Request $request)
    {
        if($request->search)
        {
            $searchBooks = Book::where('title', 'LIKE', '%'.$request->search.'%')->get();
            return view('search', compact('searchBooks'));
        }
        elseif($request->searchByNum)
        {
            $searchBooks = Book::where('book_number', 'LIKE', '%'.$request->searchByNum.'%')->get();
            return view('search', compact('searchBooks'));
        }
        elseif($request->searchByAuthors)
        {
            $searchBooks = Book::where('author_id', 'LIKE', '%'.$request->searchByAuthors.'%')->get();
            return view('search', compact('searchBooks'));
        }
        else 
        {
            return redirect()->back();
        }
    }
    
}
