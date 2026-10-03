<?php
/* se incluye el archivo de conexion a la base de datos */
include("conexon.php");

/* mandamos a llamar para ejecutar la funcon */
$con = conectar();

/*dame todo lo que tengas en la tabla de alumnos */
$sql = "SELECT * FROM alumnos";

/* ejecutamos la consulta */
$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLA DE ALUMNOS</title>
    <style>
        body { font-family: Arial; background-color: white; padding: 20px; margin: 0; }
        .contenedor { display: grid; grid-template-columns: 50% 50%; gap: 40px; }
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 6px; }
        table { background-color: white; width: 100%; }
        input { padding: 5px; }
        a { color: blue; text-decoration: none; margin-right: 5px; }
    </style>
</head>
<body>

<?php
$conn = new mysqli("localhost", "root", "", "Aw_CRUD");
$resultado = $conn->query("SELECT * FROM alumnos");
?>

<div class="contenedor">
    <!-- TABLA -->
    <div>
        <h3>TABLA DE ALUMNOS</h3>
        <table>
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="?editar=">Editar</a>
                        <a href="?eliminar=">Eliminar</a>
                    </td>
                </tr>
                <?php while($fila = $resultado->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $fila['matricula']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['apellido_paterno']; ?></td>
                    <td><?php echo $fila['apellido_materno']; ?></td>
                    <td>
                        <a href="?editar=<?php echo $fila['matricula']; ?>">Editar</a>
                        <a href="?eliminar=<?php echo $fila['matricula']; ?>">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- FORMULARIO -->
    <div>
        <h3>Formulario</h3>
        <form action="insertar.php" method="post" style="display: flex; gap: 10px;">
            <input type="text" name="matricula" placeholder="Matricula" required>
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellido_paterno" placeholder="Apellido Paterno" required>
            <input type="text" name="apellido_materno" placeholder="Apellido Materno" required>
            
            <input type="submit" name="guardar" value="Guardar">
        </form>
    </div>
</div>

</body>
</html>