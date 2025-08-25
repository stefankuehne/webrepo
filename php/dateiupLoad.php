<?php
echo "<p><a href='php/startseite.php'>start</a></p>";
$basisverzeichnis = "/home/web";
$ordner = array_filter(glob($basisverzeichnis . '/*'), 'is_dir');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pfad = rtrim($_POST["pfad"], "/") . "/";
    $dateiname = basename($_POST["dateiname"]);
    $inhalt = $_POST["inhalt"];

    // Pfadvergleich mit realpath
    $pfad_real = realpath($pfad);
    $ordner_real = array_map('realpath', $ordner);

    if (!in_array($pfad_real, $ordner_real)) {
        echo "<p style='color:red;'>❌ Ungültiger Pfad!</p>";
    } else {
        $voller_pfad = $pfad_real . "/" . $dateiname;
        if (file_put_contents($voller_pfad, $inhalt) !== false) {
            echo "<p style='color:green;'>✅ Datei gespeichert: <code>$voller_pfad</code></p>";
        } else {
            echo "<p style='color:red;'>❌ Fehler beim Schreiben der Datei!</p>";
        }
    }
}
?>

<!-- Formular -->
<div class="formular-wrapper">
    <h2>📂 Datei erstellen im gewünschten Ordner</h2>
    <form method="post">
        <label>📁 Zielordner:</label><br>
        <select name="pfad" required>
            <?php
            foreach ($ordner as $o) {
                $anzeige = basename($o);
                echo "<option value=\"$o\">$anzeige</option>";
            }
            ?>
        </select><br><br>

        <label>📄 Dateiname:</label><br>
        <input type="text" name="dateiname" required><br><br>

        <label>📝 Inhalt:</label><br>
        <textarea name="inhalt" rows="10" cols="50" required></textarea><br><br>

        <button type="submit">📤 Datei speichern</button>
    </form>
</div>

<?php

$form = new DynamicForm("/home/web/formdata.json", "ghfgg.php");
$output = $form->handlePost();
$output .= $form->renderForm();

// Übergib $output an dein Template oder gib es aus
echo $output;
