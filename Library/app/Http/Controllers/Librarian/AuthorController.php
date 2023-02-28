<?php

namespace App\Http\Controllers\Librarian;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorFromRequest;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('librarian.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('librarian.authors.create');
    }

    public function store(AuthorFromRequest $request)
    {
        $validatedData = $request->validated();

        $author = new Author;
        $author->name               = $validatedData['name'];
        $author->surname            = $validatedData['surname'];

        $uploadPath                 = 'uploads/authors/';
        if($request->hasFile('image'))
        {
            $file                   = $request->file('image');
            $ext                    = $file->getClientOriginalExtension();
            $filename               = time().'.'.$ext;
            $file->move('uploads/authors/', $filename);
            $author->image          = $uploadPath.$filename;           
        }
        $author->save();
        return redirect('authors/')->with('message', 'Author created successufully');
    }

}
