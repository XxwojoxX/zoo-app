document.addEventListener("DOMContentLoaded", function () {
  // Sprawdź, czy element o id "message" istnieje
  var messageElement = document.getElementById("message");

  // Jeśli istnieje, wyświetl komunikat
  if (messageElement) {
      setTimeout(function () {
          messageElement.style.display = "none";
      }, 20000); // Ukryj komunikat po 20 sekundach
  }
});