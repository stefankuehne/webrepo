document.addEventListener("DOMContentLoaded", () => {
  fetch("php/iframes.php")
    .then(response => response.json())
    .then(data => {
      const container = document.getElementById("iframe-container");

      for (const [title, src] of Object.entries(data)) {
        const h2 = document.createElement("h2");
        h2.textContent = title;

        const iframe = document.createElement("iframe");
        iframe.src = src;
        iframe.width = "100%";
        iframe.height = "300";
        iframe.style.border = "1px solid #ccc";
        iframe.style.marginBottom = "20px";

        container.appendChild(h2);
        container.appendChild(iframe);
      }
    })
    .catch(err => console.error("Fehler beim Laden der iFrames:", err));
});
