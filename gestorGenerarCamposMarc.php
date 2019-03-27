<?php

include 'dbModelo.php';

echo "Generando campos marc......";
/***generar campos**/
generarCampoMarc040_c();
generarCampoMarc80_a();
generarCampoMarc100_a();
generarCampoMarc245_a_b_c();
generarCampoMarc650_a();
/***CAMPO 040 $a Origen de catalogación***/
function generarCampoMarc040_c(){

	generarCamposMarc('\'SIUNPA\'', 1, 40, '\'c\'');//CASSETE              
	generarCamposMarc('\'SIUNPA\'', 2, 40, '\'c\'');//LIBRO                
	generarCamposMarc('\'SIUNPA\'', 3, 40, '\'c\'');//CD                   
	generarCamposMarc('\'SIUNPA\'', 4, 40, '\'c\'');//DISQUETE             
	generarCamposMarc('\'SIUNPA\'', 5, 40, '\'c\'');//FOLLETO              
	generarCamposMarc('\'SIUNPA\'', 6, 40, '\'c\'');//PUBLICACIÓN PERIÓDICA
	generarCamposMarc('\'SIUNPA\'', 7, 40, '\'c\'');//CARTOGRAFIA          
	generarCamposMarc('\'SIUNPA\'', 8, 40, '\'c\'');//VIDEO/DVD            
	generarCamposMarc('\'SIUNPA\'', 9, 40, '\'c\'');//SEPARATA             
	generarCamposMarc('\'SIUNPA\'', 10,40, '\'c\'');//MONOGRAFÍA            
	generarCamposMarc('\'SIUNPA\'', 11,40, '\'c\'');//TESINA                
	generarCamposMarc('\'SIUNPA\'', 12,40, '\'c\'');//TESIS                  
	generarCamposMarc('\'SIUNPA\'', 13,40, '\'c\'');//MAT CATEDRA           
	generarCamposMarc('\'SIUNPA\'', 14,40, '\'c\'');//PROYECTO INV          
	generarCamposMarc('\'SIUNPA\'', 15,40, '\'c\'');//CONJUNTO                 
	generarCamposMarc('\'SIUNPA\'', 16,40, '\'c\'');//ARCHIVO DE COMPUTADOR   
	generarCamposMarc('\'SIUNPA\'', 18,40, '\'c\'');//DIAPOSITIVAS           
	generarCamposMarc('\'SIUNPA\'', 19,40, '\'c\'');//FOTOGRAFÍA            
	generarCamposMarc('\'SIUNPA\'', 23,40, '\'c\'');//PARTITURA              

}

/*****CAMPO 080 $a Signatura topográfica ********/
function generarCampoMarc80_a(){

	generarCamposMarc('b.call_nmbr1', 1, 80, '\'a\'');//CASSETE              
	generarCamposMarc('b.call_nmbr1', 2, 80, '\'a\'');//LIBRO                
	generarCamposMarc('b.call_nmbr1', 3, 80, '\'a\'');//CD                   
	generarCamposMarc('b.call_nmbr1', 4, 80, '\'a\'');//DISQUETE             
	generarCamposMarc('b.call_nmbr1', 5, 80, '\'a\'');//FOLLETO              
	generarCamposMarc('b.call_nmbr1', 6, 80, '\'a\'');//PUBLICACIÓN PERIÓDICA
	generarCamposMarc('b.call_nmbr1', 7, 80, '\'a\'');//CARTOGRAFIA          
	generarCamposMarc('b.call_nmbr1', 8, 80, '\'a\'');//VIDEO/DVD            
	generarCamposMarc('b.call_nmbr1', 9, 80, '\'a\'');//SEPARATA             
	generarCamposMarc('b.call_nmbr1', 10,80, '\'a\'');//MONOGRAFÍA           
	generarCamposMarc('b.call_nmbr1', 11,80, '\'a\'');//TESINA               
	generarCamposMarc('b.call_nmbr1', 12,80, '\'a\'');//TESIS                
	generarCamposMarc('b.call_nmbr1', 13,80, '\'a\'');//MAT CATEDRA          
	generarCamposMarc('b.call_nmbr1', 14,80, '\'a\'');//PROYECTO INV         
	generarCamposMarc('b.call_nmbr1', 15,80, '\'a\'');//CONJUNTO             
	generarCamposMarc('b.call_nmbr1', 16,80, '\'a\'');//ARCHIVO DE COMPUTADOR
	generarCamposMarc('b.call_nmbr1', 18,80, '\'a\'');//DIAPOSITIVAS         
	generarCamposMarc('b.call_nmbr1', 19,80, '\'a\'');//FOTOGRAFÍA           
	generarCamposMarc('b.call_nmbr1', 23,80, '\'a\'');//PARTITURA            
}

