<?php

$opcion=$_GET['opcion'];
require_once('clases/ClaseInfoCorporativa.php');
$claseInfoCorporativa= new ClaseInfoCorporativa();
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
	$nombre=$_POST['nombreColumna'];
	$null=$_POST['null'];
	$tipo=$_POST['tipo'];
	$tamanio=$_POST['tamanio'];
	$informacion=$_POST['informacion'];

	switch ($tipo) {
		case 1:
		$tipo="text";
			# code...
		break;
		
		case 2:
		$tipo="VARCHAR(".$tamanio.")";
			# code...
		break;
		case 3:
		$tipo="int";
		break;

		case 4:
		$tipo="double";
		break;

		case 5:
		$tipo="date";

	}
	if($null==null)
	{
		$null="NULL";
	}
	else
	{
		$null="NOT NULL";
	}

	if($claseInfoCorporativa ->crearColumna($nombre,$tipo,$null,$informacion))
	{
		header('Location:../infoCorporativa.php?mensaje=Insertado');
		exit();
	}else
	{
		header('Location:../infoCorporativa.php?mensaje=error');
		exit();
	}

	break;

	case 2: //editar
	$nombreColumna=$_POST['nombreColumna'];
	$informacion=$_POST['informacion'];

	
	if($claseInfoCorporativa ->actualizarDato($nombreColumna,$informacion))
	{
		
		header('Location:../editarInfoCorporativa.php?columna='.$nombreColumna.'&mensaje=Editado');
		exit();
	}else
	{
		header('Location:../editarInfoCorporativa.php?mensaje=error');
		exit();
	}
	break;

	case 3: //eliminar
	$columna=$_GET['columna'];

	if($claseInfoCorporativa ->eliminarColumna($columna))
	{
		header('Location:../infoCorporativa.php?mensaje=Eliminado');
		exit();
	}else
	{
		header('Location:../infoCorporativa.php?mensaje=error');
		exit();
	}
		# code...
	break;

}

?>