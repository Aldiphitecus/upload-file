@extends('layouts.template')
@section('content')
    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        @foreach ($data as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->content }}</td>
                <td><img class="w-25" src="{{ asset('storage/' . $article->featured_image) }}" alt=""></td>
                <td>
                    <div class="container">
                        <div class="d-flex justify-content-center align-items-center">
                            <a class="btn btn-warning m-1" href="/article-edit/{{ $article->id }}">Edit</a>
                            <a class="btn btn-danger m-1" href="">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
