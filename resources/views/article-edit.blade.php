@extends('layouts.template')

@section('content')
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title: </label>
                <input type="text" class="form-control" required="required" name="title" value="{{ $data->title }}"></br>
                <label for="content">Content: </label>
                <textarea type="text" class="form-control" required="required" name="content">{{ $data->content }}</textarea></br>
                <label for="image">Feature Image: </label>
                <img class="m-2 w-25" src="{{ asset('storage/' . $data->featured_image) }}" alt="">
                <input type="file" class="form-control" name="image"></br>
                <button type="submit" name="submit" class="btn btn-primary float-right">Save</button>
            </div>
        </form>
    </div>
@endsection
