<?php
    // Conexion a la base de datos de phpmyadmin
   $con = mysqli_connect(
        'localhost', // Aqui se inserta el host
        'root', // Nombre del usuario
        '', // contraseña
        'prueba' // Nombre de la base de datos
    );
    $con->set_charset('utf8');
?>
