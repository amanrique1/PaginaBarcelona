<?php

include_once("conexion.class.php");

class ClaseInfoCorporativa{
	var $con;
	function ClaseInfoCorporativa() {
		$this->con = new DBManager;
	}

	function mostrarFila()
	{
		if ($this->con->conectar() == true) {
			return mysqli_fetch_array( $this->con->obtenerSql()->query("SELECT * FROM infocorporativa where id=1" ));
		}
	}
	
	function crearColumna($nombre, $tipo, $null, $dato)
	{
		if ($this->con->conectar() == true) {
			$this->con->obtenerSql()->query("ALTER TABLE infocorporativa add ".$nombre." ".$tipo. " ".$null." ;" );
			return  $this->con->obtenerSql()->query("UPDATE infocorporativa set ".$nombre."='".$dato."' where id=1" );
		}
	}
	/*
	function editarColumna($nombre,$nombreNuevo,$datoNUevo)
	{
		if ($this->con->conectar() == true) {
			return $this->con->obtenerSql()->query("ALTER TABLE infocorporativa RENAME COLUMN".$nombre." TO ".$nombreNuevo);
		}
	}

*/
	function editarFila($id,$email,$logo)
	{
		if ($this->con->conectar() == true) {
			return mysqli_fetch_array( $this->con->obtenerSql()->query("UPDATE infocorporativa set email='$email', logo='$logo' where id=$id"));
		}
	}

	function devolverTabla()
	{
		if ($this->con->conectar() == true) {
			return  $this->con->obtenerSql()->query("SELECT * FROM infocorporativa" );
			
		}
	}

	function actualizarDato($columna,$dato)
	{
		if ($this->con->conectar() == true) {


			$sql = "UPDATE infocorporativa SET $columna='$dato' where id=1";

			if ($this->con->obtenerSql()->query($sql) === TRUE) {
				return true;
			} else {

				return false;

			}
		}

	}

	function eliminarColumna($columna) {
    if ($this->con->conectar() == true) {
        return $this->con->obtenerSql()->query("ALTER TABLE infocorporativa drop ".$columna);
    }
}
}
?>