
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                <h3>Authors
                    <a href="{{ url('librarian/authors/create') }}" class="btn btn-primary btn-sm text-white float-end">Add Author</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordared table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($authors as $authorItem)
                        <tr>
                            <td>{{ $authorItem->id }}</td>
                            <td>{{ $authorItem->name }}</td>
                            <td>{{ $authorItem->surname }}</td>
                            <td>
                                <a href="{{ url('librarian/authors/'.$authorItem->id.'/edit') }}" class="btn btn-success">Edit</a>
                                <a href="{{ url('librarian/authors/'.$authorItem->id.'/delete') }}" 
                                    onclick="return confirm('Are you sure want to delete this data?')" 
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr> 
                        @empty
                            No Authors  
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 
</div> 
@endsection


