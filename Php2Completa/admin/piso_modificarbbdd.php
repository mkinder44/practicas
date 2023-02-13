<?php

$cod_piso = $_REQUEST['cod_piso'];
$calle = $_REQUEST['calle'];
$numero = $_REQUEST['numero'];
$piso = $_REQUEST['piso'];
$puerta = $_REQUEST['puerta'];
$cp = $_REQUEST['cp'];
$metros = $_REQUEST['metros'];
$zona = $_REQUEST['zona'];
$precio = $_REQUEST['precio'];

$copiarFichero = false;
if (is_uploaded_file ($_FILES['imagen_up']['tmp_name']))
{
    $nombreDirectorio = "C:/xampp/htdocs/prueba/BBDD/Php2Completa/admin/img/";
    $nombreFichero = $_FILES['imagen_up']['name'];
    $copiarFichero = true;

    //si ya existe un fichero con el mismo nombre, renombrarlo
    $nombreCompleto = $nombreDirectorio . $nombreFichero;
    if (is_file($nombreCompleto)){
        $idUnico = time();
        $nombreFichero = $idUnico . "-" . $nombreFichero;

        echo "----" . $nombreFichero . "----";
    }
}

else if ($_FILES['imagen_up']['error'] == UPLOAD_ERR_FORM_SIZE){
    $maxsize = $_REQUEST['MAX_FILE_SIZE'];
    $nombreFichero = "";
}

if ($copiarFichero){
    move_uploaded_file ($_FILES['imagen_up']['tmp_name'], $nombreDirectorio . $nombreFichero);

}


$conexion = mysqli_connect("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

mysqli_select_db($conexion, "inmobiliaria") or die ("No se puede seleccionar la base de datos.");

$intruccion1 = "update pisos set calle='$calle',numero=$numero, piso=$piso,puerta='$puerta',cp=$cp,metros=$metros,zona='$zona',precio='$precio', imagen='$nombreFichero' where codigo_piso=$cod_piso ";

$consulta = mysqli_query($conexion, $intruccion1) or die ("Fallo en la consulta");

if ($consulta){
    print "Piso actualizado!!";
    print"<br><br><a href='./piso.html'>Volver al Menu</a>";
}
else{
    print "Piso no actualizado!!";
}
mysqli_close($conexion);

?>