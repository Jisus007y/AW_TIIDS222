<?php
include("conexon.php");
$con = conectar();

$id = $_GET['id'];

$sql = "DELETE FROM alumnos WHERE matricala='$id'";
$query = mysqli_query($con, $sql);

if($query){
    header("Location: alumnos.php");
}
?>