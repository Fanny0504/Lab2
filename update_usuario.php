<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE usuarios SET nombre='$nombre', email='$email', edad=$edad, telefono='$telefono' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: mostrar_usuarios.php");
        exit();
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}
$conn->close();
?>
