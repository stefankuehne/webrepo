class HtmlBuilder {
    public function input(string $name, string $type = "text"): string {
        return "<input type=\"$type\" name=\"$name\" required>";
    }

    public function label(string $name): string {
        return "<label for=\"$name\">" . ucfirst($name) . ":</label>";
    }

    public function textarea(string $name): string {
        return "<textarea name=\"$name\" rows=\"6\" cols=\"50\" required></textarea>";
    }

    public function select(string $name, array $options): string {
        $html = "<select name=\"$name\" required>";
        foreach ($options as $value => $label) {
            $html .= "<option value=\"$value\">$label</option>";
        }
        return $html . "</select>";
    }
}
