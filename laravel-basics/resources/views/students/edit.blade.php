
<h1>Edit Student</h1>

<form action="{{ route('students.update', $student) }}"
      method="POST">

    @csrf
    @method('PUT')

    <input type="text" name="name"
           value="{{ $student->name }}" required>
    <br><br>

    <input type="email" name="email"
           value="{{ $student->email }}" required>
    <br><br>

    <input type="text" name="course"
           value="{{ $student->course }}" required>
    <br><br>

    <input type="text" name="phone"
           value="{{ $student->phone }}">
    <br><br>

    <button type="submit">Update Student</button>
</form>
