<?php 
include_once("clases/jugador.php");

$jugadores = array();
require_once('administrador/administracion/clases/ClaseJugadores.php');

$claseJugadores= new ClaseJugadores();

$resultado=$claseJugadores ->mostrarTodosJugadores();
while($row=mysqli_fetch_array($resultado)){
	$jugadorTemporal= new jugador($row['nombreCompleto'],$row['posicion'],$row['numero'],$row['imagenPresentacion'],$row['imagenParalax'],$row['imagenTabla'],$row['breveDescripcion'],$row['descripcion']);


	array_push($jugadores,$jugadorTemporal);

}
?>