<?php

include("conexon.php");

$con = conectar();

$matricula = $_POST['matricala'];
$nombre = $_POST['nombre'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$edad = $_POST['edad'];

$sql = "INSERT INTO alumnos
(matricala, nombre, apellido_p, apellido_m, edad)
VALUES
('$matricula', '$nombre', '$apellido_p', '$apellido_m', '$edad')";

$query = mysqli_query($con, $sql);

if($query){
    header("Location: alumnos.php");
}

else{
    echo "Error al insertar el registro:";
}