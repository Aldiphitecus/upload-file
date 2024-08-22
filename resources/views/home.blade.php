@extends('layouts.template')

@section('content')
    <x-slot:title>{{ $title }}</x-slot:title>
    <h1 class="text-lg font-medium">Halo {{ Auth::user()->name }}, ini adalah halaman utama dari web ini.</h1>
@endsection
