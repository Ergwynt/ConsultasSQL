<?php
    // Incluyo el archivo que contiene la conexión a la base de datos.
    include("./conexion.php");

    // Verifico si los datos del formulario han sido enviados.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturo los valores enviados por el formulario.
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'],  PASSWORD_DEFAULT);

        // Preparo la consulta SQL para insertar los datos en la tabla 'users'.
        $insert = "INSERT INTO user (nombre, email, pasword) VALUES ('$nombre', '$email','$password')";

        // Ejecuto la consulta.
        $return = mysqli_query($con, $insert);

        // Verifico si la inserción fue exitosa.
        if ($return) {
            echo "Datos insertados correctamente.";
            
        } else {
            echo "Error en la inserción: " . mysqli_error($con);
        }
        // Cierro la conexión a la base de datos.
        mysqli_close($con);
    }
?>