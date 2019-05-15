<?php
date_default_timezone_set("America/Bogota");
class DBManager {
    var $conect;
    var $BaseDatos;
    var $Servidor;
    var $Usuario;
    var $Clave;
    function DBManager() {


        $this->BaseDatos = "id1950669_paginabarcelona";
        $this->Servidor = "localhost";
        $this->Usuario = "id1950669_andres2";
        $this->Clave = "123456";
        

        $this->Servidor = "localhost";
        $this->Usuario = "root";
        $this->Clave = "";        
        $this->BaseDatos = "pagina_barcelona";


    }
    function conectar() {
        $mysqli = new mysqli($this->Servidor, $this->Usuario, $this->Clave,$this->BaseDatos);


        if ($mysqli->connect_error) {
            echo "ERROR". $mysqli->connect_error;
            return false;
        }
        $this->conect =  $mysqli;
        return true;
    }

    function obtenerSql(){
        return $this->conect;
    }
}
?>