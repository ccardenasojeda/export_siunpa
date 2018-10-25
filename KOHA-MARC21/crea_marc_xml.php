<?php

//biblio = array(id, 'autor', 'titulo', ... no me acuerdo mas)
$biblio = array(1, 'Simpson, Homero', 'Historia de la cerveza');
//registro => array('id', field, subfield, value)
$consulta = array(
	array(1, '020', 'c', '9789877230963'),
 	array(1, '037', 'a', '00005443'),
  	array(1, '040', 'a', 'BCV'),
 	array(1, '040', 'b', 'spa'),
 	array(1, '041', 'b', 'spa'),
 	array(1, '044', 'b', 'ag'),
 	array(1, '080', 'a', '791.43:982'),
 	array(1, '080', '2', 'M269i'),
 	array(1, '100', 'a', 'Mafud Lucio'),
 	array(1, '245', 'a', 'La imagen ausente'),
 	array(1, '245', 'b', 'El cine mudo argentino en publicaciones gráficas'),
 	array(1, '245', 'c', 'Lucio Mafud'),
 	array(1, '500', 'a', 'nota general'),
 	array(1, '942', 'c', 'BK')
	);
 	
 $items = array(
 	array(1, '952', 'p', '00005443'),
 	array(1, '952', 'g', '$400'),
 	array(1, '952', 'e', 'Donación Biblioteca Nacional'),
 	array(1, '952', 'f', 'Préstamo')
 	);

$ln = "\n";
$xml_head = '<?xml version="1.0" encoding="UTF-8" ?><marc:collection xmlns:marc="http://www.loc.gov/MARC21/slim" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.loc.gov/MARC21/slim http://www.loc.gov/standards/marcxml/schema/MARC21slim.xsd">'.$ln;
	$xml_foot = '</marc:collection>';
	$xml_body = '';
	//despues meter en foreach() 
	$xml_body .= registro_marcXML($biblio, $consulta, $items, $ln).$ln;

	$texto_xml = $xml_head . $xml_body . $xml_foot;

	@$archivo_salida = fopen($salida, "w");
	if ($archivo_salida){
		fwrite($archivo_salida, $texto_xml);
		fclose($archivo_salida);
	} else {
		die("error al abrir {$salida}\n");
	}


function registro_marcXML($biblio, $consulta, $items, $salto){
	$tipo_item = "b"; //bibliográfico
	$tamanio = 1000; //generar por sistema debe calcularse a partir de los datos generados por el sistema
	$pos_base = 260; //generar por sistema debe calcularse a partir del ultimo leader

	$cabecera = leader($tamanio,$pos_base);
	$campo003 = 'XXX';
	$campo001 = 'XXX00012345'; //nro de control se compone de identificador de nro control + id de reg
	$campo005 = date("YmdHis"); //fecha ultimo acceso, esto se puede reemplazar por un parámetro
	$campo008 = campo_control_008('180914',"","","b","spa");
	
	$xml = '<marc:record>'.$salto;
	$xml .= '<marc:leader>' . $cabecera . '</marc:leader>'.$salto;
	$xml .= '<marc:controlfield tag="001">' . $campo001 . '</marc:controlfield>'.$salto;
	$xml .= '<marc:controlfield tag="003">' . $campo003 . '</marc:controlfield>'.$salto;
	$xml .= '<marc:controlfield tag="005">' . $campo005 . '</marc:controlfield>'.$salto;
	$xml .= '<marc:controlfield tag="008">' . $campo008 . '</marc:controlfield>'.$salto;
	
	//IMPORTANTE MUY MUCHO OJITO
	//SI EL CAMPO ES REPETIBLE SE MANTIENE ASI, PEEEEERO SI EL CAMPO NO ES REPETIBLE HAY QUE VER EL SUB 
        //CAMPO, SI EL SUB CAMPO ES REPETIBLE REQUIERE UNA ITERACCION EXTRA EN *1
	foreach($consulta as $campo){
		$xml .= ' <marc:datafield tag="'.$campo[1].'"  ind1=" " ind2=" " >'.$salto;
		//*1
		$xml .= '  <marc:subfield code="'.$campo[2].'">' . $campo[3] . '</marc:subfield>'.$salto;
		$xml .= ' </marc:datafield>'.$salto;
	}
	$xml .= '</marc:record>';
	return $xml;
}

function leader($tamanio,$pos_base,$peli=false){
	$cabecera = str_pad($tamanio, 5, "0", STR_PAD_LEFT);
	$cabecera .= "c"; //05 - c: reg corregido
	$cabecera .= $peli?"g":"a"; //06 - a: material textual - g:material gráfico proyectable
	$cabecera .= "m"; //07 - m: monográfico
	$cabecera .= "#"; //08 - #: sin control especifico
	$cabecera .= " "; //09 -  : no especifica codificacion esquema de codificacion
	$cabecera .= "2"; //10 - 2: numero de indicadores, generado por el sistema
	$cabecera .= "2"; //11 -  : numero de caracteres para delimitadoes de sub campo
	$cabecera .= str_pad($pos_base, 5, "0", STR_PAD_LEFT); //12a16 -  : direccion de la posición base
	$cabecera .= "1"; //17 -  : nivel de codificacion, no especifica codificacion
	$cabecera .= "a"; //18 -  : forma de catalogacion descriptiva, AACR2R
	$cabecera .= " "; //19 -  : requerimiento de registro relacionado
	$estructura = 4500; //generado por el sistema (siempre es 4500)
	$cabecera .= str_pad($estructura, 4, "0", STR_PAD_LEFT); //20a23 -  : Estructura de las entradas del directorio
	return $cabecera;
}

function campo_control_008($fecha = '180914',$publicacion="",$ilustración="",$tipo_item="b",$idioma="spa"){
	$campo008 = $fecha;//0a5 fecha de ingreso segun el patrón aammdd
	$campo008 .= "|";//6 tipo de fecha |:sin fecha
	$campo008 .= "    ";// 7a10 fecha de inicio de publicacion NO APLICA
	$campo008 .= "    ";//11a14 fecha de fin  de publicacion NO APLICA
	/*REQUIERE TABLA DE CONVERSION ENTRE BIBUN Y MARC*/
	$campo008 .= str_pad($publicacion, 3, "#");//15a17 lugar de publicacion segun USMARC Code List for Countries
	$campo008 .= str_pad($ilustración, 4, "|");//18a21 ilustraciones
	$campo008 .= "|";//22 publico al que esta destinada
	$campo008 .= "|";//23 forma del item
	$campo008 .= str_pad($tipo_item, 4, " ");//24a27 naturaleza del contenido b: bibliografia, m:tesis ' ':naturaleza no especificada
	$campo008 .= "|";//28 publicación gubernamental #:no es
	$campo008 .= "|";//29 publicacion de una conferencia |:no codificada
	$campo008 .= "|";//30 homenaje |:no codificada
	$campo008 .= "|";//31 indice |:no codificada
	$campo008 .= "|";//32 posición no definida |:no codificada
	$campo008 .= "|";//33 forma literaria
	$campo008 .= "|";//34 biografia #:no contiene |:no se intenta codificar
	$campo008 .= str_pad($idioma, 4, " ");//35a37 idioma 			REQUIERE TABLA DE CONVERSION
	$campo008 .= "|";//38 registro modificado |:no codificada
	$campo008 .= "|";//39 fuente de catalogacion |:no codificada
	
	return $campo008;
}