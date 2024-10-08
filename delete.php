<?php
    // Incluyo el archivo donde está la conexión a la base de datos.
    include("./conexion.php");

    // Verifico si los datos han sido enviados a través del formulario.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturo el valor del ID enviado por el formulario.
        $id = $_POST['id'];

        // Primero, verifico si el ID existe en la base de datos.
        $checkIdQuery = "SELECT * FROM users WHERE id = $id";
        $checkResult = mysqli_query($con, $checkIdQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // Si el ID existe, procedo a eliminar el registro.
            $delete = "DELETE FROM users WHERE id = $id";
            $return = mysqli_query($con, $delete);

            // Verifico si la eliminación fue exitosa.
            if ($return) {
                echo "Usuario con ID $id eliminado correctamente.";
            } else {
                echo "Error al eliminar el usuario: " . mysqli_error($con);
            }
        } else {
            // Si el ID no existe, muestro un mensaje.
            echo "El usuario con ID $id no existe.";
        }

        // Cierro la conexión a la base de datos.
        mysqli_close($con);
    }
?>