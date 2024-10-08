<?php
    // Conexion a la base de datos de phpmyadmin
   $con = mysqli_connect(
        'localhost', // Aqui se inerta el host
        'aday', // Nombre del usuario
        '1234', // contraseña
        'prueba' // Nombre de la base de datos
    );
    $con->set_charset('utf8');
?>
