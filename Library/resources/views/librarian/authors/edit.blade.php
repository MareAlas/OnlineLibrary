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
                    @method('PUT')
                    <div class="mb-3">
                        <label>Author Name</label>
                        <input type="text" name="name" value="{{ $author->name }}" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label>Author Surname</label>
                        <input type="text" name="surname" value="{{ $author->surname }}" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control"/>
                        <img src="{{ asset("$author->image") }}" style="width:50px; height50px;" alt="Slider" />
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection