<?php
class jugador
{
    // Declaración de una propiedad
	public $posicion;
	public $titulo; //nombre
	public $id;
	public $texto; //breveDescripcion
	public $descripcion;
	public $imagen2;
	public $imagenParalax;
	public $trayectoria;
	

	public function __construct($titulo,$pPosicion,$id,$imagen2,$imagenParalax,$trayectoria ,$texto,$descripcion) {
		
		$this->titulo=$titulo;
		$this->posicion=$pPosicion;
		$this->id=$id;
		$this->imagen2=$imagen2;
		$this->imagenParalax=$imagenParalax;
		$this->texto=$texto;
		$this->descripcion=$descripcion;
		$this->trayectoria=$trayectoria;
	}



}
?>