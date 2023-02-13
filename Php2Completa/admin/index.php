<?php

if(isset($_REQUEST['cerrar'])){
    header('Location:../index.php');
}
else{
?>

<html>
    <head>
        <meta charset="utf-8" />
        <style>
            li{
                margin-bottom: 5px;
            }
        </style>
    </head>
    <body>
        <h3>Pagina Principal:</h3>

        <ul>
            <li><a href="usuario.html">Usuarios</a></li>
            <li><a href="piso.html">Pisos</a></li>   
        </ul>
        <form action="index.php" method="get">
            <input type="submit" name="cerrar" value="Cerrar Sesion">
        </form>
    </body>
</html>
<?php
}
?>