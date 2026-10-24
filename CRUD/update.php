<?php
include("conexon.php");
$con = conectar();

$id_original = $_POST['id_original'];
$matricula = $_POST['matricala'];
$nombre = $_POST['nombre'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$edad = $_POST['edad'];

$sql = "UPDATE alumnos SET matricala='$matricula', nombre='$nombre', apellido_p='$apellido_p', apellido_m='$apellido_m', edad='$edad' WHERE matricala='$id_original'";
$query = mysqli_query($con, $sql);

if($query){
    header("Location: alumnos.php");
}
?>