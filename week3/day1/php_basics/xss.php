<?php
$userInput = "<script>alert('Hacked')</script>";
echo "<h2>XSS Prevention Example</h2>";
echo "<h3>Original Input:</h3>";
echo "<pre>" .
    htmlspecialchars($userInput, ENT_QUOTES, 'UTF-8') .
    "</pre>";
echo "<h3>Sanitized Output:</h3>";
$safeOutput = htmlspecialchars(
    $userInput,
    ENT_QUOTES,
    'UTF-8'
);
echo $safeOutput;
?>
