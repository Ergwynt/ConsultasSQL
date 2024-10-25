<?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include('../php/conexion.php')
        $email =isset($_POST['email']);
        $password =isset($_POST['password'])

        $hash = password_hash($password,PASSWORD_BCRYPT)
        $consulta = "SELECT email,pasword FROM user where email = $email";



    }
?>