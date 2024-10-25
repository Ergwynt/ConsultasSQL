<?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include('../php/conexion.php')
        $email = $_POST['email'];
        $password =password_hash($_POST['password'], PASSWORD_BCRYPT);


    }

?>