function generarCampoMarc100_a(){

	generarCamposMarc('b.author', 1, 100, '\'a\'');//CASSETE              
	generarCamposMarc('b.author', 2, 100, '\'a\'');//LIBRO                
	generarCamposMarc('b.author', 3, 100, '\'a\'');//CD                   
	generarCamposMarc('b.author', 4, 100, '\'a\'');//DISQUETE             
	generarCamposMarc('b.author', 5, 100, '\'a\'');//FOLLETO              
	generarCamposMarc('b.author', 6, 100, '\'a\'');//PUBLICACIÓN PERIÓDICA
	generarCamposMarc('b.author', 7, 100, '\'a\'');//CARTOGRAFIA          
	generarCamposMarc('b.author', 8, 100, '\'a\'');//VIDEO/DVD            
	generarCamposMarc('b.author', 9, 100, '\'a\'');//SEPARATA             
	generarCamposMarc('b.author', 10,100, '\'a\'');//MONOGRAFÍA           
	generarCamposMarc('b.author', 11,100, '\'a\'');//TESINA               
	generarCamposMarc('b.author', 12,100, '\'a\'');//TESIS                
	generarCamposMarc('b.author', 13,100, '\'a\'');//MAT CATEDRA          
	generarCamposMarc('b.author', 14,100, '\'a\'');//PROYECTO INV         
	generarCamposMarc('b.author', 15,100, '\'a\'');//CONJUNTO             
	generarCamposMarc('b.author', 16,100, '\'a\'');//ARCHIVO DE COMPUTADOR
	generarCamposMarc('b.author', 18,100, '\'a\'');//DIAPOSITIVAS         
	generarCamposMarc('b.author', 19,100, '\'a\'');//FOTOGRAFÍA           
	generarCamposMarc('b.author', 23,100, '\'a\'');//PARTITURA            
}

