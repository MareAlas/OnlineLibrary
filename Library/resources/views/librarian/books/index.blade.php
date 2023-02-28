@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
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
            
                </tbody>
            </table>
        </div>
    </div>

@endsection

