<?php
session_start();
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
      <a href="listar.php" >Listar</a>
        <a href="buscar.php" >Buscar</a>
        <a href="comprar.php" >Comprar</a>
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
      <form action="comprar1.php" method="GET">
            <input type="number" name="cod" class="tamaño" placeholder="codigo de piso" required><br><br>
            <input type="submit" name="comprar" class="boton" value="comprar"><br><br>
        
        </form>
      </div>
    
    </body>
    </html>