<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$edad = $_POST['edad'];
$telefono = $_POST['telefono'];

// Verificar si el email ya existe
$check = "SELECT * FROM usuarios WHERE email = '$email'";
$res = $conn->query($check);

if ($res->num_rows > 0) {
    echo "<h3 style='color:red;'>Error: El correo ya está registrado </h3>";
    echo "<a href='formulario.html'>Volver al formulario</a>";
    exit();
}

// Insertar datos
$sql = "INSERT INTO usuarios (nombre, email, edad, telefono) VALUES ('$nombre', '$email', $edad, '$telefono')";

if ($conn->query($sql) === TRUE) {
    header("Location: mostrar_usuarios.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
$edad = $_POST['edad'];

// Validar edad: número entero positivo
if (!filter_var($edad, FILTER_VALIDATE_INT) || $edad <= 0) {
    echo "<h3 style='color:red;'>Error: La edad debe ser un número entero positivo.</h3>";
    echo "<a href='formulario.html'>Volver al formulario</a>";
    exit();
}

?>
