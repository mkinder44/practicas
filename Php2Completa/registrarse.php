<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link rel="stylesheet" type="text/css" href="./inicio_sesion.css" >
    
    </head>
   
    <body>
    <div class="header">
      <h1>Inmboliaria Fernández Bueno S.L</h1>
      <p class="eslogan">"Fernández Bueno SL, la solución ideal para encontrar tu hogar real, con profesionales de verdad, tu búsqueda terminará bien hecha."</p>
    </div>
    
    <div class="topnav">
      <div class="medio">
      <a href="./index.php">Inicio</a>
      <a href="./inicio_sesion.php">Inicio de Sesion</a>
      <a href="piso_add.php" >Añadir</a>
      <a href="listar.php" >Listar</a>
      <a href="buscar.php" >Buscar</a>
      <a href="comprar.php" >Comprar</a>
      </div>
    </div>
    
  <div class="column">
      
    <h2>Registrarse</h2>
        <div class="registro">
          <form action="registrarse_bbdd.php" method="get">
            <input type="text" name="nombre" placeholder="  NOMBRE"  required><br>
            <input type="email" name="correo" placeholder="  EMAIL" required><br>
            <input type="password" name="pass" placeholder="  PASSWORD" required><br>
            <p class="regis">Tipo de usuario: </p>
            <a class="regis">Comprador</a><input type="radio" class="opcion" name="tipo" value="comprador" required><br><br>
            <a class="regis">Vendedor</a><input type="radio" class="opcion" name="tipo" value="vendedor" required><br><br>
        </div>
       

            <input type="submit" id="registrarse" class="boton" name="registrarse" value="Registrarse">
        </form>         
  </div>

    </body>
</html>


 