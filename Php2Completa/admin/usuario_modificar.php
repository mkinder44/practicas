<?php

$email = $_REQUEST['email'];

$conexion = mysqli_connect ("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

mysqli_select_db($conexion, "inmobiliaria") or die ("No se puede seleccionar la base de datos");

$instruccion1 = "select * from usuario where correo='$email'";

$consulta = mysqli_query($conexion, $instruccion1) or die ("Fallo en la consulta");

$num_filas = mysqli_num_rows($consulta);

if ($num_filas == 1){
    $resultado = mysqli_fetch_array($consulta);
    print '<html>
    <head>
    <style>
        input {
            margin-bottom: 5px;
        }
    </style>    
    </head>
    <body>
        <form action="usuario_modificarbbdd.php" method="POST">
        Nombre: <input type="text" name="nombre" value="'. $resultado['nombres'] .'"><br>
        Email: <input type="text" name="correo" value="'. $resultado['correo'] .'"><br>
        Passwd: <input type="password" name="pass" value="'. $resultado['clave'] .'"><br>
        <input type="hidden" name="id" value="'. $resultado['usuario_id'] .'"><br>
        <input type="submit" name="actualizar" value="actualizar">
        </form>
    </body>   
</html>';
}

else {
    print "Usuario no encontrado!!.";
}

mysqli_close($conexion);
?>