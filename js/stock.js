document.addEventListener('DOMContentLoaded', function() {
    // Agrega eventos de clic a los botones de verificación en los métodos de pago
    const verificarButtons = document.querySelectorAll('.verificar-button');
    verificarButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Oculta la sección de compras
            document.getElementById('carrito-section').style.display = 'none';

            // Muestra el mensaje de pago
            document.getElementById('mensaje-pago').style.display = 'block';
        });
    });

    // Agrega eventos de clic a los botones de incremento y decremento
    const decrementButtons = document.querySelectorAll('.decrement-button');
    const incrementButtons = document.querySelectorAll('.increment-button');

    decrementButtons.forEach(button => {
        button.addEventListener('click', () => {
            const productId = button.getAttribute('data-id');
            const counterElement = document.getElementById('cantidad_' + productId);
            let counterValue = parseInt(counterElement.innerText);
            counterValue = Math.max(1, counterValue - 1); // Establece el mínimo en 1
            counterElement.innerText = counterValue;

            // Actualizar la cantidad en el carrito
            actualizarCantidad(productId, counterValue);
        });
    });

    incrementButtons.forEach(button => {
        button.addEventListener('click', () => {
            const productId = button.getAttribute('data-id');
            const counterElement = document.getElementById('cantidad_' + productId);
            let counterValue = parseInt(counterElement.innerText);
            counterValue++; // Incrementa en 1
            counterElement.innerText = counterValue;

            // Actualizar la cantidad en el carrito
            actualizarCantidad(productId, counterValue);
        });
    });

    // Función para actualizar la cantidad de un producto en el carrito
    function actualizarCantidad(productId, newQuantity) {
        fetch('actualizar_cantidad.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                productId: productId,
                newQuantity: newQuantity
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al actualizar la cantidad del producto');
            }
            return response.json();
        })
        .then(data => {
            console.log('Cantidad actualizada correctamente:', data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
});
