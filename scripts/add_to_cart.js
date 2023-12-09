// Zdefiniuj zmienne globalne
var cartProductsElement = document.getElementById('cart-products');
var removeButtons;

document.getElementById('cart').addEventListener('mouseenter', showCartProducts);
document.getElementById('cart').addEventListener('mouseleave', hideCartProducts);

var cartItems = [];

function showCartProducts() {
    cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

    if (cartProductsElement) {
        var rect = document.getElementById('cart').getBoundingClientRect();
        cartProductsElement.style.left = rect.left + 'px';
        cartProductsElement.style.top = rect.bottom + 'px';
        cartProductsElement.innerHTML = generateCartHTML(cartItems);
        cartProductsElement.classList.add('show');

        // Dodaj obsługę usuwania produktów
        var removeButtons = document.querySelectorAll('.remove-product');
        removeButtons.forEach(function (button, index) {
            button.addEventListener('click', function (event) {
                event.stopPropagation(); // Zatrzymaj propagację zdarzenia, aby nie ukrywać koszyka
                removeFromCart(index);
                showCartProducts(); // Pokaż zaktualizowany widok koszyka po usunięciu
            });
        });
    }
}

function hideCartProducts() {
    if (cartProductsElement) {
        cartProductsElement.classList.remove('show');
    }
}

function generateCartHTML(cartItems) {
    var cartProductsHTML = '<ul>';
    cartItems.forEach(function (item, index) {
        cartProductsHTML += '<li>' + item.name + ' - ' + item.price + ' zł <button class="remove-product" data-index="' + index + '">Usuń</button></li>';
    });
    cartProductsHTML += '</ul>';
    return cartProductsHTML;
}

function addToCart() {
    var productName = "<?php echo addslashes($productData['name']); ?>";
    var productPrice = "<?php echo addslashes($productData['price']); ?>";
    var productImage = "<?php echo addslashes($productData['image']); ?>";

    var cartQuantity = localStorage.getItem('cartQuantity') || 0;
    cartQuantity = parseInt(cartQuantity);
    cartQuantity++;

    console.log("cartQuantity after increment:", cartQuantity);
    localStorage.setItem('cartQuantity', cartQuantity);

    var cartItem = {
        name: productName,
        price: productPrice,
        image: productImage
    };

    var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    cartItems.push(cartItem);
    localStorage.setItem('cartItems', JSON.stringify(cartItems));

    updateCartQuantity(cartQuantity);
    showCartProducts();
    console.log("Produkt dodany do koszyka!");
}

function removeFromCart(index) {
    var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    cartItems.splice(index, 1);
    localStorage.setItem('cartItems', JSON.stringify(cartItems));

    var cartQuantity = cartItems.length;
    localStorage.setItem('cartQuantity', cartQuantity);

    updateCartQuantity(cartQuantity);
    showCartProducts(); // Pokaż zaktualizowany widok koszyka po usunięciu
    console.log("Produkt usunięty z koszyka!");
}

function updateCartQuantity(quantity) {
    console.log("Updating cart quantity to:", quantity);
    var quantityElement = document.getElementById('quantity');
    if (quantityElement) {
        quantityElement.textContent = quantity;
    }
}
