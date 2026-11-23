<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = trim($_POST["username"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $age = $_POST["age"] ?? "";
    $course = $_POST["course"] ?? "";
    // Validate name
    if ($name == "" || !preg_match("/^[a-zA-Z ]+$/", $name)) {
        die("Invalid name. Please enter a valid name.");
    } 
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }
    // Validate age
    if (filter_var($age, FILTER_VALIDATE_INT) === false ||
        $age < 18 || $age > 100) {
        die("Age must be between 18 and 100.");
    }
    // Validate course
    $allowedCourses = ["MCA", "MBA", "BCA"];

    if (!in_array($course, $allowedCourses, true)) {
        die("Invalid course selected.");
    }

    // Display results
    echo "<h2>Registration Successful!</h2>";

    echo "Name: " .
        htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "<br>";

    echo "Email: " .
        htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "<br>";

    echo "Age: " .
        htmlspecialchars((string)$age, ENT_QUOTES, 'UTF-8') . "<br>";

    echo "Course: " .
        htmlspecialchars($course, ENT_QUOTES, 'UTF-8');

} else {
    echo "Please submit the registration form.";
}

?>
