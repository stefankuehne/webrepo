<?php
session_start();

if (!isset($_SESSION["eingeloggt"])) {
    header("Location: login.html");
    exit;
}

echo "<h1>👋 Willkommen, " . htmlspecialchars($_SESSION["user"]) . "!</h1>";
echo "<p><a href='logout.php'>Logout</a></p>";
