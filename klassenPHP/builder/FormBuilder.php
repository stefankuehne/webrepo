<?php
class FormBuilder {
    private $forms;

    public function __construct($jsonFile) {
        $json = file_get_contents($jsonFile);
        $this->forms = json_decode($json, true);
    }

    public function getFormNames() {
        return array_keys($this->forms);
    }

    public function renderForm($name) {
        if (!isset($this->forms[$name])) return "<p>Formular nicht gefunden.</p>";
        $html = "<form method='post'>";
        foreach ($this->forms[$name] as $field) {
            $label = htmlspecialchars($field['label']);
            $type = htmlspecialchars($field['type']);
            $nameAttr = htmlspecialchars($field['name']);
            $html .= "<label>$label</label><input type='$type' name='$nameAttr'><br>";
        }
        $html .= "<button type='submit'>Absenden</button></form>";
        return $html;
    }
}

