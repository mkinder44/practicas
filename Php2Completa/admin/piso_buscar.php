<?php
if (isset($_REQUEST['buscar'])){
    $zona = $_REQUEST['zona'];
    $conexion = mysqli_connect("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

    mysqli_select_db($conexion, "inmobiliaria") or die ("No se puede seleccionar la base de datos");

    $instruccion1 = "select * from pisos where zona like '$zona'";

    $consulta = mysqli_query($conexion, $instruccion1) or die ("Fallo en la consulta");

    $num_filas = mysqli_num_rows($consulta);

    if ($num_filas >= 1){
        print "<table><tr><th>Cod Piso</th><th>Calle</th><th>Numero</th><th>Piso</th><th>Puerta</th><th>CP</th>
        <th>Metros</th><th>Zona</th><th>Precio</th><th>Imagen</th><th>Usuario_id</th></tr>";
        for ($i=0; $i<$num_filas; $i++){
            $resultado = mysqli_fetch_array($consulta);
            print "<tr><td>" . $resultado['Codigo_piso'] . "</td><td>" . $resultado['calle'] . "</td><td>" . $resultado['numero'] . "</td><td>" . $resultado['piso'] . "</td><td>" . $resultado['puerta'] . "</td><td>" . $resultado['puerta'] . "</td><td>" . $resultado['cp'] . "</td>
            <td>" . $resultado['metros'] . "</td><td>" . $resultado['zona'] . "</td><td>" . $resultado['precio'] . "</td><td><img src='./img/" . $resultado['imagen'] . "'heigth=100px width=100px> </td><td>" . $resultado['usuario_id'] . "</td></tr>";
        }
            print "</table>";  
            print"<br><br><a href='./piso.html'>Volver a Menu</a>";
  
    }
    else{
        print "No se encuentra ningun piso en esa zona.";
    }

}
else{
?>
<html>
    <head>
    
    </head>
    <body>
        <h3>Buscar Piso</h3>
        <form action="piso_buscar.php" method="GET">
            Zona: <input type="text" name="zona" placeholder="zona"><br>
            <input type="submit" name="buscar" value="Buscar"><br><br>
            <a href='./piso.html'>Volver al Menu</a>
        
        </form>
    </body>
</html>

<?php
}
?>