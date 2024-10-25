<?php
    // Conexion a la base de datos de phpmyadmin
//    $con = mysqli_connect(
//         'sql203.infinityfree.com', // Aqui se inserta el host
//         'if0_37567037', // Nombre del usuario
//         'ciclon1324', // contraseña
//         'if0_37567037_prueba' // Nombre de la base de datos
//     );
$con = mysqli_connect(
    'localhost', // Aqui se inserta el host
    'root', // Nombre del usuario
    '', // contraseña
    'prueba' // Nombre de la base de datos
);
    $con->set_charset('utf8');
?>