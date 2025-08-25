# Woche 1 – Struktur & Setup

## Ordnerstruktur
- `html/iframe/`: Einzelseiten
- `php/`: Backend-Logik
- `js/`: Modul-JavaScript
- `css/`: Responsive Styles

## Ziel
Modularer Aufbau für einfache Erweiterbarkeit
# Woche 2 – Benutzer & Sessions

## Rollen
- `admin`: Vollzugriff
- `user`: Eigene Inhalte
- `guest`: Nur Ansicht

## Sessionstruktur
```php
[
  'id' => 'sess_abc123',
  'user_id' => 'user_001',
  'role' => 'admin',
  'expires_at' => 1693000000
]

---

### 🎥 Woche 3: Webcam & Dateiübertragung

**Ziele:**
- Webcam-Snapshot-Upload
- Datei-Upload/Download mit Fortschritt
- Anzeige aller Benutzer-Webcams

**Aufgaben:**
- [ ] `webcam.js` mit `getUserMedia()` + `canvas.toBlob()`
- [ ] `upload.php` + `download.php`
- [ ] Fortschrittsanzeige mit `progressbar.js`
- [ ] `webcamwall.php` zeigt alle aktiven Streams

**Dokumentation:**
```markdown
# Woche 3 – Webcam & Upload

## Webcam-Upload
- alle 3 Sekunden Snapshot
- Speicherung unter `uploads/user_001.jpg`

## Dateiübertragung
- Upload via `fetch()`
- Fortschritt mit `XMLHttpRequest.onprogress`

---

### 🎥 Woche 3: Webcam & Dateiübertragung

**Ziele:**
- Webcam-Snapshot-Upload
- Datei-Upload/Download mit Fortschritt
- Anzeige aller Benutzer-Webcams

**Aufgaben:**
- [ ] `webcam.js` mit `getUserMedia()` + `canvas.toBlob()`
- [ ] `upload.php` + `download.php`
- [ ] Fortschrittsanzeige mit `progressbar.js`
- [ ] `webcamwall.php` zeigt alle aktiven Streams

**Dokumentation:**
```markdown
# Woche 3 – Webcam & Upload

## Webcam-Upload
- alle 3 Sekunden Snapshot
- Speicherung unter `uploads/user_001.jpg`

## Dateiübertragung
- Upload via `fetch()`
- Fortschritt mit `XMLHttpRequest.onprogress`
# Woche 4 – Dynamik & Internationalisierung

## Sprachumschaltung
- `data-i18n="welcome"` → ersetzt durch JSON-Wert

## Live-Reload
- JS prüft alle 5 Sekunden auf Änderungen
- Bei Änderung: `location.reload()` oder DOM-Aktualisierung
