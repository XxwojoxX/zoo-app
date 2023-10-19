document.addEventListener("DOMContentLoaded", function () {
  var generatePasswordButton = document.getElementById("generator");
  var generatedPasswordSpan = document.getElementById("password");
  var copyInfoSpan = document.getElementById("copy-info");

  generatePasswordButton.addEventListener("click", function () {
    var length = Math.floor(Math.random() * 5) + 8;
    var password = generatePassword(length);
    generatedPasswordSpan.textContent = password;

    // Ukryj informację o kopiowaniu
    copyInfoSpan.classList.add("hidden");

    // Dodaj obsługę kliknięcia na wygenerowane hasło
    generatedPasswordSpan.addEventListener("click", function () {
      copyToClipboard(password);
      copyInfoSpan.classList.remove("hidden"); // Pokaż informację o kopiowaniu
      setTimeout(function () {
        copyInfoSpan.classList.add("hidden"); // Ukryj informację po kilku sekundach
      }, 2000); // Możesz dostosować czas wyświetlania informacji (2 sekundy w tym przypadku)
    });
  });

  function generatePassword(length) {
    var password = "";
    var charset =
      "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*";

    for (var i = 0; i < length; i++) {
      password += charset.charAt(Math.floor(Math.random() * charset.length));
    }

    return password;
  }

  // Funkcja do kopiowania tekstu do schowka
  function copyToClipboard(text) {
    var textarea = document.createElement("textarea");
    textarea.value = text;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand("copy");
    document.body.removeChild(textarea);
  }
});
