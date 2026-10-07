<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen 1er Parcial - Aplicaciones Web</title>
    <style> 

    .seccion{
        background-color: lightgreen;
        padding: 20px 40px;
        margin: 20px;
        border: 10px double black;
    }

</style>

</head>
<body>

    <div class="seccion">
        <h2>EXAMEN 1ER PARCIAL - APLICACIONES WEB</h2>
         </div>

          <div class="contenedor-tabla">
    <h4>TABLA DE CARROS</h4>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>MARCA</th>
                <th>MODELO</th>
                <th>AÑO</th>
                <th>PRECIO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Toyota</td>
                <td>Corolla</td>
                <td>2022</td>
                <td>$310,000</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Ford</td>
                <td>Mustang GT</td>
                <td>2020</td>
                <td>$ 520,000</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Tesla</td>
                <td>Model 3</td>
                <td>2025</td>
                <td>$ 590,000</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="fila-medio">
    <!-- IZQUIERDA -->
    <div class="contenedor-formulario">
        <p class="titulo-caja">FORMULARIO</p>
        <ul>
            <li>- Marca</li>
            <li>- Modelo</li>
            <li>- Año</li>
            <li>- Precio</li>
        </ul>
    </div>

    <div class="contenedor-rubricas">
            <div class="rubrica">
                <p>R1 - Introducción a Git y GitHub</p>
                <a href="http://localhost/AW_TIIDS222/aw.html">URL</a>
            </div>
            <div class="rubrica">
                <p>R2 - HTML + CSS + Box Model</p>
                <a href="http://localhost/AW_TIIDS222/index.php">URL</a>
            </div>
            <div class="rubrica">
                <p>R3 - Flex y Grid</p>
                <a href="http://localhost/AW_TIIDS222/CRUD/alumnos.php">URL</a>
            </div>
        </div>

         <div class="cv">
        <header class="encabezado" style="display: flex; background-color: paleturquoise; align-items: center; padding: 20px;">
            <div class="foto">
                <img src="OPI.webp" alt="Foto de perfil" style="width: 120px; height: 120px; object-fit: cover; padding: 10px; border-radius: 50%;">
            </div>
            <div class="informacion-personal" style="text-align: left; margin-left: 20px;">
                <h1 style="margin:0;">Jose de Jesus Peña Salgado</h1>
                <h2 style="margin:5px 0 0 0; font-weight: normal;">Mi experencia a lo largo de estos 4 cuatrimestre asido interesante por que he tenido varias experiensias nuevas como he pasado con buena calificacion o me ido a final </h2>
            </div>
        </header>

</body>
</html>