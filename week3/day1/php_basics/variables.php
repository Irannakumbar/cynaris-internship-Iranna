
<?php
// PHP Variables
$name = "Iranna";
$age = 23;
$course = "MCA";
$percentage = 85.5;
$isStudent = true;
echo "<h2>Student Details</h2>";
echo "Name: " . $name . "<br>";
echo "Age: " . $age . "<br>";
echo "Course: " . $course . "<br>";
echo "Percentage: " . $percentage . "%<br>";
echo "Student Status: " . ($isStudent ? "Active" : "Inactive");
?>
