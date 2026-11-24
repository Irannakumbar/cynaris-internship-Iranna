
<h1>Student Details</h1>

<p>ID: {{ $student->id }}</p>
<p>Name: {{ $student->name }}</p>
<p>Email: {{ $student->email }}</p>
<p>Course: {{ $student->course }}</p>
<p>Phone: {{ $student->phone }}</p>

<a href="{{ route('students.index') }}">Back</a>
