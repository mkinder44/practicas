<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8" />
        
    </head>
    <body>
        <h3>Pisos:</h3>

        <ul>
                <a href="piso_add.php" >Añadir</a>
                <a href="listar.php" >Listar</a>
                <a href="buscar.php" >Buscar</a>
                <a href="comprar.php" >Comprar</a>
        </ul>
        <form action="inicio_sesion.php" method="get">
        <input type="submit" name="iniciar" value="Iniciar Sesion">
        </form>
        <form action="registrarse.php" method="get">
        <input type="submit" name="registrar" value="Registrarse">
        </form>
    </body>
</html>