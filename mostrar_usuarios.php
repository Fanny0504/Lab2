<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);
$sql = "SELECT id, nombre, email, edad, telefono FROM usuarios";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Lista de Usuarios</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, sans-serif;
        background: linear-gradient(135deg, #fdcae1, #9ce0db);
        padding: 40px;
    }
    .container {
        background: #ffe5f0;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0px 6px 15px rgba(0,0,0,0.1);
        max-width: 950px;
        margin: auto;
    }
    h1 {
        text-align: center;
        color: #c594aa;
        margin-bottom: 25px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }
    th {
        background: #5dc1b9;
        color: white;
        padding: 12px;
    }
    td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }
    tr:hover {
        background: #fdcae1;
    }
    .btn {
        display: inline-block;
        margin-top: 20px;
        padding: 12px 20px;
        background: #c594aa;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
    }
    .btn:hover { background: #5dc1b9; }
    .action-links a {
        margin: 0 5px;
        text-decoration: none;
        font-weight: bold;
    }
    .edit { color: #5dc1b9; }
    .delete { color: #c594aa; }
</style>
</head>
<body>
<div class="container">
    <h1>Usuarios Registrados</h1>
    <?php
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Edad</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["id"]."</td>
                    <td>".$row["nombre"]."</td>
                    <td>".$row["email"]."</td>
                    <td>".$row["edad"]."</td>
                    <td>".$row["telefono"]."</td>
                    <td class='action-links'>
                        <a href='editar_usuario.php?id=".$row["id"]."' class='edit'>✏️ Editar</a> 
                        <a href='eliminar_usuario.php?id=".$row["id"]."' class='delete' onclick='return confirm(\"¿Seguro que deseas eliminar este usuario?\");'>🗑️ Eliminar</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay usuarios registrados.</p>";
    }
    $conn->close();
    ?>
    <a href="formulario.html" class="btn">➕ Registrar Nuevo Usuario</a>
</div>
</body>
</html>
