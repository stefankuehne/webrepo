// Warten, bis DOM bereit ist
document.addEventListener("DOMContentLoaded", () => {
  // Neues Element erzeugen
  const myElement = new HtmlElement2('section');

  // Optional: Stil hinzufügen
  myElement.getElement().style.background = '#eef';
  myElement.getElement().style.padding = '10px';
  myElement.getElement().style.margin = '10px';
  myElement.getElement().innerHTML = "<strong>Testelement geladen!</strong>";

  // In den Body einfügen
  myElement.appendTo(document.body);

  console.log("HtmlElement2 erfolgreich getestet.");
});
// Warten, bis DOM bereit ist
document.addEventListener("DOMContentLoaded", () => {
  // Neues Element erzeugen
  const myElement = new HtmlElement2('section');

  // Optional: Stil hinzufügen
  myElement.getElement().style.background = '#eef';
  myElement.getElement().style.padding = '10px';
  myElement.getElement().style.margin = '10px';
  myElement.getElement().innerHTML = "<strong>Testelement geladen!</strong>";

  // In den Body einfügen
  myElement.appendTo(document.body);

  console.log("HtmlElement2 erfolgreich getestet.");
});
