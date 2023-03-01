@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
        <div class="card-header">
        <h3>Books
            <a href="{{ url('librarian/books/create') }}" class="btn btn-primary btn-sm text-white float-end">Add Book</a>
        </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordared table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Book Number</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $booksItem)
                    <tr>
                        <td>{{ $booksItem->id }}</td>
                        <td>{{ $booksItem->title }}</td>
                        <td>{{ $booksItem->description }}</td>
                        <td>{{ $booksItem->book_number }}</td>
                        <td>
                            <a href="{{ url('librarian/books/'.$booksItem->id.'/edit') }}" class="btn btn-success">Edit</a>
                            <a href="{{ url('librarian/books/'.$booksItem->id.'/delete') }}" 
                                onclick="return confirm('Are you sure want to delete this data?')" 
                                class="btn btn-danger">Delete</a>
                        </td>
                    </tr> 
                    @empty
                        No Books  
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection

