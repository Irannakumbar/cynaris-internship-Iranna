@extends('layouts.app')

@section('title', 'Students')
@section('content')
    <h1>Student List</h1>

    <p>Here are the registered students.</p>

    <table border="1" cellpadding="12" cellspacing="0" width="100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course</th>
        </tr>

        @foreach($students as $student)
            <tr>
                <td>{{ $student['id'] }}</td>
                <td>{{ $student['name'] }}</td>
                <td>{{ $student['course'] }}</td>
            </tr>
        @endforeach
    </table>
@endsection
