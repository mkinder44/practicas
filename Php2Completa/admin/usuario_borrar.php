<?php

$email = trim($_REQUEST['email']); // quitar espacio al campo

$conexion = mysqli_connect ("localhost", "root", "rootroot") // conectar con el servidor
or die ("No se puede conectar con el servidor.");

mysqli_select_db ($conexion, "inmobiliaria") // seleccionar base de datos
or die ("No se puede seleccionar la base de datos.");

$intruccion1 = "delete from usuario where correo='$email'";
// echo $intruccion1 //para comprobar errores de mysql

$consulta = mysqli_query ($conexion, $intruccion1)
or die ("Fallo en la consulta");

if ($consulta){ // comprobar que la consulta es verdadera (query ok).
    print "Usuario eliminado!!.";
    print "<a href='./index.php'>Inicio</a>";
}
else{
    print "Usuario no eliminado!!.";
}

//cerrar conexion
mysqli_close($conexion);


?>