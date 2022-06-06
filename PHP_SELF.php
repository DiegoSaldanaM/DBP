<?php include("REQUEST_METHOD.php"); ?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Practica 06</title>
        <link rel="stylesheet" href="Lab_6.css">
        <script type="text/javascript" src="Lab_6.js"></script>
    </head>
    <body>
        <div class="contenedor">
            <h1>Formulario de registro</h1>
            <form>
                <div class="relleno">
                <div class="control-form">
                    <input class="campos" id="dni" name="dni" type="text" placeholder="DNI" />
                </div>
                <div class="control-form">
                    <input class="campos" id="nombre" name="nombre" type="text" placeholder="Nombre" />
                </div>
                <div class="control-form">
                    <input class="campos" id="apellidos" name="apellidos" type="text" placeholder="Apellidos" />
                </div>
                <div class="control-form">
                    <input class="campos" id="email" name="email" type="text" placeholder="Email">
                </div>
                <div class="control-form">
                    <input class="campos" id="telefono" name="telefono" type="text" placeholder="Telefono">
                </div>
                <button id="btnAgregar" class="btn" type="button">Agregar</button>
                </div>
            </form>
        </div>
        <div class="contenedor">
            <h1 style="text-align: center;">Clientes registrados</h1>
            <table id="tablaUsuarios" class="tabla">
            <thead>
                <tr>
                    <th>Dni</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Telefono</th>
                </tr>
            </thead>
            <tbody id="contenido"> 
            <?php
            $BaseDatos = new base_datos("localhost", "root" , "", "dbp_2022a_base");
            $BaseDatos->conectar();

            $clientes=$BaseDatos->getClientes();
            if(!is_null ($clientes)){
                while ($row = mysqli_fetch_assoc($clientes)){
                    echo "<tr>";
                    echo "<td>". $row["dni"] ."</td>";
                    echo "<td>". $row["nombre"] ."</td>";
                    echo "<td>". $row["apellidos"] ."</td>";
                    echo "<td>". $row["email"] ."</td>";
                    echo "<td>". $row["telefono"] ."</td>";

                    echo "</tr>";
                }
            }
            $BaseDatos->cerrar();
            ?>
            </tbody>
            </table>
        </div>
    </body>
</html>

