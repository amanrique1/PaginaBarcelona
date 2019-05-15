<?php

include_once("conexion.class.php");

class ClaseMapa{
    var $con;
    function ClaseMapa() {
        $this->con = new DBManager;
    }
    
    function mostrarLugares() {
        if ($this->con->conectar() == true) {
            return $this->con->obtenerSql()->query("SELECT *  FROM lugares");
        }
    }
    function insertarLugar($nombre,$descripcion,$imagen,$latitud,$longitud) {
        if ($this->con->conectar() == true) {
            return $this->con->obtenerSql()->query("INSERT INTO lugares VALUES (NULL, '$nombre', '$descripcion', '$imagen', '$latitud', '$longitud');");
        }
    }


    function mostrarUnLugar($id)
    {
      if ($this->con->conectar() == true) {
        return mysqli_fetch_array( $this->con->obtenerSql()->query("SELECT * FROM lugares WHERE id=" . $id));
    }
}
function editarLugar($id,$nombre,$descripcion,$imagen,$latitud,$longitud) {
    if ($this->con->conectar() == true) {
      $imagen_editar="";
      if($imagen!=-1){
        $imagen_editar="imagen='$imagen',";
    }

    return $this->con->obtenerSql()->query("UPDATE lugares set nombre='$nombre', descripcion='$descripcion',$imagen_editar latitud='$latitud',longitud='$longitud' where id='$id'");
}
}

function eliminarLugar($id) {
    if ($this->con->conectar() == true) {
        return $this->con->obtenerSql()->query("delete from lugares where id='$id'");
    }
}
}

?>