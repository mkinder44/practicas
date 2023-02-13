<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

mysqli_select_db($conexion, "inmobiliaria") or die ("No se puede seleccionar la base de datos");

$instruccion1 = "select * from pisos";

$consulta = mysqli_query($conexion, $instruccion1) or die ("Fallo en la consulta");
$num_filas = mysqli_num_rows($consulta);

if ($consulta){
    print '<!DOCTYPE html>
    <html lang="en">
    <head>
    <title>CSS Website Layout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
    
        <div class="header">
          <h1>Inmboliaria Fernández Bueno S.L</h1>
          <p class="eslogan">"Fernández Bueno SL, la solución ideal
    para encontrar tu hogar real,
    con profesionales de verdad,
    tu búsqueda terminará bien hecha."</p>
        </div>
        
        <div class="topnav">
          <div class="medio">
          <a href="listar.php" >Listar</a>
        <a href="buscar.php" >Buscar</a>
        <a href="comprar.php" >Comprar</a>
          </div>
        </div>
        <div class="nombre">
        <form action="../cerrar_sesion.php" method="GET">
        <p class=comprar1> Usuario: ' . $_SESSION["name"]  . '
        &nbsp;&nbsp;<input type="submit" name="cerrar" class="boton" value="Cerrar Sesion"><br></p>
        </form>
</div>
        
          <div class="column"><div class="tabla">';
    print "<table><tr><th>Cod Piso</th><th>Calle</th><th>Numero</th><th>Piso</th><th>Puerta</th><th>CP</th>
    <th>Metros</th><th>Zona</th><th>Precio</th><th>Imagen</th></tr>";
    for ($i=0; $i<$num_filas; $i++){
    $resultado = mysqli_fetch_array($consulta);
    print "<tr><td>" . $resultado['Codigo_piso'] . "</td><td>" . $resultado['calle'] . "</td><td>" . $resultado['numero'] . "</td><td>" . $resultado['piso'] . "</td><td>" . $resultado['puerta'] . "</td><td>" . $resultado['cp'] . "</td>
    <td>" . $resultado['metros'] . "</td><td>" . $resultado['zona'] . "</td><td>" . $resultado['precio'] . "</td><td><img src='../admin/img/" . $resultado['imagen'] . "'heigth=100px width=100px> </td></tr>";
    }
    print "</table>";
    print '</div></div>
    </body>
    </html>';
}
else{
    print "Error.";
}

?>