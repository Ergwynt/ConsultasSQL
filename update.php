<?php
    // Añado un include del archivo donde hago la conexion a la base de datos.
    require("./conexion.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        
        // Declaro una variable update a la que le paso una consulta sql para modificar una fila de la tabla
        // En este caso el nombre del id 11.
        $update = "update users set nombre = '$nombre' where id = $id";

        // Declaro una variable return a la que le paso una funcion que se llama mysqli_query
        // que tendra dos parametros la conexion a la base de datos y la consulta update
        $return = mysqli_query ($con,$update);
        
        // Verifico si la inserción fue exitosa.
        if ($return){
            print_r("Los datos se han cambiado correctamente.");
        }else {
            print_r("Ha habido un error al cambiar los datos.");
        }
        // Cierro la conexion a la base de datos.
        mysqli_close($con);
 







    }
    
?>