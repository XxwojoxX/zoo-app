document.addEventListener("DOMContentLoaded", function () {
  fetch("http://localhost/inx2/navbar.php", { mode: "no-cors" })
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
  fetch("http://localhost/inx2/footer.php", { mode: "no-cors" })
    .then((response) => response.text())
    .then((data) => {
      $("footer").html(data);
    })
    .catch((error) => {
      console.error("Wystąpił błąd podczas ładowania stopki:", error);
    });
});
