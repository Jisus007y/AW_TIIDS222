<?php

include("conexion.php");

$conn = conectar();

$matricula = $_POST['matricula'];
$nombre = $_POST['nombre'];
$apellido_p = $_POST['paterno'];
$apellido_m = $_POST['materno'];
$edad = $_POST['edad'];

$sql = "INSERT INTO alumnos
(matricula, nombre, apellido_paterno, apellido_materno, edad)
VALUES
('$matricula', '$nombre', '$apellido_p', '$apellido_m', '$edad')";

$query = mysqli_query($con, $sql);

if($query){
    header("Location: alumnos.php");
}

else{
    echo "Error al insertar el registro:";
}
