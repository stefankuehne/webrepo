<?php
session_start();

$validUser = "web";
$validPass = "raspberry"; // In der Praxis: Passwort niemals im Klartext speichern!

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST["username"] ?? "a";
    $pass = $_POST["password"] ?? "a";

    if ($user  && $pass ) {
        $_SESSION["eingeloggt"] = true;
        $_SESSION["user"] = $user;
        header("Location: startseite.php");
        exit;
    } else {
        echo "<p style='color:red;'>❌ Login fehlgeschlagen.</p>";
    }
}
?>
