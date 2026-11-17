<?php
echo "<h2>For Loop</h2>";
for ($i = 1; $i <= 5; $i++) {
    echo "Number: $i <br>";
}
echo "<h2>While Loop</h2>";
$j = 1;
while ($j <= 5) {
    echo "Count: $j <br>";
    $j++;
}
echo "<h2>Foreach Loop</h2>";
$subjects = ["Python", "DBMS", "Java", "PHP"];
foreach ($subjects as $subject) {
    echo $subject . "<br>";
}
?>
