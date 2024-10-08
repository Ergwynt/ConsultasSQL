<?php 
    // Añado un include del archivo donde hago la conexion a la base de datos
    require("conexion.php");
    // Verifico si los datos del formulario han sido enviados.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Declaro una variable llamada sql en la que hago una consulta select de todos los elementos de la tabla users
        $select = "SELECT * FROM users";

        // Declaro una variable datos a la que le paso una funcion que se llama mysqli_query
        // que tendra dos parametros la conexion a la base de datos y la consulta select 
        $datos = mysqli_query($con, $select);
        
        // Declaro una variable a la que le paso un array  
        $arrayDatos = array();

        // Recorro la variable datos con un while para ir opteniendo los datos de cada fila de la tabla users y los meto en arrayDatos
        while($row = mysqli_fetch_array($datos)){
            $arrayDatos[] = $row;
        }
        
        // Hago un for recorriendo arrayDatos para mostrar uno a uno los datos de cada user
        // Pudiendo mostrar solo los datos que me interesen de la tabla.
        for($i=0; $i<= count($arrayDatos) -1; $i++){
            echo "Nombre: ";print_r($arrayDatos[$i][1]); echo " | Email: ";
            print_r($arrayDatos[$i][2]);
            echo "<br><br>";
            
        }
        
        // Cierro la conexion de la base de datos
        mysqli_close($con);


    }

?>