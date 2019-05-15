<?php

require_once('administrador/administracion/clases/ClaseInfoCorporativa.php');

$claseCorporativa= new ClaseInfoCorporativa();

$resultado=$claseCorporativa ->mostrarFila();
$correo=$resultado['email'];

$nombre=$_POST['nombre'];
$edad=$_POST['edad'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$comentarios=$_POST['comentarios'];
$asunto=$_POST['asunto'];


$para      = $correo;
$titulo    = 'Correo pagina web:'.$asunto;
$mensaje   = "\nNombre: ".$nombre."\nEdad: ".$edad."\nTelefono: ".$telefono."\nMensaje:".$comentarios;



// Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
$mensaje = wordwrap($mensaje, 70, "\r\n");

// Enviarlo
if(mail('andress0199@gmail.com', 'Mi título', $mensaje)){
	echo "Enviado";
	$mensajeRespuesta="Nos cominicaremos con usted lo mas pronto posible\nGracias por comunicarse";
	mail($correo,$asunto,$mensajeRespuesta);
}else{
	echo "No fue posible enviarlo";
}
?>