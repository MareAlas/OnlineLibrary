
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
    
            <div class="card-header">
                <h3>Users
                    <a href="{{ url('librarian/users/create') }}" class="btn btn-primary btn-sm text-white float-end">Add User</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordared table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Role As</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role_as }}</td>
                            <td>
                                <a href="{{ url('librarian/users/'.$user->id.'/edit') }}" class="btn btn-success">Edit</a>
                                <a href="{{ url('librarian/users/'.$user->id.'/delete') }}" 
                                    onclick="return confirm('Are you sure want to delete this data?')" 
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr> 
                        @empty
                            No Users  
                        @endforelse
                    </tbody>
                </table>
           
        </div>
    </div>
</div> 
@endsection


