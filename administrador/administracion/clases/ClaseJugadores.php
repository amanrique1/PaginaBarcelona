<?php

include_once("conexion.class.php");

class ClaseJugadores{
    var $con;
    function ClaseJugadores() {
        $this->con = new DBManager;
    }
    
    function mostrarTodosJugadores() {
        if ($this->con->conectar() == true) {
            return $this->con->obtenerSql()->query("SELECT *  FROM jugadores");
        }
    }
    function insertarJugador($id,$nombre,$posicion,$numero,$imagenPresentacion,$imagenParalax,$imagenTabla,$descripcion,$breve) {
        if ($this->con->conectar() == true) {
            return $this->con->obtenerSql()->query("INSERT INTO jugadores VALUES ('$id', '$nombre', '$posicion', '$numero', '$imagenPresentacion', '$imagenParalax','$imagenTabla','$descripcion','$breve');");
        }
    }


    function mostrarUnJugador($id)
    {
      if ($this->con->conectar() == true) {
        return mysqli_fetch_array( $this->con->obtenerSql()->query("SELECT * FROM jugadores WHERE id=" . $id));
    }
}

function editarJugador($id,$nombre,$posicion,$numero,$imagenPresentacion,$imagenParalax,$imagenTabla,$descripcion,$breve) {
    if ($this->con->conectar() == true) {
        $imagenTabla_editar="";
        $imagenParalax_editar="";
        $imagenPresentacion_editar="";
        if($imagenTabla!=-1){
            $imagenTabla_editar="imagenTabla='$imagenTabla',";
        }
        if($imagenPresentacion!=-1){
            $imagenPresentacion_editar="imagenPresentacion='$imagenPresentacion',";
        }
        if($imagenParalax!=-1){
            $imagenParalax_editar="imagenParalax='$imagenParalax',";
        }

        $sql = "UPDATE jugadores SET nombreCompleto='$nombre', posicion='$posicion',numero='$numero',$imagenPresentacion_editar $imagenParalax_editar $imagenTabla_editar descripcion='$descripcion', breveDescripcion='$breve'  where id='$id'";
       
        if ($this->con->obtenerSql()->query($sql) === TRUE) {
         return true;
     } else {

      return false;

  }
}


}
function eliminarJugador($id) {
    if ($this->con->conectar() == true) {
        return $this->con->obtenerSql()->query("delete from jugadores where id='$id'");
    }
}
}

?>