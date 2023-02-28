
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div>
            <div class="card-header">
                <h3>Authors
                    <a href="{{ url('librarian/authors/create') }}" class="btn btn-primary btn-sm text-white float-end">Add Author</a>
                </h3>
            </div>
            <div class="card-body">
                <table>
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
                                <a>Edit</a>
                                <a>Delete</a>
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
@endsection


