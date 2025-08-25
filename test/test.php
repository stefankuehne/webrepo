<?php
$auth = new dbAuth();

if ($auth->checkLogin('web@example.com', 'geheim123')) {
    echo "✅ Login erfolgreich!";
} else {
    echo "❌ Login fehlgeschlagen.";
}

