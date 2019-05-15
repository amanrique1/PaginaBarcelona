<?php

$opcion=$_GET['opcion'];
require_once('clases/ClaseJugadores.php');
$claseJugadores= new ClaseJugadores();
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
	$posicion=$_POST['posicion'];
	$breveDesc=$_POST['breveDesc'];
	$numero=$_POST['numero'];
	$descripcion=$_POST['descripcion'];
	$id=NULL;
	$destino = "imagenesJugadores/";
	$imagenPresentacion = subir_imagen("imagenPresentacion", $destino); 
	$imagenTrayectoria = subir_imagen("imagenTrayectoria", $destino); 
	$imagenParallax = subir_imagen("imagenParalax", $destino);        


	if($claseJugadores ->insertarJugador($id,$nombre,$posicion,$numero,$imagenPresentacion,$imagenParallax,$imagenTrayectoria,$descripcion,$breveDesc))
	{
		header('Location:../jugadores.php?mensaje=Insertado');
		exit();
	}else
	{
		header('Location:../jugadores.php?mensaje=error');
		exit();
	}

	break;

	case 2: //editar
	$id=$_POST['id'];
	$nombre=$_POST['nombre'];
	$posicion=$_POST['posicion'];
	$breveDesc=$_POST['breveDesc'];
	$numero=$_POST['numero'];

	$descripcion=$_POST['descripcion'];

	$destino = "imagenesJugadores/";
	$imagenPresentacion = subir_imagen("imagenPresentacion", $destino); 
	$imagenTrayectoria = subir_imagen("imagenTrayectoria", $destino); 
	$imagenParalax = subir_imagen("imagenParalax", $destino);        

	echo $imagenParalax;

	if($imagenParalax!=-1){
		unlink("imagenesJugadores/".$_POST['ruta_imagen_actualPara']);
	}
	if($imagenPresentacion!=-1){
		unlink("imagenesJugadores/".$_POST['ruta_imagen_actualPrese']);
	}

	if($imagenTrayectoria!=-1){
		unlink("imagenesJugadores/".$_POST['ruta_imagen_actualTabla']);
	}

	if($claseJugadores ->editarJugador($id,$nombre,$posicion,$numero,$imagenPresentacion,$imagenParalax,$imagenTrayectoria,$descripcion,$breveDesc))
	{
		
		header('Location:../editarJugador.php?id='.$id.'&mensaje=Editado');
		exit();
	}else
	{
		header('Location:../editarJugador.php?mensaje=error');
		exit();
	}
	break;

	case 3: //eliminar
	$id=$_GET['id'];

	if($claseJugadores ->eliminarJugador($id))
	{
		header('Location:../jugadores.php?mensaje=Eliminado');
		exit();
	}else
	{
		header('Location:../jugadores.php?mensaje=error');
		exit();
	}
		# code...
		# code...
	break;

}

?>