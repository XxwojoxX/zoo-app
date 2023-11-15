document.addEventListener("DOMContentLoaded", function () {
    var cookieMessage = document.getElementById("cookie-message");
    var acceptCookieButton = document.getElementById("accept-cookie");

    if (acceptCookieButton) {
        acceptCookieButton.addEventListener("click", function () {
            // Tutaj możesz ustawić plik cookie 'cookieinfo' na 'true' po akceptacji zgody
            // monster.set("cookieinfo", "true", 365); // Ustawia na 'true' na 365 dni

            // Ukryj komunikat o plikach cookie po akceptacji
            cookieMessage.style.display = "none";
        });
    }
});