<?php
// Conexión a la base de datos (ajustar según tu configuración)
$host = "localhost";
$user = "root";
$password = "";
$dbname = "mi_base_de_datos";

$conn = new mysqli($host, $user, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el correo del formulario
    $email = $_POST['email'];

    // Validar el correo
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Correo electrónico inválido.";
    } else {
        // Insertar el correo en la base de datos
        $stmt = $conn->prepare("INSERT INTO suscriptores (email) VALUES (?)");
        $stmt->bind_param("s", $email);
        
        if ($stmt->execute()) {
            // Enviar correo de confirmación
            mail($email, "Confirmación de suscripción", "Gracias por suscribirte a nuestro boletín de noticias.");
            echo "¡Gracias por suscribirte! Te hemos enviado un correo de confirmación.";
        } else {
            echo "Hubo un error al procesar tu suscripción. Intenta de nuevo.";
        }

        // Cerrar la conexión
        $stmt->close();
    }
}

$conn->close();
?>
