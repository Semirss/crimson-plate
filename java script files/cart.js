document.addEventListener('DOMContentLoaded', () => {
    const cartItemsContainer = document.getElementById('cart-items');
    const totalPriceElement = document.getElementById('total-price');
    const cartItemsInput = document.getElementById('cart-items-input');
    const totalPriceInput = document.getElementById('total-price-input');
    const userIdInput = document.getElementById('user-id-input');
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    const renderCart = () => {
        cartItemsContainer.innerHTML = '';
        let totalPrice = 0;

        if (cart.length === 0) {
            cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
        } else {
            cart.forEach((item, index) => {
                const itemDiv = document.createElement('div');
                itemDiv.classList.add('cart-item');
                itemDiv.innerHTML = `
                    <h2>${item.name}</h2>
                    <p>Price: $${item.price}</p>
                    <p>Quantity: ${item.quantity}</p>
                    <button class="remove-item" data-index="${index}">Remove</button>
                `;
                cartItemsContainer.appendChild(itemDiv);
                totalPrice += item.price * item.quantity;
            });
            totalPriceElement.textContent = totalPrice.toFixed(2);
        }

        cartItemsInput.value = JSON.stringify(cart);
        totalPriceInput.value = totalPrice.toFixed(2);
    };

    cartItemsContainer.addEventListener('click', (e) => {
        if (e.target.classList.contains('remove-item')) {
            const index = e.target.getAttribute('data-index');
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCart();
        }
    });

    renderCart();
});
