<?php
session_start();

$correo = $_REQUEST['correo'];
$pass = $_REQUEST['pass'];

    $conexion = mysqli_connect("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

    mysqli_select_db($conexion, "inmobiliaria") or die ("No se puede seleccionar la base de datos");

    $instruccion1 = "select * from usuario where correo='$correo' and clave=MD5('$pass')";
    

    $consulta = mysqli_query($conexion, $instruccion1) or die ("Fallo en la consulta");
    $num_filas = mysqli_num_rows($consulta);
    $resultado = mysqli_fetch_array($consulta);
    if ($num_filas == 1){
        $_SESSION['name'] = $resultado['nombres'];
        $_SESSION['email']= $resultado['correo'];
        $_SESSION['tipo'] = $resultado['tipo_usuario'];
        $_SESSION['usuario_id'] = $resultado['usuario_id'];
        $_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;

        if ( $_SESSION['tipo'] == "comprador" ){
            echo "<script language='javascript'>
                alert('Bienvenido comprador: " . $_SESSION['name'] . "');
                window.location.replace('./comprador/index.php');
                </script>"; 
    
        }
        else if ( $_SESSION['tipo'] == "vendedor" ){
            echo "<script language='javascript'>
                alert('Bienvenido vendedor: " . $_SESSION['name'] . "');
                window.location.replace('./vendedor/index.php');
                </script>";

        }
        else if ( $_SESSION['tipo'] == "admin" ){
            header('Location:./admin/index.php');
        }

    }
    else{
        echo "<script language='javascript'>
                alert('Datos erroneos ');
                window.location.replace('./inicio_sesion.php');
                </script>";
    }


?>