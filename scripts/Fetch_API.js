document.addEventListener("DOMContentLoaded", function () {
  fetch("http://localhost/cos/navbar.php", { mode: "no-cors" })
    .then((response) => response.text())
    .then((data) => {
      $("nav").html(data);
    })
    .catch((error) => {
      console.error(
        "Wystąpił błąd podczas ładowania paska nawigacyjnego:",
        error
      );
    });
});

document.addEventListener("DOMContentLoaded", function () {
  fetch("http://localhost/cos/footer.php", { mode: "no-cors" })
    .then((response) => response.text())
    .then((data) => {
      $("footer").html(data);
    })
    .catch((error) => {
      console.error("Wystąpił błąd podczas ładowania stopki:", error);
    });
});
