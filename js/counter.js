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
            const counterElement = button.parentElement.querySelector('h6');
            let counterValue = parseInt(counterElement.innerText);
            counterValue = Math.max(1, counterValue - 1); // Establece el mínimo en 1
            counterElement.innerText = counterValue;
        });
    });

    incrementButtons.forEach(button => {
        button.addEventListener('click', () => {
            const counterElement = button.parentElement.querySelector('h6');
            let counterValue = parseInt(counterElement.innerText);
            counterValue++; // Incrementa en 1
            counterElement.innerText = counterValue;
        });
    });
});