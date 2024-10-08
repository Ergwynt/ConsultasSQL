<?php
    // Incluyo el archivo que contiene la conexión a la base de datos.
    include("./conexion.php");

    // Verifico si los datos del formulario han sido enviados.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturo los valores enviados por el formulario.
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];

        // Preparo la consulta SQL para insertar los datos en la tabla 'users'.
        $insert = "INSERT INTO users (nombre, email) VALUES ('$nombre', '$email')";

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