document.addEventListener("DOMContentLoaded", function () {
  var urlNavbar = "http://localhost/inx2/navbar.php";
  var urlFooter = "http://localhost/inx2/footer.php";

  $.ajax({
    url: "http://localhost/inx2/PHP/proxy.php",
    method: "GET",
    data: { url: urlNavbar }, // Nie używaj encodeURIComponent tutaj
    dataType: "html",
    success: function (data) {
      $("nav").html(data);
    },
    error: function (error) {
      console.error("Wystąpił błąd podczas ładowania paska nawigacyjnego:", error);
    }
  });

  $.ajax({
    url: "http://localhost/inx2/PHP/proxy.php",
    method: "GET",
    data: { url: urlFooter }, // Nie używaj encodeURIComponent tutaj
    dataType: "html",
    success: function (data) {
      $("footer").html(data);
    },
    error: function (error) {
      console.error("Wystąpił błąd podczas ładowania stopki:", error);
    }
  });
});
