<?php
class itemCarrusel
{
    // Declaración de una propiedad
	public $titulo;
	public $texto;
	public $imagen;
	public $boton;

	public function __construct($titulo,$texto,$imagen,$boton) {
		$this->titulo=$titulo;
		$this->texto=$texto;
		$this->imagen=$imagen;
		$this->boton=$boton;
	}



}
?>