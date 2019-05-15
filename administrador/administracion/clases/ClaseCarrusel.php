<?php

include_once("conexion.class.php");

class ClaseCarrusel{
    var $con;
    function ClaseCarrusel() {
        $this->con = new DBManager;
    }
    
    function mostrarElementos() {
        if ($this->con->conectar() == true) {
            return $this->con->obtenerSql()->query("SELECT *  FROM carrusel");
        }
    }



    function mostrarElementosPagina($ubicacion)
    {
      if ($this->con->conectar() == true) {
        return  $this->con->obtenerSql()->query("SELECT * FROM carrusel WHERE ubicacionPagina='" . $ubicacion."'");
    }
}

function mostrarElemento($id)
{
  if ($this->con->conectar() == true) {
    return  mysqli_fetch_array( $this->con->obtenerSql()->query("SELECT * FROM carrusel WHERE id=" . $id));
}
}


function insertarSlide($titulo,$ubicacion,$texto,$boton,$imagen) {

    if ($this->con->conectar() == true) {
        return $this->con->obtenerSql()->query("INSERT INTO carrusel VALUES (null, '$titulo', '$ubicacion', '$texto', '$boton','$imagen');");
    }
    
    

}
function editarSlide($id,$titulo,$ubicacion,$texto,$boton,$imagen) {
    if ($this->con->conectar() == true) {
        return $this->con->obtenerSql()->query("UPDATE carrusel set titulo='$titulo', ubicacionPagina='$ubicacion', texto='$texto', boton='$boton' ,imagen='$imagen' where id='$id'");
    }
}

function eliminarSlide($id) {
    if ($this->con->conectar() == true) {
        return $this->con->obtenerSql()->query("delete from carrusel where id='$id'");
    }
}

}

?>