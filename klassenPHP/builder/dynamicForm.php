<?php

class DynamicForm {
    private $struktur = [];
    private $formName = "";

    public function __construct($jsonPfad, $formName) {
        $this->formName = $formName;
        if (file_exists($jsonPfad)) {
            $daten = json_decode(file_get_contents($jsonPfad), true);
            if (isset($daten[$formName])) {
                $this->struktur = $daten[$formName];
            }
        }
    }

    public function handlePost(): string {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            return "<h3>📥 Empfangene Daten:</h3><pre>" . print_r($_POST, true) . "</pre>";
        }
        return "";
    }

    public function renderForm(): string {
        if (empty($this->struktur)) {
            return "<p style='color:red;'>❌ Keine Formulardaten gefunden.</p>";
        }

        $html = "<h2>" . htmlspecialchars($this->struktur["überschrift"]) . "</h2>";
        $html .= '<form method="post">';

        foreach ($this->struktur["inhalt"] as $name => $typ) {
            $html .= "<label>" . ucfirst($name) . ":</label><br>";

            switch ($typ) {
                case "text":
                    $html .= "<input type=\"text\" name=\"$name\" required><br><br>";
                    break;
                case "textarea":
                    $html .= "<textarea name=\"$name\" rows=\"6\" cols=\"50\" required></textarea><br><br>";
                    break;
                case "select":
                    $html .= "<select name=\"$name\" required>";
                    foreach (glob("/home/web/*", GLOB_ONLYDIR) as $ordner) {
                        $anzeige = basename($ordner);
                        $html .= "<option value=\"$ordner\">$anzeige</option>";
                    }
                    $html .= "</select><br><br>";
                    break;
                case "label":
                    $html .= "<p><strong>" . htmlspecialchars($name) . "</strong></p><br>";
                    break;
                default:
                    $html .= "<input type=\"text\" name=\"$name\"><br><br>";
            }
        }

        $html .= '<button type="submit">📤 Senden</button>';
        $html .= '</form>';

        return $html;
    }
}

