@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div>
            <div class="card-header">
                <h3>Add Author
                    <a href="{{ url('librarian/authors') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                </h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div alert alert-warning>
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('librarian/authors') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Author Name</label>
                        <input type="text" name="name" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label>Author Surname</label>
                        <input type="text" name="surname" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label>Author Image</label>
                        <input type="file" name="image" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection