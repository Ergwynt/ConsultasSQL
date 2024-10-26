<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    // Si no hay sesión, redireccionar al login
    header("Location: ../index.html");
    exit();
}
?>

<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>
<body>
    <h2>Eliminar Usuario</h2>
    <form action="../php/delete.php" method="POST">
        <label for="id">ID del usuario a eliminar:</label>
        <input type="number" id="id" name="id" required>
        <br><br>
        <button type="submit">Eliminar</button>
    </form>
    <button onclick="window.location.href='./form_insert.php';">Insertar datos</button>
    <button onclick="window.location.href='./form_select.php';">Ver datos</button>
    <button onclick="window.location.href='./form_update.php';">Modificar datos</button>
</body>
</php>