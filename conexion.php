<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";  // Cambia a tu usuario si es diferente
$password = "";      // Cambia a tu contraseña si es diferente
$dbname = "DB_proyect";  // Nombre de la base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {  // Si es el formulario de login
        $nombre_usuario = $_POST['username'];
        $contraseña = $_POST['password'];

        // Consulta para verificar si el usuario existe
        $sql = "SELECT * FROM InicioSesion WHERE nombre_usuario = '$nombre_usuario' AND contraseña = '$contraseña'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Usuario encontrado, redirigir a la página de éxito
            echo "Bienvenido, " . $nombre_usuario;
        } else {
            // Usuario o contraseña incorrectos
            echo "Usuario o contraseña incorrectos";
        }
    }

    if (isset($_POST['contacto'])) {  // Si es el formulario de contacto
        $correo = $_POST['correo'];
        $nombre = $_POST['nombre'];
        $mensaje = $_POST['mensaje'];

        $sql = "INSERT INTO Contactanos (correo, nombre, mensaje) VALUES ('$correo', '$nombre', '$mensaje')";

        if ($conn->query($sql) === TRUE) {
            echo "Mensaje enviado correctamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if (isset($_POST['reserva'])) {  // Si es el formulario de reserva
        $ciudad_salida = $_POST['ciudad_salida'];
        $ciudad_llegada = $_POST['ciudad_llegada'];
        $fecha_salida = $_POST['fecha_salida'];
        $fecha_regreso = $_POST['fecha_regreso'];
        $numero_pasajeros = $_POST['numero_pasajeros'];
        $clase = $_POST['clase'];
        $calificacion_hotel = $_POST['calificacion_hotel'];

        $sql = "INSERT INTO ReservaVuelo (ciudad_salida, ciudad_llegada, fecha_salida, fecha_regreso, numero_pasajeros, clase, calificacion_hotel)
                VALUES ('$ciudad_salida', '$ciudad_llegada', '$fecha_salida', '$fecha_regreso', '$numero_pasajeros', '$clase', '$calificacion_hotel')";

        if ($conn->query($sql) === TRUE) {
            echo "Reserva realizada con éxito.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
