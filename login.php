<?php
// Iniciar la sesión
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir archivo de conexión
    include('conexion.php');
    
    // Obtener los valores del formulario
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];

    // Consultar al usuario en la base de datos
    $consulta = "SELECT id, nombre, email, password FROM user WHERE email = '$email'";
    $resultado = mysqli_query($con, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        // Obtener la fila del resultado
        $fila = mysqli_fetch_assoc($resultado);
        
        // Verificar la contraseña usando password_verify
        if (password_verify($password, $fila['password'])) {
            // Login exitoso - Guardar la información en la sesión
            $_SESSION['usuario_id'] = $fila['id'];
            $_SESSION['nombre'] = $fila['nombre'];
            $_SESSION['email'] = $fila['email'];

            // Redireccionar a una página protegida
            header("Location: pagina_protegida.php");
            exit();
        } else {
            // Contraseña incorrecta
            echo "Contraseña incorrecta.";
        }
    } else {
        // Usuario no encontrado
        echo "No se encontró un usuario con ese email.";
    }

    // Cerrar la conexión
    mysqli_close($con);
}
?>