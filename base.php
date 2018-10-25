<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of base
 *
 * @author roberto
 */
class base {
    //put your code here
    protected $host = "localhost";
    protected $user = "root";
    protected $pass = "G2h3j4%&";
    protected $conexion;
    
    public function __construct($base) {
        $this->conexion = mysqli_connect($this->host, $this->user, $this->pass, $base)
            or die('No se pudo conectar: ' . mysqli_error());
    }
    public function conectar($base){
        mysqli_select_db($base) or die('No se pudo seleccionar la base de datos');
    }
    
    public function consulta($sql){
        $result = mysqli_query($this->conexion, $sql);
        return $result;
    }
    
    public function cerrar(){
        mysqli_close($this->conexion);
    }
}
