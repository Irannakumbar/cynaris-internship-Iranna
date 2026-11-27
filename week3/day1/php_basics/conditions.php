<?php
$marks = 85;
echo "<h2>Student Result</h2>";
if ($marks >= 90) {
    echo "Grade: A+";
} elseif ($marks >= 75) {
    echo "Grade: A";
} elseif ($marks >= 60) {
    echo "Grade: B";
} else {
    echo "Grade: C";
}
echo "<h2>Switch Statement</h2>";
$day = 3;
switch ($day) {
    case 1:
        echo "Monday";
        break;

    case 2:
        echo "Tuesday";
        break;

    case 3:
        echo "Wednesday";
        break;

    default:
        echo "Invalid Day";
}
?>
