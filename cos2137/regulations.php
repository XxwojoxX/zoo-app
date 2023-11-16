<?php
    session_start();
?>

<html>
    <head>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/media.css">

        <script src="scripts/Fetch_API.js"></script>
        <script src="scripts/cookie.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">

        <title>ZOO</title>

        <script>
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
    </script>
    </head>

    <body>
    <div class="home">
        <nav></nav>

        

        <!-- Dodaj sekcję z regulaminem -->
        <section class="regulamin" id="regulamin">
            <h2>Regulamin Strony Internetowej ZOO</h2><br>
            <p>1. Definicje</p>
            <p>
                - <strong>Strona Internetowa:</strong> Odnosi się do strony internetowej zoo, dostępnej pod adresem [adres_strony_zoo.pl](http://www.adres_strony_zoo.pl).
            </p>
            <p>
                - <strong>ZOO:</strong> Odnosi się do ogrodu zoologicznego, którego informacje są udostępniane na Stronie Internetowej.
            </p>
            <p>
                - <strong>Użytkownik:</strong> Osoba korzystająca z Strony Internetowej ZOO.
            </p>

            <p>2. Cel Strony Internetowej</p>
            <p>
                Strona Internetowa ZOO ma na celu:
                - Udostępnianie informacji na temat ZOO, w tym godzin otwarcia, cenników biletów, wydarzeń, i innych informacji związanych z ZOO.
                - Edukację na temat zwierząt i ochrony środowiska naturalnego.
                - Promowanie ZOO i jego działań.
            </p>

            <p>3. Akceptacja Regulaminu</p>
            <p>
                Korzystanie z Strony Internetowej ZOO oznacza akceptację niniejszego regulaminu.
            </p>

            <p>4. Prawa Autorskie</p>
            <p>
                Wszelkie materiały, zdjęcia i treści udostępnione na Stronie Internetowej ZOO podlegają prawom autorskim. Wykorzystywanie tych materiałów bez zgody ZOO jest zabronione.
            </p>

            <p>5. Odpowiedzialność</p>
            <p>
                ZOO dokłada wszelkich starań, aby zawarte na Stronie Internetowej informacje były dokładne i aktualne. Jednakże ZOO nie ponosi odpowiedzialności za ewentualne błędy czy nieścisłości.
            </p>

            <p>6. Prywatność</p>
            <p>
                ZOO szanuje prywatność Użytkowników. Więcej informacji na temat zbierania, przetwarzania i ochrony danych osobowych znajduje się w Polityce Prywatności dostępnej na Stronie Internetowej.
            </p>

            <p>7. Zakaz Działalności Nielegalnej</p>
            <p>
                Użytkownik zobowiązuje się do korzystania z Strony Internetowej ZOO zgodnie z obowiązującymi przepisami prawa. Zakazane jest umieszczanie treści nielegalnych lub obraźliwych.
            </p>

            <p>8. Reklama i Marketing</p>
            <p>
                Strona Internetowa ZOO może zawierać treści reklamowe. ZOO nie ponosi odpowiedzialności za treści reklamowe dostarczone przez innych reklamodawców.
            </p>

            <p>9. Zmiany w Regulaminie</p>
            <p>
                ZOO zastrzega sobie prawo do zmiany niniejszego regulaminu w dowolnym momencie. Zmiany będą publikowane na Stronie Internetowej i wchodzą w życie od daty ich opublikowania.
            </p>

            <p>10. Kontakt</p>
            <p>
                W razie pytań lub uwag dotyczących Strony Internetowej ZOO prosimy o kontakt na adres: <a href="mailto:adres_kontaktowy@zoo.pl"><i><br>adres_kontaktowy@zoo.pl</i></a>.
            </p>
        </section>

        <footer></footer>
        </div>
    </body>
</html>
