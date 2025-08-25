# 🔐 Benutzer-, Gruppen- und Rechteübersicht

## 👥 Benutzer

| Benutzer   | Rolle                        | Beschreibung                                  |
|------------|------------------------------|-----------------------------------------------|
| `web`      | Webentwickler                | Arbeitet direkt an HTML, CSS, PHP, JS         |
| `www-data` | Webserver                    | Führt Webanfragen aus, benötigt Schreibrechte |
| `bashes`   | Skriptverwalter              | Erstellt und verwaltet Bash-Skripte           |
| `gitdoc`   | Dokumentationsmanager        | Führt Doku-Skripte aus, erzeugt Änderungslogs |

---

## 🧑‍🤝‍🧑 Gruppen

| Gruppe        | Mitglieder                  | Zweck                                         |
|---------------|-----------------------------|-----------------------------------------------|
| `webgroup`    | `web`, `www-data`           | Zugriff auf Webinhalte                        |
| `scriptgroup` | `bashes`, `web`, `gitdoc`   | Zugriff auf Skripte im Verzeichnis `scripts/` |

---

## 📁 Verzeichnisse & Rechte

| Pfad                          | Besitzer   | Gruppe       | Rechte | Beschreibung                              |
|------------------------------|------------|--------------|--------|-------------------------------------------|
| `/home/web/`                 | `web`      | `webgroup`   | `770`  | Webprojektverzeichnis                     |
| `/home/web/html/`            | `web`      | `webgroup`   | `770`  | Statische HTML-Seiten                     |
| `/home/bashes/scripts/`      | `bashes`   | `scriptgroup`| `750`  | Bash-Skripte für Wartung & Automatisierung|
| `/home/gitdoc/web_doku.md`   | `gitdoc`   | `gitdoc`     | `640`  | Generierte Dokumentation                  |

---

## 🛠️ Rechtevergabe (Beispiele)

```bash
# Skript ausführbar machen
chmod +x /home/bashes/scripts/generate_doc.sh

# Gruppe setzen
chown bashes:scriptgroup /home/bashes/scripts/generate_doc.sh

# Verzeichnis zugänglich für Gruppe
chmod 750 /home/bashes/scripts
