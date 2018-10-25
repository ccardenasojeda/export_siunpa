<?php

// Incluimos el archivo de configuración el cual posee las credenciales de conexión
include 'config.php';

// Se crea la clase de conexión y ejecución de consultas
class dbModelo {

    // Variable de conexion
    public $conn;

    // La función constructora crea y abre la conexión al momento de instanciar esta clase
    function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); // Los parametros de la funcion mysqli() son las constantes previamente declaradas en el archivo config.php
    }

    // Funcion para obtener un array de resultados
    // Solo se usara para las consultas de tipo SELECT
    function get_query($sql) {
        // Lee la cadena SQL recibida y ejecuta la consulta
        $result = $this->conn->query($sql);
       
        // Hace el rrecorrido por el array de datos y lo guarda en la variable $rows
        while ($rows[] = $result->fetch_assoc());
        // Cierra la consulta
        $result->close();
        //var_dump($rows);
        return $this->eliminar_Nulos($rows);
        //return $this->utf8_encode_deep($rows);
    }
    
    function eliminar_Nulos($rows){
        // Retorna el resultado obtenido
        foreach ($rows as $clave => $valor) {
            if (empty($valor))
                unset($rows[$clave]);
        }
        return $rows;
    }
    function utf8_encode_deep(&$input) {
	if (is_string($input)) {
		$input = utf8_decode($input);
	} else if (is_array($input)) {
		foreach ($input as &$value) {
                    $this->utf8_encode_deep($value);
		}
		unset($value);
	} else if (is_object($input)) {
		$vars = array_keys(get_object_vars($input));
		
		foreach ($vars as $var) {
                    $this->utf8_encode_deep($input->$var);
		}
	}
        return $this->eliminar_Nulos($input);
    }
    // Funcion para hacer cambios dentro de la base de datos
    // Solo se usara para las consultas de tipo INSERT, UPDATE Y DELETE
    function set_query($sql) {
        // Lee la cadena SQL recibida y ejecuta la consulta
        $result = $this->conn->query($sql);

        // Retorna el resultado
        return $result;
    }

    // La función destructora cierra la conexión previamente abierta en el constructor
    function __destruct() {
        $this->conn->close();
    }

}

?>