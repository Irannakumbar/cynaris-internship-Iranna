
@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>{{ $title }}</h1>

    <p>{{ $message }}</p>

    <p>Welcome to our Laravel Student Portal. This application demonstrates Laravel routing, controllers and Blade templates.</p>

    <a href="{{ route('students.index') }}">View Students</a>
@endsection
