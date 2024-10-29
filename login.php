<?php
// Iniciar la sesión
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Incluir archivo de conexión
    include('./php/conexion.php');

    // Obtener los valores del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar la consulta
    $consulta = "SELECT id, nombre, email, pasword FROM user WHERE email = ?";
    $stmt = mysqli_prepare($con, $consulta);

    if ($stmt) {
        // Vincular parámetros
        mysqli_stmt_bind_param($stmt, 's', $email);

        // Ejecutar la consulta
        mysqli_stmt_execute($stmt);

        // Obtener el resultado
        $resultado = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($resultado) > 0) {
            // Obtener la fila del resultado
            $fila = mysqli_fetch_assoc($resultado);
            // password_verify($password, $fila['pasword'])
            // Verificar la contraseña usando password_verify
            
            if (password_verify($password, $fila['pasword'])) {
                // Login exitoso - Guardar la información en la sesión
                $_SESSION['usuario_id'] = $fila['id'];
                $_SESSION['nombre'] = $fila['nombre'];
                $_SESSION['email'] = $fila['email'];

                // Redireccionar a una página protegida
                header("Location: ./html/index.php");
                exit();
            } else {
                // Contraseña incorrecta
                echo "Contraseña incorrecta.";
            }
        } else {
            // Usuario no encontrado
            echo "No se encontró un usuario con ese email.";
        }

        // Cerrar la declaración
        mysqli_stmt_close($stmt);
    } else {
        echo "Error al preparar la consulta.";
    }

    // Cerrar la conexión
    mysqli_close($con);
}
?>
