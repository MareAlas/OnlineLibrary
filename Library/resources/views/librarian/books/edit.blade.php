@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">

        <form action="{{ url('librarian/books/'.$book->id) }}" method="POST" >
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="title">Book title</label>
                <input type="text"  value="{{ $book->title }}"  class="form-control" id="title" name="title" placeholder="title" />
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $book->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="book_number">Book Number</label>
                <input type="number" class="form-control" value="{{ $book->book_number }}" id="book_number" name="book_number" />
            </div>
            <div class="mb-3">
                <label>Author</label>
                <select name="author_id" class="form-control">
                    @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : ''}}>
                        {{ $author->name }} {{ $author->surname }}
                    </option>  
                    @endforeach
                </select>
                </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
  </form>

</div>
</div> 
@endsection