<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Nasze ZOO</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/media.css">

    <script src="scripts/Fetch_API.js"></script>
    <script src="scripts/cookie.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

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

        <div class="FAQ-container">
            <h1>FAQ - Najczęściej zadawane pytania</h1>

            <!-- Pierwsze pytanie -->
            <div class="faq-item">
                <input type="checkbox" id="checkbox1" class="checkbox">
                <label for="checkbox1" class="toggle">
                    <div class="bars" id="bar1"></div>
                    <div class="bars" id="bar2"></div>
                    <div class="bars" id="bar3"></div>
                </label>
                <div class="question">
                    <h2>Pytanie 1: Kiedy ZOO jest otwarte?</h2>
                </div>
                </div>
                <div class="answer" id="answer1">
                    <p>ZOO jest otwarte od poniedziałku do piątku w godzinach od 8:00 do 17:00</p>
                </div>
            

            <!-- Drugie pytanie -->
            <div class="faq-item">
                <input type="checkbox" id="checkbox2" class="checkbox">
                <label for="checkbox2" class="toggle">
                    <div class="bars" id="bar1"></div>
                    <div class="bars" id="bar2"></div>
                    <div class="bars" id="bar3"></div>
                </label>
                <div class="question">
                    <h2>Pytanie 2: Zwiedzanie ZOO</h2>
                </div>
                </div>
                <div class="answer" id="answer2">
                    <p>Jakie są główne atrakcje w naszym ZOO?</p>
                </div>

                <div class="faq-item">
                <input type="checkbox" id="checkbox3" class="checkbox">
                <label for="checkbox3" class="toggle">
                    <div class="bars" id="bar1"></div>
                    <div class="bars" id="bar2"></div>
                    <div class="bars" id="bar3"></div>
                </label>
                <div class="question">
                    <h2>Pytanie 3: Zwiedzanie ZOO</h2>
                </div>
                </div>
                <div class="answer" id="answer3">
                    <p>Jakie są główne atrakcje w naszym ZOO?</p>
                </div>

                <div class="faq-item">
                <input type="checkbox" id="checkbox4" class="checkbox">
                <label for="checkbox4" class="toggle">
                    <div class="bars" id="bar1"></div>
                    <div class="bars" id="bar2"></div>
                    <div class="bars" id="bar3"></div>
                </label>
                <div class="question">
                    <h2>Pytanie 4: Zwiedzanie ZOO</h2>
                </div>
                </div>
                <div class="answer" id="answer4">
                    <p>Jakie są główne atrakcje w naszym ZOO?</p>
                </div>

                <div class="faq-item">
                <input type="checkbox" id="checkbox5" class="checkbox">
                <label for="checkbox5" class="toggle">
                    <div class="bars" id="bar1"></div>
                    <div class="bars" id="bar2"></div>
                    <div class="bars" id="bar3"></div>
                </label>
                <div class="question">
                    <h2>Pytanie 5: Zwiedzanie ZOO</h2>
                </div>
                </div>
                <div class="answer" id="answer5">
                    <p>Jakie są główne atrakcje w naszym ZOO?</p>
                </div>

                <div class="faq-item">
                <input type="checkbox" id="checkbox6" class="checkbox">
                <label for="checkbox6" class="toggle">
                    <div class="bars" id="bar1"></div>
                    <div class="bars" id="bar2"></div>
                    <div class="bars" id="bar3"></div>
                </label>
                <div class="question">
                    <h2>Pytanie 6: Zwiedzanie ZOO</h2>
                </div>
                </div>
                <div class="answer" id="answer6">
                    <p>Jakie są główne atrakcje w naszym ZOO?</p>
                </div>

                <div class="faq-item">
                <input type="checkbox" id="checkbox7" class="checkbox">
                <label for="checkbox7" class="toggle">
                    <div class="bars" id="bar1"></div>
                    <div class="bars" id="bar2"></div>
                    <div class="bars" id="bar3"></div>
                </label>
                <div class="question">
                    <h2>Pytanie 7: Zwiedzanie ZOO</h2>
                </div>
                </div>
                <div class="answer" id="answer7">
                    <p>Jakie są główne atrakcje w naszym ZOO?</p>
                </div>
            
            
            <!-- Dodaj więcej pytań i odpowiedzi w podobny sposób -->

        </div>
        <footer></footer>
    </div>
</body>
</html>


<script>
    // Obsługa zdarzeń po naciśnięciu checkboxa
    const checkboxes = document.querySelectorAll('.checkbox[type="checkbox"]');
    checkboxes.forEach((checkbox, index) => {
        checkbox.addEventListener('change', () => {
            const answer = document.getElementById(`answer${index + 1}`);

            // Wyłącz wszystkie inne checkboxy
            checkboxes.forEach((otherCheckbox, otherIndex) => {
                if (otherIndex !== index) {
                    otherCheckbox.checked = false;
                    const otherAnswer = document.getElementById(`answer${otherIndex + 1}`);
                    otherAnswer.style.display = 'none';
                }
            });

            if (checkbox.checked) {
                answer.style.display = 'block';
            } else {
                answer.style.display = 'none';
            }
        });
    });
</script>
