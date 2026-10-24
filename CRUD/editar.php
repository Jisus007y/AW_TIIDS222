<?php
include("conexon.php");
$con = conectar();

$id = $_GET['id'];
$sql = "SELECT * FROM alumnos WHERE matricala='$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar</title>
</head>
<body>
    <h3>Editar Alumno: <?php echo $row['matricala']; ?></h3>
    <form action="update.php" method="POST">
        <input type="hidden" name="id_original" value="<?php echo $row['matricala']; ?>">
        
        Matricula: <input type="text" name="matricala" value="<?php echo $row['matricala']; ?>"><br><br>
        Nombre: <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"><br><br>
        Apellido P: <input type="text" name="apellido_p" value="<?php echo $row['apellido_p']; ?>"><br><br>
        Apellido M: <input type="text" name="apellido_m" value="<?php echo $row['apellido_m']; ?>"><br><br>
        Edad: <input type="text" name="edad" value="<?php echo $row['edad']; ?>"><br><br>

        <input type="submit" value="Actualizar">
    </form>
</body>
</html>