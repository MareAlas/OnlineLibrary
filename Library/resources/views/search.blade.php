@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome to reader page') }}</div>

                <div class="card-body">
              
                    <div class="col-md-6">
                        <form action="{{ url('search') }}" method="GET" >
                            <label>Search book by Title</label>
                            <input type="search" name="search" id="search" value="{{ Request::get('search') }}" class="form-control" placeholder="Search"/>              
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ url('search') }}" method="GET" > 
                            <label>Search book By Book Number</label>
                            <input type="search" name="searchByNum" id="searchByNum" value="{{ Request::get('searchByNum') }}" class="form-control" placeholder="Search"/>            
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ url('search') }}" method="GET" > 
                            <label>Search book By Book Authors</label>
                            <input type="search" name="searchByAuthors" id="searchByAuthors" value="{{ Request::get('searchByAuthors') }}" class="form-control" placeholder="Search"/>            
                        </form>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <label>Go Back to see All books</label>
                        <a href="{{ url('home/') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a> 
                    </div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Book Title</th>
                                    <th>Book Number</th>
                                    <th>Author</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($searchBooks as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <th>{{ $book->book_number }}</th>
                                    <th>{{ $book->author_id }}</th>
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
    </div>
</div>
@endsection
