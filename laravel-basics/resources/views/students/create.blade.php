
<h1>Add New Student</h1>

<form action="{{ route('students.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Student Name" required>
    <br><br>

    <input type="email" name="email" placeholder="Email" required>
    <br><br>

    <input type="text" name="course" placeholder="Course" required>
    <br><br>

    <input type="text" name="phone" placeholder="Phone">
    <br><br>

    <button type="submit">Save Student</button>
</form>

<a href="{{ route('students.index') }}">Back</a>
