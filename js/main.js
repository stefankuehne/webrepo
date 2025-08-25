function loadScriptsSequentially(list) {
  if (list.length === 0) {
    console.log("Alle Skripte geladen.");
    if (typeof start === "function") start();
    return;
  }

  const name = list.shift();
  const script = document.createElement('script');
  script.src = `js/${name}.js`;
  script.onload = () => {
    console.log(`${name}.js geladen`);
    loadScriptsSequentially(list);
  };
  script.onerror = () => console.error(`Fehler beim Laden von ${name}.js`);
  document.head.appendChild(script);
}

function fetchScriptList() {
  fetch('api/scripts.php')
    .then(res => res.json())
    .then(data => {
      if (Array.isArray(data.scripts)) {
        loadScriptsSequentially([...data.scripts]);
      } else {
        console.error("Ungültige Skriptliste");
      }
    })
    .catch(err => console.error("Fehler beim Laden der Skriptliste:", err));
}

window.onload = fetchScriptList;
