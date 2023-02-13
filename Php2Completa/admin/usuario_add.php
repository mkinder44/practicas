<?php

if (isset($_REQUEST['agregar'])){
$nombre = trim($_REQUEST['nombre']);
$correo = trim($_REQUEST['correo']);
$pass = trim($_REQUEST['clave']);

if ($nombre == "" || $correo == "" || $pass == ""){
// print "Falta rellenar campos.";
echo "<script language='javascript'>
    alert('Error!! Rellene los campos.');
    window.location.replace('./usuario_add.php');
    </script>"; 
}
else{

$conexion = mysqli_connect("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

mysqli_select_db($conexion, "inmobiliaria") or die ("No se puede seleccionar la base de datos.");

$intruccion = "insert into usuario (nombre, correo, clave) values ('$nombre', '$correo', '$pass')";

$consulta = mysqli_query($conexion, $intruccion) or die ("Fallo en la consulta");

if ($consulta){
    echo "<script language='javascript'>
    alert('Usuario dado de alta!!.');
    window.location.replace('./usuario_add.php');
    </script>";
}
else{
    echo "<script language='javascript'>
    alert('Usuario no dado de alta!!.');
    window.location.replace('./usuario_add.php');
    </script>";
}

mysqli_close($conexion);

}
}
else{
?>
<html>
    <head>
        <meta charset="utf-8" />
        <style>
            input{
                margin-bottom: 5px;
            }
        </style>
    </head>
    <body>
    <h3>Añadir</h3>
    <form action="usuario_add.php" method="GET">
        Nombre: <input type="text" name="nombre"><br>
        Correo: <input type="email" name="correo"><br>
        Clave: <input type="password" name="clave"><br>
        <input type="submit" name="agregar" value="Agregar"><br>
        <a href='./usuario.html'>Volver al Menu</a>

    </form>
    </body>
</html>

<?php
}
?>