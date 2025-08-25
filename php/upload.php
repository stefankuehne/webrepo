<?php
$user_id = $_GET['user_id'] ?? 'unknown';
$target = "uploads/{$user_id}.jpg";

// Prüfen, ob Datei korrekt gesendet wurde
if (!empty($_FILES) && isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    echo "Empfangen: " . $_FILES['image']['name'];
} else {
    echo "Kein Bild empfangen.";
}
