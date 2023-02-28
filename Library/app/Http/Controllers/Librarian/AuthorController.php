<?php

namespace App\Http\Controllers\Librarian;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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

    public function edit(Author $author)
    {
        return view('librarian.authors.edit', compact('author'));
    }

    public function update(AuthorFromRequest $request, Author $author)
    {
        $validatedData = $request->validated();
        
        if($request->hasFile('image'))
        {
            $destination = $author->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $file        = $request->file('image');
            $ext         = $file->getClientOriginalExtension();
            $filename    = time().'.'.$ext;
            $file->move('uploads/authors/', $filename);
            $validatedData['image'] = "uploads/authors/$filename";
        }

        Author::where('id', $author->id)->update([
            'name'      => $validatedData['name'],
            'surname'   => $validatedData['surname'],
            'image'     => $validatedData['image'] ?? $author->image,
        ]);

        return redirect('librarian/authors')->with('message', 'Author updated successufully');
    }

    public function destroy(Author $author)
    {
        if($author->count() > 0)
        {
            $destination = $author->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $author->delete(); 
            return redirect('librarian/authors')->with('message', 'Author deleted');
        }
        return redirect('librarian/authors')->with('message', 'Something went wrong');
    }
}
