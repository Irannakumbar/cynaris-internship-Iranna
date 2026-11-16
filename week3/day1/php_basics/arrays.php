<?php
// Indexed Array
$skills = ["Python", "Java", "HTML", "CSS", "PHP"];
echo "<h2>Technical Skills</h2>";
foreach ($skills as $skill) {
    echo $skill . "<br>";
}
// Associative Array
$student = [
    "name" => "Iranna",
    "course" => "MCA",
    "semester" => 2,
    "college" => "Chetan Business School"
];
echo "<h2>Student Information</h2>";
foreach ($student as $key => $value) {
    echo ucfirst($key) . ": " . $value . "<br>";
}
?>
