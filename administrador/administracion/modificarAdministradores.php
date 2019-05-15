<?php
session_start();
$opcion=$_GET['opcion'];

require_once('clases/ClaseAdministradores.php');
$claseAdministradores= new ClaseAdministradores();
function random_palabra()
{
	$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	$cad = "";
	for($i=0;$i<13;$i++) {
		$cad .= substr($str,rand(0,62),1);
	}
	return $cad;
}


function subir_imagen($variable,$destino) {
	$tamano = $_FILES[$variable]['size'];
	$tipo = $_FILES[$variable]['type'];
	$tipo = substr($tipo, strpos($tipo, "/") + 1, strlen($tipo));
	$archivo = $_FILES[$variable]['name'];
	if ($archivo != "") {
		$nombre_foto = random_palabra(). "." . $tipo;
		if (copy($_FILES[$variable]['tmp_name'], $destino .$nombre_foto)) {
			return $nombre_foto;
		} else {
			return -1;
		}
	} else {
		return -1;
	}
}


switch ($opcion)
{
	case 1://guardar un nuevo lugar
	$usuario=$_POST['usuario'];
	$constrasenia=$_POST['contrasenia'];
	
	$nombre=$_POST['nombre'];
	$destino = "imagenesAdministradores/";
	$rol=$_POST['rol'];
	$imagen = subir_imagen("imagen", $destino); 
	if($claseAdministradores ->insertarAdministrador($usuario,$constrasenia,$nombre,$imagen,$rol))
	{
		header('Location:../administradores.php?mensaje=almacenado');
		exit();
	}else
	{
		header('Location:../administradores.php?mensaje=error');
		exit();
	}

	break;
	
	case 2: //editar
	$usuario=$_POST['usuario'];
	$constrasenia=$_POST['constrasenia'];
	$id=$_POST['id'];
	$nombre=$_POST['nombre'];
	$rol=$_POST['rol'];
	$destino = "imagenesAdministradores/";
	$imagen = subir_imagen("imagen", $destino); 


	if($claseAdministradores ->editarAdministrador($id,$usuario,$constrasenia,$nombre,$imagen,$rol))
	{
		header('Location:../editarAdministradores.php?id='.$id.'&mensaje=editado');
		exit();
	}else
	{
		header('Location:../editarAdministradores.php?id='.$id.'&mensaje=error');
		exit();
	}
	

	break;
	case 3: //eliminar
	$id=$_GET['id'];

	if($claseAdministradores ->eliminarAdministrador($id))
	{
		header('Location:../administradores.php?mensaje=Eliminado');
		exit();
	}else
	{
		header('Location:../administradores.php?mensaje=error');
		exit();
	}
		# code...
	break;

	case 4://Verficiar Login
	$usuario=$_POST['usuario'];
	$constrasenia=$_POST['constrasenia'];
	$row=$claseAdministradores ->verificarLogin($usuario,$constrasenia);
	
	if($row['total']>0)
	{	
		
		

		$_SESSION["Administrador"]=$claseAdministradores ->mostrarAdministrador($usuario,$constrasenia);
		header('Location:../bienvenida.php?mensaje=Bienvenido');
		exit();
	}else
	{
		header('Location:../index.php?mensaje=error');
		exit();
	}
	
	break;

	case 5: //Enviar correo
	$correo=$_POST['correo'];
	$id=$claseAdministradores->buscarIdPorCorreo($correo);

	if($id!=-1)
	{
		$numero=random_palabra();
		$claseAdministradores->crearCambioContrasenia($numero,$id);

		$para      = $correo;
		$titulo    = 'Recuperar contraseña administrador:';
		$mensaje   = "Se ha solicitado un cambio de contraseña, si no fue usted simplemente ignore este mensaje, de lo contrario de le click aquí";
		$cabeceras = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";


// Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
		$mensaje = wordwrap($mensaje, 70, "\r\n");

		$mensaje = '<html>'.
		'<head><title></title></head>'.
		'<body><h1>un cambio de contraseña</h1>'.
		'si no fue usted simplemente ignore este mensaje, de lo contrario de le  <a href="http://127.0.0.1/Clase%208%20(css)/administrador/recuperarContrasenia?cambioContrasenia='.$numero.'">click aqu&iacute;</a>'.
		'</body>'.
		'</html>';

// Enviarlo
	/*	
		if(mail('andress0199@gmail.com', 'Mi título', $mensaje, $cabeceras)){
			echo "Enviado";
			$mensajeRespuesta="Nos cominicaremos con usted lo mas pronto posible\nGracias por comunicarse";
			mail($correo,$asunto,$mensajeRespuesta);
		}else{
			echo "No fue posible enviarlo";
		}
*/
		header('Location:../index.php?mensaje=Correo Enviado');
		exit();

	}
	else
	{
		header('Location:../index.php?mensaje=Correo No Encontrado');
		exit();
	}


	break;

	case 6: //editar contrasenia

	$contrasenia=$_POST['contrasenia'];
	$id=$_POST['id'];
	$claseAdministradores->actualizarContrasenia($contrasenia,$id);
	header('Location:../index.php?mensaje=Contraseña Actualizada');
	exit();
	break;
}


?>