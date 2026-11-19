<?php
$name = $_GET["name"] ?? "";
echo "<h2>GET Method Example</h2>";
if ($name !== "") {
    echo "Welcome " .
        htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
} else {
    echo "Please provide a name in the URL.";
}
?>