function generarCampoMarc245_a_b_c(){

	generarCamposMarc('b.title', 1, 245, '\'a\'');//CASSETE              
	generarCamposMarc('b.title', 2, 245, '\'a\'');//LIBRO                
	generarCamposMarc('b.title', 3, 245, '\'a\'');//CD                   
	generarCamposMarc('b.title', 4, 245, '\'a\'');//DISQUETE             
	generarCamposMarc('b.title', 5, 245, '\'a\'');//FOLLETO              
	generarCamposMarc('b.title', 6, 245, '\'a\'');//PUBLICACIÓN PERIÓDICA
	generarCamposMarc('b.title', 7, 245, '\'a\'');//CARTOGRAFIA          
	generarCamposMarc('b.title', 8, 245, '\'a\'');//VIDEO/DVD            
	generarCamposMarc('b.title', 9, 245, '\'a\'');//SEPARATA             
	generarCamposMarc('b.title', 10,245, '\'a\'');//MONOGRAFÍA           
	generarCamposMarc('b.title', 11,245, '\'a\'');//TESINA               
	generarCamposMarc('b.title', 12,245, '\'a\'');//TESIS                
	generarCamposMarc('b.title', 13,245, '\'a\'');//MAT CATEDRA          
	generarCamposMarc('b.title', 14,245, '\'a\'');//PROYECTO INV         
	generarCamposMarc('b.title', 15,245, '\'a\'');//CONJUNTO             
	generarCamposMarc('b.title', 16,245, '\'a\'');//ARCHIVO DE COMPUTADOR
	generarCamposMarc('b.title', 18,245, '\'a\'');//DIAPOSITIVAS         
	generarCamposMarc('b.title', 19,245, '\'a\'');//FOTOGRAFÍA           
	generarCamposMarc('b.title', 23,245, '\'a\'');//PARTITURA            

	generarCamposMarc('b.title_remainder', 1, 245, '\'b\'');//CASSETE              
	generarCamposMarc('b.title_remainder', 2, 245, '\'b\'');//LIBRO                
	generarCamposMarc('b.title_remainder', 3, 245, '\'b\'');//CD                   
	generarCamposMarc('b.title_remainder', 4, 245, '\'b\'');//DISQUETE             
	generarCamposMarc('b.title_remainder', 5, 245, '\'b\'');//FOLLETO              
	generarCamposMarc('b.title_remainder', 6, 245, '\'b\'');//PUBLICACIÓN PERIÓDICA
	generarCamposMarc('b.title_remainder', 7, 245, '\'b\'');//CARTOGRAFIA          
	generarCamposMarc('b.title_remainder', 8, 245, '\'b\'');//VIDEO/DVD            
	generarCamposMarc('b.title_remainder', 9, 245, '\'b\'');//SEPARATA             
	generarCamposMarc('b.title_remainder', 10,245, '\'b\'');//MONOGRAFÍA           
	generarCamposMarc('b.title_remainder', 11,245, '\'b\'');//TESINA               
	generarCamposMarc('b.title_remainder', 12,245, '\'b\'');//TESIS                
	generarCamposMarc('b.title_remainder', 13,245, '\'b\'');//MAT CATEDRA          
	generarCamposMarc('b.title_remainder', 14,245, '\'b\'');//PROYECTO INV         
	generarCamposMarc('b.title_remainder', 15,245, '\'b\'');//CONJUNTO             
	generarCamposMarc('b.title_remainder', 16,245, '\'b\'');//ARCHIVO DE COMPUTADOR
	generarCamposMarc('b.title_remainder', 18,245, '\'b\'');//DIAPOSITIVAS         
	generarCamposMarc('b.title_remainder', 19,245, '\'b\'');//FOTOGRAFÍA           
	generarCamposMarc('b.title_remainder', 23,245, '\'b\'');//PARTITURA            

	generarCamposMarc('b.responsibility_stmt', 1, 245, '\'c\'');//CASSETE              
	generarCamposMarc('b.responsibility_stmt', 2, 245, '\'c\'');//LIBRO                
	generarCamposMarc('b.responsibility_stmt', 3, 245, '\'c\'');//CD                   
	generarCamposMarc('b.responsibility_stmt', 4, 245, '\'c\'');//DISQUETE             
	generarCamposMarc('b.responsibility_stmt', 5, 245, '\'c\'');//FOLLETO              
	generarCamposMarc('b.responsibility_stmt', 6, 245, '\'c\'');//PUBLICACIÓN PERIÓDICA
	generarCamposMarc('b.responsibility_stmt', 7, 245, '\'c\'');//CARTOGRAFIA          
	generarCamposMarc('b.responsibility_stmt', 8, 245, '\'c\'');//VIDEO/DVD            
	generarCamposMarc('b.responsibility_stmt', 9, 245, '\'c\'');//SEPARATA             
	generarCamposMarc('b.responsibility_stmt', 10,245, '\'c\'');//MONOGRAFÍA           
	generarCamposMarc('b.responsibility_stmt', 11,245, '\'c\'');//TESINA               
	generarCamposMarc('b.responsibility_stmt', 12,245, '\'c\'');//TESIS                
	generarCamposMarc('b.responsibility_stmt', 13,245, '\'c\'');//MAT CATEDRA          
	generarCamposMarc('b.responsibility_stmt', 14,245, '\'c\'');//PROYECTO INV         
	generarCamposMarc('b.responsibility_stmt', 15,245, '\'c\'');//CONJUNTO             
	generarCamposMarc('b.responsibility_stmt', 16,245, '\'c\'');//ARCHIVO DE COMPUTADOR
	generarCamposMarc('b.responsibility_stmt', 18,245, '\'c\'');//DIAPOSITIVAS         
	generarCamposMarc('b.responsibility_stmt', 19,245, '\'c\'');//FOTOGRAFÍA           
	generarCamposMarc('b.responsibility_stmt', 23,245, '\'c\'');//PARTITURA            
}

