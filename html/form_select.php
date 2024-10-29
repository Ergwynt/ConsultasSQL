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
    <h2>Mostrar Usuarios</h2>
    <form action="../php/select.php" method="post">
    
        <button type="submit">Mostrar todos los Usuarios</button>
    
    </form>
    <button onclick="window.location.href='./form_insert.php';">Inserción</button>
    <button onclick="window.location.href='./form_delete.php';">Eliminar datos</button>
    <button onclick="window.location.href='./form_update.php';">Modificar datos</button>
</body>
</php>