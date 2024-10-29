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
    <title>Modificar</title>
</head>
<body>
    <h2>Modificacion de Usuario</h2>
    <form action="../php/update.php" method="POST">

        <label for="id">ID del usuario a modificar:</label>
        <input type="number" id="id" name="id" required>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>

        <button type="submit">Enviar</button>
    </form>
    <button onclick="window.location.href='./delete.php';">Eliminar datos</button>
    <button onclick="window.location.href='./form_select.php';">Ver datos</button>
    <button onclick="window.location.href='./form_insert.php';">Insertar datos</button>
</body>
</php>