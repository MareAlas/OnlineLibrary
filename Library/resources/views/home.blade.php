@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome to reader page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
     
                    <div class="col-md-6">
                        <label>Search book</label>
                        <input type="search" name="search" id="search" value="" class="form-control" placeholder="Search"/>
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
                                @forelse ($books as $book)
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
