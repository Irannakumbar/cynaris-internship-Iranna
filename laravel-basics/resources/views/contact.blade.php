@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <h1>Contact Us</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p style="color: red;">{{ $error }}</p>
        @endforeach
    @endif

    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}">

        <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">

        <textarea name="message" placeholder="Enter your message"></textarea>

        <button type="submit">Submit</button>
    </form>
@endsection
