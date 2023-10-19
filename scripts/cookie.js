document.addEventListener("DOMContentLoaded", function () {
  var monster = {
    set: function (e, t, n, r) {
      var i = new Date(),
        s = "",
        o = typeof t,
        u = "";
      r = r || "/";
      n = n || 1; // Ustaw czas wygaśnięcia na 1 godzinę
      i.setTime(i.getTime() + n * 60 * 60 * 1e3);
      s = "; expires=" + i.toGMTString();

      if (o === "object" && o !== "undefined") {
        if (!("JSON" in window))
          throw "Bummer, your browser doesn't support JSON parsing.";
        u = JSON.stringify({ v: t });
      } else u = escape(t);
      document.cookie = e + "=" + u + s + "; path=" + r;
    },
    get: function (e) {
      var t = e + "=",
        n = document.cookie.split(";"),
        r = "",
        i = "",
        s = {};
      for (var o = 0; o < n.length; o++) {
        var u = n[o];
        while (u.charAt(0) == " ") u = u.substring(1, u.length);
        if (u.indexOf(t) === 0) {
          r = u.substring(t.length, u.length);
          i = r.substring(0, 1);
          if (i == "{") {
            s = JSON.parse(r);
            if ("v" in s) return s.v;
          }
          return r == "undefined" ? undefined : unescape(r);
        }
      }
      return null;
    },
    remove: function (e) {
      this.set(e, "", -1);
    },
    increment: function (e, t) {
      var n = this.get(e) || 0;
      this.set(e, parseInt(n, 10) + 1, t);
    },
    decrement: function (e, t) {
      var n = this.get(e) || 0;
      this.set(e, parseInt(n, 10) - 1, t);
    },
  };

  // Sprawdź, czy plik cookie "cookieinfo" jest ustawiony na "true"
  if (monster.get("cookieinfo") !== "true") {
    var container = document.createElement("div"),
      link = document.createElement("a"),
      agreeButton = document.createElement("button"); // Dodaj przycisk "Zgadzam się"

    container.setAttribute("id", "cookieinfo");
    container.setAttribute("class", "cookie-alert");
    container.innerHTML =
      "<h6>Ta strona wykorzystuje pliki cookie</h6><p>Używamy informacji zapisanych za pomocą plików cookies w celu zapewnienia maksymalnej wygody w korzystaniu z naszego serwisu. Mogą też korzystać z nich współpracujące z nami firmy badawcze oraz reklamowe.</p>";

    link.setAttribute("href", "#");
    link.setAttribute("title", "Zamknij");
    link.innerHTML = "x";

    agreeButton.innerHTML = "Zgadzam się"; // Ustal tekst przycisku "Zgadzam się"

    function clickHandler(e) {
      if (e.preventDefault) {
        e.preventDefault();
      } else {
        e.returnValue = false;
      }

      container.setAttribute("style", "opacity: 1");

      var interval = window.setInterval(function () {
        container.style.opacity -= 0.01;

        if (container.style.opacity <= 0.02) {
          document.body.removeChild(container);
          window.clearInterval(interval);
        }
      }, 4);

      // Ustaw plik cookie na "true" po kliknięciu "Zgadzam się"
      monster.set("cookieinfo", "true", 1); // Ustaw na 1 godzinę
    }

    // Dodaj obsługę kliknięcia przycisku "Zgadzam się"
    agreeButton.addEventListener("click", clickHandler);

    if (link.addEventListener) {
      link.addEventListener("click", clickHandler);
    } else {
      link.attachEvent("onclick", clickHandler);
    }

    container.appendChild(link);
    container.appendChild(agreeButton); // Dodaj przycisk "Zgadzam się" do kontenera
    document.body.appendChild(container);
  }

  // Sprawdź, czy plik cookie "cookieinfo" jest ustawiony na "true"
  if (monster.get("cookieinfo") === "true") {
    // Tutaj możesz umieścić kod, który ma być wykonywany, gdy plik cookie jest ustawiony
    console.log("Plik cookie 'cookieinfo' jest ustawiony na 'true'");
  } else {
    // Tutaj możesz umieścić kod, który ma być wykonywany, gdy plik cookie nie jest ustawiony lub jest ustawiony na coś innego niż "true"
    console.log("Plik cookie 'cookieinfo' nie jest ustawiony na 'true'");
  }
});
