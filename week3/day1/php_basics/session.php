<?php
session_start();
// Store session data
$_SESSION["username"] = "Iranna";
$_SESSION["course"] = "MCA";

// Display session data
echo "<h2>PHP Session Example</h2>";

echo "Username: " .
    htmlspecialchars($_SESSION["username"], ENT_QUOTES, 'UTF-8');

echo "<br>Course: " .
    htmlspecialchars($_SESSION["course"], ENT_QUOTES, 'UTF-8');

// Destroy session when requested
if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
    echo "<br>Session destroyed successfully.";
}
?>
<br>
<a href="session.php?logout=1">Logout</a>
