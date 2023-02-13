<?php
if (isset($_REQUEST['buscar'])){
    $email = $_REQUEST['correo'];
    $conexion = mysqli_connect("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

    mysqli_select_db($conexion, "inmobiliaria") or die ("No se puede seleccionar la base de datos");

    $instruccion1 = "select * from usuario where correo='$email'";

    $consulta = mysqli_query($conexion, $instruccion1) or die ("Fallo en la consulta");

    $num_filas = mysqli_num_rows($consulta);

    if ($num_filas == 1){
        $resultado = mysqli_fetch_array($consulta);
        print "<table><tr><th>Nombre</th><th>Correo</th></tr>";
        print "<tr><td>" . $resultado['nombre'] . "</td><td>" . $resultado['correo'] . "</td><tr></table>";
    }
    else{
        print "Error, usuario no existe";
    }

}
else{
?>
<html>
    <head>
    
    </head>
    <body>
        <h3>Buscar usuario</h3>
        <form action="usuario_buscar.php" method="GET">
            Correo: <input type="email" name="correo" placeholder="email"><br>
            <input type="submit" name="buscar" value="Buscar"><br><br>
            <a href='./usuario.html'>Volver al Menu</a>
        
        </form>
    </body>
</html>

<?php
}
?>