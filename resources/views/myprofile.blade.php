@extends('layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="img">
                    <img src="" alt="">
                </div>
            </div>
            <div class="col">
                <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group mt-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name"><br>
                        <label for="name">Email</label>
                        <input type="text" class="form-control" value="{{ $user->email }}" name="name"><br>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
