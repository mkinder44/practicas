<?php

$nombre = $_REQUEST['nombre'];
$email = $_REQUEST['correo'];
$pass = $_REQUEST['pass'];
$id = $_REQUEST['id'];

$conexion = mysqli_connect("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

mysqli_select_db($conexion, "inmobiliaria") or die ("No se puede seleccionar la base de datos.");

$intruccion1 = "update usuario set nombre='$nombre',correo='$email',clave='$pass' where usuario_id=$id ";

$consulta = mysqli_query($conexion, $intruccion1) or die ("Fallo en la consulta");

if ($consulta){
    print "Usuario actualizado!!";
}
else{
    print "Usuario no actualizado!!";
}
mysqli_close($conexion);

?>