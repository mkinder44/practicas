<?php
session_start();

if (isset($_REQUEST['agregar'])){
$cod_piso = trim($_REQUEST['cod_piso']);
$calle = trim($_REQUEST['calle']);
$numero = trim($_REQUEST['numero']);
$piso = trim($_REQUEST['piso']);
$puerta = trim($_REQUEST['puerta']);
$cp = trim($_REQUEST['cp']);
$metros = trim($_REQUEST['metros']);
$zona = trim($_REQUEST['zona1']);
$precio = trim($_REQUEST['precio']);
$usuario_id= trim($_REQUEST['user_id']);

$copiarFichero = false;
if ($cod_piso=="" || $calle=="" || $numero=="" || $piso=="" || $puerta=="" || $cp=="" || $metros=="" || $zona=="" || $precio==""){
    echo "<script language='javascript'>
    alert('¡¡¡CAMPOS VACIOS !!!');
    window.location.replace('./piso_add.php');
</script>";
}
else if (is_uploaded_file ($_FILES['imagen_up']['tmp_name']))
{
    $nombreDirectorio = "C:/xampp/htdocs/prueba/BBDD/Php2Completa/admin/img/";
    $nombreFichero = $_FILES['imagen_up']['name'];
    $copiarFichero = true;

    //si ya existe un fichero con el mismo nombre, renombrarlo
    $nombreCompleto = $nombreDirectorio . $nombreFichero;
    if (is_file($nombreCompleto)){
        $idUnico = time();
        $nombreFichero = $idUnico . "-" . $nombreFichero;


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

$intruccion = "insert into pisos (codigo_piso, calle, numero, piso, puerta, cp, metros, zona, precio, imagen, usuario_id) values ($cod_piso ,'$calle', $numero, $piso, '$puerta', $cp, $metros, '$zona', $precio, '$nombreFichero', $usuario_id)";
$intruccion2 = "select Codigo_piso from pisos where Codigo_piso=$cod_piso";
$consulta = mysqli_query($conexion, $intruccion2) or die ("Fallo en la consulta");
$num_filas = mysqli_num_rows($consulta);
if ( $num_filas > 0) {
  echo "<script language='javascript'>
    alert('¡¡¡ CODIGO DE PISO EXISTENTE !!!');
    window.location.replace('./piso_add.php');
</script>";
}
else{

$consulta = mysqli_query($conexion, $intruccion) or die ("Fallo en la consulta");

if ($consulta){
    echo "<script language='javascript'>
    alert('¡¡¡Piso añadido !!!');
    window.location.replace('./index.php');
</script>";
}
else{
    print "Piso no dado de alta!!";
}
}

mysqli_close($conexion);

}
else{
?>

<!DOCTYPE html>
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
      <a href="piso_add.php" >Añadir</a>
        <a href="listar.php" >Listar</a>
      </div>
    </div>
    <div class="nombre">
        <p class="comprar1"> Usuario: <?php
            echo $_SESSION['name'];
        ?>
        <form action="../cerrar_sesion.php" method="GET">
        <input type="submit" name="cerrar" class="boton" value="Cerrar Sesion">
        </form></p></div>
      <div class="column">
      <form action="piso_add.php" method="POST" ENCTYPE="multipart/form-data">
        <input type="number" class="tamaño" name="cod_piso" placeholder="Codigo de piso"><br>
        <input type="text" class="tamaño" name="calle" placeholder="Calle"><br>
        <input type="text" class="tamaño" name="numero" placeholder="Numero"><br>
        <input type="number" class="tamaño" name="piso" placeholder="Piso"><br>
        <input type="text" class="tamaño" name="puerta" placeholder="Puerta"><br>
        <input type="number" class="tamaño" name="cp" placeholder="Codigo postal"><br>
        <input type="number" class="tamaño" name="metros" placeholder="Metros"><br>
        <select name="zona1" class="tamaño">
                    <option value="%">todas las zonas</option>
                    <option value="madrid">Madrid</option>
                    <option value="lapeseta">La peseta</option>
                    <option value="carabanchel">Carabanchel</option>
                    <option value="rozas">Las Rozas</option>
                    <option value="atocha">Atocha</option>
              </select>  <br>
       <input type="text" class="tamaño" name="precio" placeholder=" Precio"><br>
        <input type="Hidden" class="tamaño" name="MAX_FILE_SIZE" value="1024000" >
        <input type="FILE" name="imagen_up" class="tamaño" required ><br>
        <input type="hidden" name="user_id" value="<?php 
        print $_SESSION['usuario_id'];
        ?>">
        

        <br><input type="submit" name="agregar" class="boton" value="Agregar"><br><br>

    </form>
      </div>
    
    </body>
    </html>

<?php
}
?>
