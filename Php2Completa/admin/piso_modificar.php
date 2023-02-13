<?php

$cod_piso = $_REQUEST['cod_piso'];

$conexion = mysqli_connect ("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

mysqli_select_db($conexion, "inmobiliaria") or die ("No se puede seleccionar la base de datos");

$instruccion1 = "select * from pisos where codigo_piso=$cod_piso";

$consulta = mysqli_query($conexion, $instruccion1) or die ("Fallo en la consulta");

$num_filas = mysqli_num_rows($consulta);


if ($num_filas == 1){
    $resultado = mysqli_fetch_array($consulta);
    print '<html>
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
    <form action="piso_modificarbbdd.php" method="POST" ENCTYPE="multipart/form-data">
         <input type="hidden" name="cod_piso" value="'. $resultado['Codigo_piso'] .'"><br>
        Calle: <input type="text" name="calle" value="'. $resultado['calle'] .'" ><br>
        Numero: <input type="text" name="numero" value="'. $resultado['numero'] .'" ><br>
        Piso: <input type="number" name="piso" value="'. $resultado['piso'] .'" ><br>
        Puerta: <input type="text" name="puerta" value="'. $resultado['puerta'] .'" ><br>
        CP: <input type="number" name="cp" value="'. $resultado['cp'] .'" ><br>
        Metros: <input type="number" name="metros" value="'. $resultado['metros'] .'" ><br>
        Zona: <input type="text" name="zona" value="'. $resultado['zona'] .'" ><br>
        Precio: <input type="text" name="precio" value="'. $resultado['precio'] .'" ><br>
        Imagen: <input type="Hidden" name="MAX_FILE_SIZE" value="1024000" >
        <input type="file" name="imagen_up" value="'. $resultado['imagen'] .'" ><br>
        <input type="submit" name="modificar" value="Modificar" ><br><br>
        <a href="./piso.html">Volver al Menu</a>

    </form>
    </body>
</html>';
}

else {
    print "Usuario no encontrado!!.";
}

mysqli_close($conexion);
?>