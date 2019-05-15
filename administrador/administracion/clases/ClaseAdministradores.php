<?php

include_once("conexion.class.php");

class ClaseAdministradores{
    var $con;
    function ClaseAdministradores() {
        $this->con = new DBManager;
    }

    
    function mostrarAdministradores() {
        if ($this->con->conectar() == true) {
            return $this->con->obtenerSql()->query("SELECT *  FROM administradores");
        }
    }

    function mostrarAdministrador($usuario,$contrasenia) {
        if ($this->con->conectar() == true) {
            $sql="SELECT nombre,imagen,correo,rol  from administradores WHERE usuario='" . $usuario."' and contrasenia= '".$contrasenia."'";
            return mysqli_fetch_array( $this->con->obtenerSql()->query($sql));
        }
    }

    function insertarAdministrador($usuario,$contrasenia,$nombre,$correo,$imagen,$rol) {
        if ($this->con->conectar() == true) {
            $sql="INSERT INTO administradores VALUES (NULL, '$usuario', '$contrasenia',NULL,'$nombre','$correo','$imagen','$rol');";
            //return $sql;
            return $this->con->obtenerSql()->query($sql);
        }
    }


    function verificarLogin($usuario,$contrasenia)
    {
      if ($this->con->conectar() == true) {
        $sql="SELECT count(*) as total from administradores WHERE usuario='" . $usuario."' and contrasenia= '".$contrasenia."'";
        return mysqli_fetch_array( $this->con->obtenerSql()->query($sql));
    }
}
function editarAdministrador($id,$usuario,$contrasenia,$nombre,$imagen) {
    if ($this->con->conectar() == true) {
        return $this->con->obtenerSql()->query("UPDATE administradores set usuario='$usuario', contrasenia='$contrasenia' where id='$id'");
    }


}


function eliminarAdministrador($id) {
    if ($this->con->conectar() == true) {
        return $this->con->obtenerSql()->query("delete from administradores where id='$id'");
    }
}

function buscarIdPorCorreo($correo)
{
 if ($this->con->conectar() == true) {
    $sql="SELECT * FROM administradores WHERE correo='" . $correo."'";

    $consulta=$this->con->obtenerSql()->query($sql);
    if(mysqli_num_rows($consulta)!=0)
    {
        $row= mysqli_fetch_array($consulta);
        return $row['id'];
    }else
    {
        return -1;
    }
}
}
function buscarPorRecuperacion($numero)
{
    if ($this->con->conectar() == true) {

        $sql="SELECT * FROM administradores WHERE cambioContrasenia='" . $numero."'";
        $consulta=$this->con->obtenerSql()->query($sql);
        if(mysqli_num_rows($consulta)!=0)
        {
            $row= mysqli_fetch_array($consulta);
            return $row['id'];
        }else
        {
            return -1;
        }
    }
}

function crearCambioContrasenia($cambioContrasenia,$id) {
    if ($this->con->conectar() == true) {
       $sql="UPDATE administradores set cambioContrasenia='$cambioContrasenia' where id='$id'";
       return $this->con->obtenerSql()->query($sql);
   }

}
function actualizarContrasenia($contrasenia,$id) {
    if ($this->con->conectar() == true) {
        return $this->con->obtenerSql()->query("UPDATE administradores set cambioContrasenia=NULL, contrasenia='$contrasenia' where id='$id'");
    }

}

}
?>