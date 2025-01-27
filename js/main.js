 // Validación de formulario
 document.getElementById("form-suscripcion").addEventListener("submit", function(event) {
    var email = document.getElementById("email").value;
    
    // Verificar si el email tiene el formato correcto
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regex.test(email)) {
        alert("Por favor, ingresa un correo electrónico válido.");
        event.preventDefault();  // Evitar que el formulario se envíe
    }
});










