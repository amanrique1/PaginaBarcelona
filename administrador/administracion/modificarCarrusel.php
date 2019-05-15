<?php
$opcion=$_GET['opcion'];
require_once('clases/ClaseCarrusel.php');
$claseCarrusel= new ClaseCarrusel();


switch ($opcion)
{
	case 1://guardar un nuevo lugar
	$titulo=$_POST['titulo'];
	$imagen=$_POST['imagen'];
	$ubicacion=$_POST['ubicacionPagina'];
	$texto=$_POST['descripcion'];
	$boton=$_POST['boton'];

	if($claseCarrusel ->insertarSlide($titulo,$ubicacion,$texto,$boton,$imagen))
	{
		header('Location:../carrusel.php?mensaje=almacenado');
		exit();
	}else
	{
		header('Location:../carrusel.php?mensaje=error');
		exit();
	}

	break;
	
	case 2: //editar
	$titulo=$_POST['titulo'];
	$imagen=$_POST['imagen'];
	$ubicacion=$_POST['ubicacionPagina'];
	$texto=$_POST['descripcion'];
	$boton=$_POST['boton'];
	$id=$_POST['id'];
	if($claseCarrusel ->editarSlide($id,$titulo,$ubicacion,$texto,$boton,$imagen))
	{
		
		header('Location:../editarCarrusel.php?id='.$id.'&mensaje=Editado');
		exit();
	}else
	{
		header('Location:../editarCarrusel.php?mensaje=error');
		exit();
	}
	

	break;
	case 3: //eliminar
	$id=$_GET['id'];

	if($claseCarrusel ->eliminarSlide($id))
	{
		header('Location:../carrusel.php?mensaje=Eliminado');
		exit();
	}else
	{
		header('Location:../carrusel.php?mensaje=error');
		exit();
	}
		# code...
	break;
}


?>