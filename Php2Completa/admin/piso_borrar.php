<?php

$cod_piso = trim($_REQUEST['cod_piso']); // quitar espacio al campo

$conexion = mysqli_connect ("localhost", "root", "rootroot") // conectar con el servidor
or die ("No se puede conectar con el servidor.");

mysqli_select_db ($conexion, "inmobiliaria") // seleccionar base de datos
or die ("No se puede seleccionar la base de datos.");

$intruccion1 = "delete from pisos where codigo_piso=$cod_piso";
// echo $intruccion1 //para comprobar errores de mysql

$consulta = mysqli_query ($conexion, $intruccion1)
or die ("Fallo en la consulta");

if ($consulta){ // comprobar que la consulta es verdadera (query ok).
    print "Piso eliminado!!.";
    print "<br><br><a href='./piso.html'>Volver al Menu</a>";
}
else{
    print "Piso no eliminado!!.";
}

//cerrar conexion
mysqli_close($conexion);


?>