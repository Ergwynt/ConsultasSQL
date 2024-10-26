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
    <title>Document</title>
</head>
<body>
    <a href="./form_insert.php">Insertar</a>
    <a href="./form_select.php">Editar</a>
    <a href="./form_delete.php">Eliminar</a>
    <a href="./form_update.php">Modificar</a>
</body>
</php>