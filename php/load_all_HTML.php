<?php
$iframeDir = realpath(__DIR__ . '/../html/iframe');
if (!is_dir($iframeDir)) {
    die("Ordner nicht gefunden: $iframeDir");
}

$headFile  = __DIR__ . '/../html/someStandartHEAD.html';
$files     = scandir($iframeDir);

// Lade gemeinsamen HEAD-Inhalt
$headContent = file_exists($headFile) ? file_get_contents($headFile) : '<head><title>Webseiten</title></head>';

echo "<!DOCTYPE html>\n<html lang=\"de\">\n";
echo $headContent;
echo "<body>\n<h1>Alle eingebetteten Seiten</h1>\n";

foreach ($files as $file) {
echo "<!-- Dateien gefunden: " . implode(", ", $files) . " -->\n";

    if (str_ends_with($file, '.html')) {
        $name = ucfirst(pathinfo($file, PATHINFO_FILENAME));
        echo "<h2>$name</h2>\n";
        echo "<iframe src=\"../html/iframe/$file\" name=\"$name\" width=\"100%\" height=\"300\" style=\"border:1px solid #ccc; margin-bottom:20px;\"></iframe>\n";
    }
}

echo "</body>\n</html>";
