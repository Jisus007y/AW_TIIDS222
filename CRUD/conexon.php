<?php

/* Función para conectar a la base de datos */
function conectar(){
    $host = "localhost";
    $user = "root";
    $pass = "";

    $bd = "AW_CRUD";

    $con=mysqli_connect($host, $user, $pass, $bd);

    mysqli_select_db($con, $bd);

    return $con;
    


}



?>