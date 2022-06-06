<?php
include("REQUEST_METHOD.php");
$BaseDatos = new base_datos("localhost", "root", "", "dbp_2022a_base");
$BaseDatos->conectar();

$dni = $_POST["dni"];
$nom = $_POST["nombre"];
$apel = $_POST["apellidos"];
$ema = $_POST["email"];
$tel = $_POST["telefono"];

$i = 0;
for($a = 0; $a<999999999; $a++){
    $i = $i+1;
}

$BaseDatos->insCliente($dni, $nom, $apel, $ema, $tel);

$clientes = $BaseDatos->getClientes();
if(!is_null($clientes)){
    while($row = mysqli_fetch_assoc($clientes)){
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