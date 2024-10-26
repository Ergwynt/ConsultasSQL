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
    <title>Inserción</title>
</head>
<body>
    <h2>Inserción de Usuario</h2>
    <form action="../php/insertar.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Pon una contraseña aqui" required>
        <button type="submit">Enviar</button>
    </form>
    <button onclick="window.location.href='./form_delete.php';">Eliminar datos</button>
    <button onclick="window.location.href='./form_select.php';">Ver datos</button>
    <button onclick="window.location.href='./form_update.php';">Modificar datos</button>
</body>
</php>