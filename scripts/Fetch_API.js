document.addEventListener("DOMContentLoaded", function () {
  // Pobierz i wstaw nagłówek
  fetch("http://localhost/cos/navbar.php")
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("header").innerHTML = data;
    })
    .catch((error) => {
      console.error("Wystąpił błąd podczas ładowania paska nawigacyjnego:", error);
    });

  // Pobierz i wstaw stopkę
  fetch("http://localhost/cos/footer.php")
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("footer").innerHTML = data;
    })
    .catch((error) => {
      console.error("Wystąpił błąd podczas ładowania stopki:", error);
    });
});