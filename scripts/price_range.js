document.addEventListener('DOMContentLoaded', function () {
    function updatePrice() {
        const priceRange = document.getElementById('price-range');
        const minPrice = document.getElementById('min-price');
        const maxPrice = document.getElementById('max-price');
        const selectedPrice = document.getElementById('selected-price');

        minPrice.textContent = priceRange.min;
        maxPrice.textContent = priceRange.max;
        selectedPrice.textContent = `Wybrana cena: ${priceRange.value}`;
    }

    // Dodaj event listener do suwaka
    const priceRange = document.getElementById('price-range');
    priceRange.addEventListener('input', updatePrice);

    // Wywołaj updatePrice na początku, aby zainicjować wartości
    updatePrice();
});