function updateFilters() {
    // Pobierz aktualne wartości filtrów
    var category = document.getElementById("category").value;
    var priceRange = document.getElementById("price-range").value;
    var sort = document.getElementById("sort").value;

    // Utwórz formularz
    var form = document.createElement("form");
    form.setAttribute("method", "get");
    form.setAttribute("action", "PHP/get_products.php");

    // Dodaj parametry do formularza
    if (category !== 'all') {
        var categoryInput = document.createElement("input");
        categoryInput.setAttribute("type", "hidden");
        categoryInput.setAttribute("name", "category");
        categoryInput.setAttribute("value", category);
        form.appendChild(categoryInput);
    }

    if (priceRange) {
        var priceRangeInput = document.createElement("input");
        priceRangeInput.setAttribute("type", "hidden");
        priceRangeInput.setAttribute("name", "price_range");
        priceRangeInput.setAttribute("value", priceRange);
        form.appendChild(priceRangeInput);
    }

    if (sort !== 'default') {
        var sortInput = document.createElement("input");
        sortInput.setAttribute("type", "hidden");
        sortInput.setAttribute("name", "sort");
        sortInput.setAttribute("value", sort);
        form.appendChild(sortInput);
    }

    // Dodaj formularz do dokumentu i zatwierdź go
    document.body.appendChild(form);
    form.submit();
}