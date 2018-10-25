<?php

include 'dbModelo.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gestorRegistroBibliograifico
 *
 * @author cristian
 */
class gestorRegistroBiblio {

    //put your code here

    static function listadoDatosLibros()
    {
        $sql = "SELECT b.bibid, b.create_dt, b.call_nmbr1, b.call_nmbr2, 
                       b.call_nmbr3, b.title, b.title_remainder, 
                       b.responsibility_stmt, b.author, b.topic1, 
                       b.topic2, b.topic3, b.topic4, b.topic5,
                       mt.description as tipo_material, cdm.description as tipo_coleccion
                FROM biblio b
                INNER JOIN material_type_dm mt ON b.`material_cd`   = mt.code AND mt.code = 2
                INNER JOIN collection_dm   cdm ON b.`collection_cd` = cdm.code
                LIMIT 1000";
        $conexion = new dbModelo();
        $resultado = $conexion->get_query($sql);
       
        return $resultado;    
    }

    static function datosBiblio($bibid)
    {
        $sql = "SELECT  b.bibid, b.create_dt, b.call_nmbr1, b.call_nmbr2, 
                        b.call_nmbr3, b.title, b.title_remainder, 
                        b.responsibility_stmt, b.author, b.topic1, b.topic2, b.topic3, 
                        b.topic4, b.topic5, mt.description as tipo_material, 
                        cdm.description as tipo_coleccion
                FROM biblio b
                INNER JOIN material_type_dm mt ON b.`material_cd`   = mt.code AND mt.code = 2
                INNER JOIN collection_dm   cdm ON b.`collection_cd` = cdm.code
                WHERE b.bibid = " . $bibid . ";";
        $conexion = new dbModelo();
        $resultado = $conexion->get_query($sql);
     
        return $resultado;
    }

    static function datosMarcLibro($bibid)
    {
        $sql = "SELECT bf.tag, bf.subfield_cd,bf.field_data
                FROM biblio b
                INNER JOIN material_type_dm mt ON b.`material_cd`   = mt.code AND mt.code = 2
                INNER JOIN collection_dm   cdm ON b.`collection_cd` = cdm.code
                INNER JOIN biblio_field_copy bf ON b.bibid = bf.bibid
                WHERE b.bibid = " . $bibid . " ORDER BY bf.tag, bf.subfield_cd;";
        $conexion = new dbModelo();
        $resultado = $conexion->get_query($sql);
        
        return $resultado;
    }
    static function datosMarcLibroIdioma()
    {
        $sql = "SELECT bf.tag, bf.subfield_cd,bf.field_data
                FROM biblio b
                INNER JOIN material_type_dm mt ON b.`material_cd`   = mt.code AND mt.code = 2
                INNER JOIN collection_dm   cdm ON b.`collection_cd` = cdm.code
                INNER JOIN biblio_field_copy bf ON b.bibid = bf.bibid
                WHERE bf.tag=41";
        $conexion = new dbModelo();
        $resultado = $conexion->get_query($sql);
        
        return $resultado;
    }
    static function datosMarcLibroLengua($bibid)
    {
        $sql = "SELECT bf.tag, bf.subfield_cd,bf.field_data
                FROM biblio b
                INNER JOIN material_type_dm mt ON b.`material_cd`   = mt.code AND mt.code = 2
                INNER JOIN collection_dm   cdm ON b.`collection_cd` = cdm.code
                INNER JOIN biblio_field_copy bf ON b.bibid = bf.bibid
                WHERE bf.tag = 41 AND b.bibid = " . $bibid . " ;";
        $conexion = new dbModelo();
        $resultado = $conexion->get_query($sql);
        
        return $resultado;
    }

    static function ejemplaresLibro($bibid)
    {
        $sql = "SELECT
                bc.bibid, bc.barcode_nmbr, bc.status_begin_dt, bc.copy_volumen, bc.copy_tomo,
                bc.copy_proveedor, bc.copy_precio, bc.copy_cod_loc, bcn.anio, bcn.estado, bcn.numeros,
                bi.indice, mt.description as tipo_maetrial, cdm.description as tipo_coleccion,
                bcl.description as uuaa, bc.copy_date_sptu
                FROM biblio b
                INNER JOIN material_type_dm mt     ON b.`material_cd`   = mt.code AND mt.code = 2
                INNER JOIN collection_dm cdm       ON b.`collection_cd` = cdm.code 
                INNER JOIN biblio_copy bc          ON b.bibid           = bc.bibid
                LEFT JOIN  biblio_copy_num bcn     ON bcn.bibid         = b.bibid
                LEFT JOIN  biblio_index bi         ON b.bibid           = bi.bibid
                INNER JOIN biblio_cod_library bcl  ON bc.copy_cod_loc = bcl.code  
                WHERE b.bibid = ".$bibid." GROUP BY bc.barcode_nmbr";
        $conexion = new dbModelo();
        $resultado = $conexion->get_query($sql);
        
        return $resultado;
    }

    static function isbnsLibros(){
        $sql = "SELECT bf.bibid, bf.tag, bf.subfield_cd, bf.field_data, mt.description 
                FROM biblio b 
                INNER JOIN material_type_dm mt ON b.`material_cd` = mt.code AND mt.code = 2 
                INNER JOIN collection_dm cdm ON b.`collection_cd` = cdm.code 
                INNER JOIN biblio_field_copy bf ON b.bibid = bf.bibid 
                WHERE bf.tag = 20 AND bf.field_data <> '' 
                ORDER BY `bf`.`bibid` ASC";
        $sql2 ="
                SELECT bf.bibid, bf.tag, bf.subfield_cd, bf.field_data, mt.description 
                FROM biblio b 
                INNER JOIN material_type_dm mt ON b.`material_cd` = mt.code AND mt.code = 2 
                INNER JOIN collection_dm cdm ON b.`collection_cd` = cdm.code 
                INNER JOIN biblio_field_copy bf ON b.bibid = bf.bibid 
                WHERE bf.tag = 20 
                ORDER BY `bf`.`bibid` ASC";
        $conexion = new dbModelo();
        $resultado = $conexion->get_query($sql2);
        return $resultado;
    }
    static function consultarIdiomaMarc($len){
        $sql = "SELECT * FROM `tabla_conversion_idioma` WHERE iso = '".$len."'";
        $conexion = new dbModelo();
        $resultado = $conexion->get_query($sql);
        return $resultado;
    }

}
