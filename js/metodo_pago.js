document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('pagar-btn').addEventListener('click', function() {
        document.getElementById('metodos-pago').style.display = 'block';
    });

    document.getElementById('seleccionar-btn').addEventListener('click', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe

        const metodoPagoSelect = document.querySelector('select[name="pago"]');
        const metodoPagoSeleccionado = metodoPagoSelect.value;

        console.log('Método de pago seleccionado:', metodoPagoSeleccionado); // Depurar

        // Ocultar todas las secciones de información de pago
        document.querySelectorAll('.pago-info').forEach(function(element) {
            element.style.display = 'none';
        });

        // Mostrar la sección de información de pago correspondiente al método seleccionado
        const infoPago = document.getElementById(metodoPagoSeleccionado + '-info');
        if (infoPago) {
            infoPago.style.display = 'block';
        } else {
            console.error('No se encontró información de pago para:', metodoPagoSeleccionado); // Depurar
        }
    });
});