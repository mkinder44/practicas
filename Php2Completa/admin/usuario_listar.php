<?php

$conexion = mysqli_connect("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

mysqli_select_db($conexion, "inmobiliaria") or die ("No se puede seleccionar la base de datos");

$instruccion1 = "select * from usuario";

$consulta = mysqli_query($conexion, $instruccion1) or die ("Fallo en la consulta");
$num_filas = mysqli_num_rows($consulta);

if ($consulta){
    print "<table><tr><th>Nombre</th><th>Correo</th></tr>";
    for ($i=0; $i<$num_filas; $i++){
    $resultado = mysqli_fetch_array($consulta);
    print "<tr><td>" . $resultado['nombres'] . "</td><td>" . $resultado['correo'] . "</td><tr>";
    }
    print "</table>";
    print"<br><br><a href='./usuario.html'>Volver al Menu</a>";
}
else{
    print "Error.";
}

?>