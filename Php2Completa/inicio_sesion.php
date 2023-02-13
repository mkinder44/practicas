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
      
      <h2>Iniciar Sesion</h2>
        <div class="inicio_sesion">
          <form action="inicio_sesion2.php" method="get">
            <input type="email" name="correo" placeholder="  EMAIL"> <br>
            <input type="password" name="pass" placeholder="  PASSWORD"><br><br>
        </div>
            <input type="submit" id="iniciar_sesion" class="boton" name="iniciar" value="Iniciar Sesion">
          </form>

          <br><br><br><p>¿No tienes cuenta?&nbsp; &nbsp;&nbsp;   <a href="./registrarse.php">  Registrarse</a></p>
          
  </div>

    </body>
</html>

