@extends('layouts.template')
@section('content')
    <div class="d-flex justify-content-start flex-nowrap">
        @foreach ($data as $article)
            <div class="card m-2 hover:scale-105" style="width: 18rem;">
                <a href="/detail/{{ $article->id }}">
                    <img src="{{ asset('storage/' . $article->featured_image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->content }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
