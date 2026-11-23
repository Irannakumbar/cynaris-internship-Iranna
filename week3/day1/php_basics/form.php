
<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>

    <h2>Student Registration Form</h2>

    <form action="process.php" method="POST">

        <label>Full Name:</label>
        <input type="text" name="username" required>
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" required>
        <br><br>

        <label>Age:</label>
        <input type="number" name="age" required>
        <br><br>

        <label>Course:</label>
        <select name="course" required>
            <option value="">Select Course</option>
            <option value="MCA">MCA</option>
            <option value="MBA">MBA</option>
            <option value="BCA">BCA</option>
        </select>
        <br><br>

        <button type="submit">Register</button>

    </form>

</body>
</html>
