<?php
$opcion=$_GET['opcion'];

require_once('clases/ClaseAdministrativos.php');
$claseAdministrativos= new ClaseAdministrativos();

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
	$nombre=$_POST['nombre'];
	$puesto=$_POST['puesto'];
	$descripcion=$_POST['descripcion'];
	$destino = "imagenesAdministrativos/";
	$imagen = subir_imagen("imagen", $destino);

	if($claseAdministrativos ->insertarAdministrativo($nombre,$puesto,$descripcion,$imagen))
	{
		header('Location:../administrativos.php?mensaje=almacenado');
		exit();
	}else
	{
		header('Location:../administrativos.php?mensaje=error');
		exit();
	}

	break;
	
	case 2: //editar
	$nombre=$_POST['nombre'];
	$puesto=$_POST['puesto'];
	$descripcion=$_POST['descripcion'];
	$id=$_POST['id'];

	$destino = "imagenesAdministrativos/";
	$imagen = subir_imagen("imagen", $destino);        

	if($imagen!=-1){
		unlink("imagenesAdministrativos/".$_POST['ruta_imagen_actual']);
	}

	if($claseAdministrativos ->editarAdministrativo($id,$nombre,$descripcion,$imagen,$puesto))
	{
		header('Location:../editarAdministrativos.php?id='.$id.'&mensaje=editado');
		exit();
	}else
	{
		header('Location:../editarAdministrativos.php?id='.$id.'&mensaje=error');
		exit();
	}
	

	break;
	case 3: //eliminar
	$id=$_GET['id'];

	if($claseAdministrativos ->eliminarAdministrativo($id))
	{
		header('Location:../administrativos.php?mensaje=Eliminado');
		exit();
	}else
	{
		header('Location:../administrativos.php?mensaje=error');
		exit();
	}
		# code...
	break;
}


?>