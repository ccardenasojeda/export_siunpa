<?php

include 'dbModelo.php';


/**
 * 
 *Permite consultar el catalogo general de libros del SIUNPA
 * @author cristian
 */
//gestorCatalogoLibros::listadoDatosLibros();
//gestorCatalogoLibros::datosLibroId('1');
//gestorCatalogoLibros::datosMarcLibro('1');
//gestorCatalogoLibros::datosMarcLibroLengua('1');
//gestorCatalogoLibros::ejemplaresLibro('1');
class gestorCatalogoLibros {

 static function listadoDatosLibros()
    {
        $sql = "SELECT * FROM siunpa_v_catalogo_libro;";
        $conexion = new dbModelo();
        $resultado = $conexion->get_query($sql);
        
        $input_array = $resultado;
        $prueba = array_chunk($input_array, 2000, true);
		foreach ($prueba as $value) {
			echo "<br>nombre_xml_".reset($value)['bibid']."_".end($value)['bibid'];
			//var_dump(sizeof($value));
			//var_dump(end($value));
		}
		//print_r($prueba[1]);
        //var_dump(sizeof($prueba));
        //return $resultado;
          
    }

 static function datosLibroId($bibid)
    {
        $sql = "SELECT * FROM siunpa_v_catalogo_libro
                WHERE bibid = " . $bibid . ";";
        $conexion = new dbModelo();
        $resultado = $conexion->get_query($sql); 
        var_dump($resultado);
        //return $resultado;
    }
  static function datosMarcLibro($bibid)
    {
        $sql = "SELECT * FROM siunpa_v_datos_marc_catalogo
                WHERE bibid = " . $bibid . " ORDER BY tag, subfield_cd;";
        $conexion = new dbModelo();
        $resultado = $conexion->get_query($sql);
        var_dump($resultado);
        //return $resultado;
    }
  static function datosMarcLibroLengua($bibid)
    {
        $sql = "SELECT * FROM siunpa_v_datos_marc_catalogo
                WHERE tag = 41 AND bibid = " . $bibid . " ;";
        $conexion = new dbModelo();
        $resultado = $conexion->get_query($sql);
        var_dump($resultado);
        //return $resultado;
    }

    static function ejemplaresLibro($bibid)
    {
        $sql = "SELECT * FROM siunpa_v_catalogo_ejemplares  
                WHERE bibid = ".$bibid." GROUP BY barcode_nmbr";
        $conexion = new dbModelo();
        $resultado = $conexion->get_query($sql);
        var_dump($resultado);
        //return $resultado;
    }
    static function isbnsLibros(){
        
        $sql2 ="SELECT * FROM `siunpa_v_datos_marc_catalogo` 
        		WHERE tag = 20 and code = 2  ORDER BY `siunpa_v_datos_marc_catalogo`.`bibid`  ASC";
        $conexion = new dbModelo();
        $resultado = $conexion->get_query($sql2);
        var_dump($resultado);
       //return $resultado;
    }
    static function datosAnalitica($bibid){
        $sql = "SELECT * FROM `biblio_analitica` WHERE bibid = ".$bibid;
        $conexion = new dbModelo();
        $resultado = $conexion->get_query($sql);
        return $resultado;
    }
}