<?php

include_once("conexion.class.php");

class ClaseAdministrativos{
    var $con;
    function ClaseAdministrativos() {
        $this->con = new DBManager;
    }
    
    function mostrarTodosAdministrativos() {
        if ($this->con->conectar() == true) {
            return $this->con->obtenerSql()->query("SELECT *  FROM administrativos");
        }
    }



    function mostrarAdministrativo($id)
    {
      if ($this->con->conectar() == true) {
        return mysqli_fetch_array( $this->con->obtenerSql()->query("SELECT * FROM administrativos WHERE id=" . $id));
    }
}

function insertarAdministrativo($nombre,$puesto,$descripcion,$imagen) {

    if ($this->con->conectar() == true) {
        return $this->con->obtenerSql()->query("INSERT INTO administrativos VALUES (null, '$nombre', '$puesto', '$descripcion', '$imagen');");
    }
    
    

}
function editarAdministrativo($id,$nombre,$descripcion,$imagen,$puesto) {
    if ($this->con->conectar() == true) {
       $imagen_editar="";
       if($imagen!=-1){
        $imagen_editar=", imagen='$imagen'";
    }

    $sql = "UPDATE administrativos set nombreCompleto='$nombre', puesto='$puesto', descripcion='$descripcion' $imagen_editar where id='$id'";

    if ($this->con->obtenerSql()->query($sql) === TRUE) {
       return true;
   } else {

      return false;

  };
}
}

function eliminarAdministrativo($id) {
    if ($this->con->conectar() == true) {
        $row=$this->mostrarAdministrativo($id);
        unlink("imagenesAdministrativos/".$row['imagen']);
        return $this->con->obtenerSql()->query("delete from administrativos where id='$id'");
    }
}

}
?>