function generarCampoMarc650_a(){
	
	$columna = "CONCAT(REPLACE(b.topic1, '-', ''), '' ,REPLACE(b.topic2, '-', '|'),  ''  ,REPLACE(b.topic3, '-', '|'),  '' ,REPLACE(b.topic4, '-', '|'),  '' ,REPLACE(b.topic5, '-', '|'))";
	generarCamposMarc($columna, 1, 650, '\'a\'');//CASSETE              
	generarCamposMarc($columna, 2, 650, '\'a\'');//LIBRO                
	generarCamposMarc($columna, 3, 650, '\'a\'');//CD                   
	generarCamposMarc($columna, 4, 650, '\'a\'');//DISQUETE             
	generarCamposMarc($columna, 5, 650, '\'a\'');//FOLLETO              
	generarCamposMarc($columna, 6, 650, '\'a\'');//PUBLICACIÓN PERIÓDICA
	generarCamposMarc($columna, 7, 650, '\'a\'');//CARTOGRAFIA          
	generarCamposMarc($columna, 8, 650, '\'a\'');//VIDEO/DVD            
	generarCamposMarc($columna, 9, 650, '\'a\'');//SEPARATA             
	generarCamposMarc($columna, 10,650, '\'a\'');//MONOGRAFÍA           
	generarCamposMarc($columna, 11,650, '\'a\'');//TESINA               
	generarCamposMarc($columna, 12,650, '\'a\'');//TESIS                
	generarCamposMarc($columna, 13,650, '\'a\'');//MAT CATEDRA          
	generarCamposMarc($columna, 14,650, '\'a\'');//PROYECTO INV         
	generarCamposMarc($columna, 15,650, '\'a\'');//CONJUNTO             
	generarCamposMarc($columna, 16,650, '\'a\'');//ARCHIVO DE COMPUTADOR
	generarCamposMarc($columna, 18,650, '\'a\'');//DIAPOSITIVAS         
	generarCamposMarc($columna, 19,650, '\'a\'');//FOTOGRAFÍA           
	generarCamposMarc($columna, 23,650, '\'a\'');//PARTITURA            
}


function generarCamposMarc($field_data, $mat_code, $tag, $subfield_cd)
{
        $sql = "INSERT INTO `biblio_field_copy`(`bibid`,`tag`, `subfield_cd`, `field_data`)
        		SELECT b.bibid, usm.tag, usm.subfield_cd, ". $field_data ." as field_data 
        		FROM (SELECT bi.* 
        			  FROM biblio bi 
        			  WHERE bi.bibid NOT IN (SELECT DISTINCT bci.bibid 
        									 FROM biblio_field_copy bci 
        									 WHERE bci.tag =".$tag." AND bci.subfield_cd = ".$subfield_cd." ORDER BY bci.bibid)) b 
        		 INNER JOIN material_type_dm mt ON b.`material_cd` = mt.code AND mt.code = ".$mat_code." 
				 INNER JOIN collection_dm cdm ON b.`collection_cd` = cdm.code 
				 INNER JOIN usmarc_subfield_dm usm ON usm.tag = ".$tag." AND usm.subfield_cd = ".$subfield_cd."
				 ORDER BY `b`.`bibid` ASC";
				 
        //echo $sql;
        $conexion = new dbModelo();
        $resultado = $conexion->set_query($sql);
        //return $resultado;    
}