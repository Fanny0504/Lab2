<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Usuario no encontrado.";
        exit();
    }
} else {
    echo "ID no válido.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Usuario</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, sans-serif;
        background: linear-gradient(135deg, #fdcae1, #9ce0db);
        display: flex; justify-content: center; align-items: center;
        height: 100vh; margin: 0;
    }
    form {
        background: #ffe5f0;
        padding: 25px 35px;
        border-radius: 15px;
        box-shadow: 0px 6px 15px rgba(0,0,0,0.1);
        width: 350px;
    }
    h2 {
        text-align: center; color: #c594aa; margin-bottom: 20px;
    }
    label { display: block; margin-top: 12px; font-weight: bold; color: #5dc1b9; }
    input {
        width: 100%; padding: 10px; margin-top: 6px;
        border: 2px solid #c594aa; border-radius: 8px; background: white;
    }
    button {
        margin-top: 20px; width: 100%; padding: 12px;
        background: #5dc1b9; color: white; border: none;
        border-radius: 8px; font-size: 16px; font-weight: bold;
        cursor: pointer; transition: 0.3s;
    }
    button:hover { background: #c594aa; }
</style>
</head>
<body>
    <form action="update_usuario.php" method="POST">
        <h2>Editar Usuario</h2>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

        <label>Edad</label>
        <input type="number" name="edad" value="<?php echo $row['edad']; ?>" required>

        <label>Teléfono</label>
        <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>" required>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
