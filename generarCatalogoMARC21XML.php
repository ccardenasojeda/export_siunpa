<?php

include 'gestorRegistroBiblio.php';
//Modifica el tamanio de memoria para ejecutar las consultas
ini_set('memory_limit', '8192M');

$codigo = 1;
$txt = fopen("archivos_generados.txt", "w");
fwrite($txt, "\n***********************************ARCHIVOS GENERADOS*******************************\n" . PHP_EOL);

while ($codigo < 24) {
    
    $registros = gestorRegistroBiblio::listadoDatosMaterial($codigo);
    //Permite dividir los registros en subarreglos de 1000 en caso que supere este numero.
    $datos = array_chunk($registros, 1000, true);

    switch ($codigo) {

        case 1: //CASSETE
            
            $texto = "Tipo de Registro: CASSETE ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);            
            $path = 'registros_bib_exportado_XML/registros_CS_CASSETE_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'CS', $codigo, "CASSETE", $path);
            break;
        case 2: //LIBROS
            $texto = "Tipo de Registro: LIBROS ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);
            $path = 'registros_bib_exportado_XML/registros_BK_LIBROS_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'BK', $codigo, "LIBROS", $path);
            break;
        case 3: //CDs
            $texto = "Tipo de Registro: CDs ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);
            $path = 'registros_bib_exportado_XML/registros_CD_CDs_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'CD', $codigo, "CDs", $path);
            break;
        case 4: //DISQUETE
            $texto = "Tipo de Registro: DISQUETE ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);
            $path = 'registros_bib_exportado_XML/registros_DQ_DISQUETE_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'DQ', $codigo, "DISQUETE", $path);
            
            break;
        case 5: //FOLLETO
            $texto = "Tipo de Registro: FOLLETO ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);
            $path = 'registros_bib_exportado_XML/registros_FL_FOLLETO_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'FL', $codigo, "FOLLETO", $path);

            break;
        case 6: //PUBLICACIÓN PERIÓDICA
            $texto = "Tipo de Registro: PUBLICACIÓN PERIÓDICA ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);
            $path = 'registros_bib_exportado_XML/registros_CR_PUBLICACION_PERIODICA_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'CR', $codigo, "PUBLICACION_PERIODICA", $path);
            
            break;
        case 7: //CARTOGRAFIA
            $texto = "Tipo de Registro: CARTOGRAFIA ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);
            $path = 'registros_bib_exportado_XML/registros_CAR_CARTOGRAFIA_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'CAR', $codigo, "CARTOGRAFIA", $path);
            
            break;
        case 8: //VIDEO/DVD
            $texto = "Tipo de Registro: VIDEO/DVD ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);
            $path = 'registros_bib_exportado_XML/registros_VD_VIDEODVD_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'VD', $codigo, "VIDEODVD", $path);

            break;
        case 9: //SEPARATA
            $texto =  "Tipo de Registro: SEPARATA ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);

            $texto = "Tipo de Registro: VIDEO/DVD ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);
            $path = 'registros_bib_exportado_XML/registros_SP_SEPARATA_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'SP', $codigo, "SEPARATA", $path);
            
            break;
        case 10: //MONOGRAFÍA
            $texto = "Tipo de Registro: MONOGRAFÍA ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);
            $path = 'registros_bib_exportado_XML/registros_MN_MONOGRAFIA_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'MN', $codigo, "MONOGRAFIA", $path);

            break;
        case 11: //TESINA
            $texto = "Tipo de Registro: TESINA ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);
            $path = 'registros_bib_exportado_XML/registros_TN_TESINA_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'TN', $codigo, "TESINA", $path);
            
            break;
        case 12: //TESIS
            $texto = "Tipo de Registro: TESIS ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);

            $path = 'registros_bib_exportado_XML/registros_TS_TESIS_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'TS', $codigo, "TESIS", $path);
            
            break;
        case 13: //MAT CATEDRA
            $texto = "Tipo de Registro: MAT CATEDRA ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);
            $path = 'registros_bib_exportado_XML/registros_MC_MATCATEDRA_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'MC', $codigo, "MATCATEDRA", $path);
            break;
        case 14: //PROYECTO INV 
            $texto = "Tipo de Registro: PROYECTO INV ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);
            $path = 'registros_bib_exportado_XML/registros_PI_PROYECTOINV_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'PI', $codigo, "PROYECTOINV", $path);
            
            break;
        case 15: //CONJUNTO
            $texton = "Tipo de Registro: CONJUNTO ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);
            $path = 'registros_bib_exportado_XML/registros_CN_CONJUNTO_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'CN', $codigo, "CONJUNTO", $path);
            
            break;
        case 16: //ARCHIVO DE COMPUTADOR 
            $texto = "Tipo de Registro: ARCHIVO DE COMPUTADOR ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);
            $path = 'registros_bib_exportado_XML/registros_CF_ARCHIVODECOMPUTADOR_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'CF', $codigo, "ARCHIVODECOMPUTADOR", $path);
            break;
        case 18: //DIAPOSITIVAS
            $texto = "Tipo de Registro: DIAPOSITIVAS ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);
            $path = 'registros_bib_exportado_XML/registros_DP_DIAPOSITIVAS_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'DP', $codigo, "DIAPOSITIVAS", $path);
            
            break;
        case 19: //FOTOGRAFÍA
            $texto = "Tipo de Registro: FOTOGRAFÍA ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);
            $path = 'registros_bib_exportado_XML/registros_FT_FOTOGRAFIA_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'FT', $codigo, "FOTOGRAFIA", $path);
            
            break;
        case 23: //PARTITURA
            $texto = "Tipo de Registro: PARTITURA ---- Cantidad de Registros: ".sizeof($registros). " ------ Cantidad archivos a generar: ".sizeof($datos);
            $path = 'registros_bib_exportado_XML/registros_PAR_PARTITURA_XMLMARC21';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            generarRegistrosBibliograficosXML($datos, 'PAR', $codigo, "PARTITURA", $path);
            
            break;
        
        default:
            # code...
            break;
    }
    
    if($codigo == 17 || $codigo == 20 || $codigo == 21|| $codigo == 22){
        
    }else{fwrite($txt, $texto."\n" . PHP_EOL);}
    if($codigo == 23){fclose($txt);}
        
    $codigo++;
}



function generarRegistrosBibliograficosXML($reg_bib, $tipo_reg,$cod_mat, $desc_reg, $directorio){
    
    
    //Contador para la cantidad de archivos que se generan y usar en el nombre.
    $cont = 1;
    foreach ($reg_bib as $value) {
    $nombre_xml = $cont."_".$tipo_reg."_".$desc_reg."_".sizeof($value)."_Registros_XMLMARC21_bibid_".reset($value)['bibid']."_a_".end($value)['bibid'];
    
    echo $nombre_xml.'<br>';
        
    generarRegistroBibliograficoMARC21($value, $nombre_xml, $directorio, $tipo_reg, $cod_mat);
    //if($cont == 1){registro_MarcXml($value, $nombre_xml);}
    
    $cont++;
    }
}

function generarRegistroBibliograficoMARC21($material, $nombre_xml, $directorio, $tipo_reg, $cod_mat) {

    /*     * ********DOCUMENTO XML********* */
    $xml = new DomDocument('1.0', 'UTF-8');
    $marc_colection = $xml->createElement('collection');
    $xml->appendChild($marc_colection);
    $marc_colection->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
    $marc_colection->setAttribute('xsi:schemaLocation', 'http://www.loc.gov/MARC21/slim http://www.loc.gov/standards/marcxml/schema/MARC21slim.xsd');
    $marc_colection->setAttribute('xmlns', 'http://www.loc.gov/MARC21/slim');

        
    foreach ($material as $libro_dato) {
        
        $datos_libro      = $libro_dato;

        /**Consulta que permite traer todos los registros MARC21 argados en la tabla biblio_field_copy**/
        $datos_marc       = gestorRegistroBiblio::datosMarcLibroMaterial($datos_libro['bibid'], $cod_mat);

        /**Consulta por cualquier tipo de material, no solo por libros**/
        $ejemplares_libro = gestorRegistroBiblio::ejemplaresLibro($datos_libro['bibid']);
        
        if($cod_mat == 2){//Pregunta si el regsitro es un libro para traer las analiticas
            $analitica_libro  = gestorRegistroBiblio::datosAnalitica($datos_libro['bibid']);
        }

        $marc_record = $xml->createElement('record');
        $marc_colection->appendChild($marc_record);

        /*         * crea el leader con la cabecera del registro* */
        $tamanio = 1000; //generar por sistema debe calcularse a partir de los datos generados por el sistema
        $pos_base = 260; //generar por sistema debe calcularse a partir del ultimo leader
        $cabecera = leader($tamanio, $pos_base); // Llama al metodo que gener el leader
        //Agrega cabecera al archivo XML
        $marc_leader = $xml->createElement('leader', $cabecera);
        $marc_record->appendChild($marc_leader);

        //Agrega campo 001 al XML - nro de control se compone de identificador de nro control + id 
        $campo_001 = 'YPZ' . $datos_libro['bibid']; // Código CAICYT Biblioteca UARG + id bibliografico Open
        //identificador del nuemro de control
        $campo_003 = 'YPZ'; // Código CAICYT Biblioteca UARG
        //Agrega campo 001 al archivo XML
        $marc_ctrl_field = $xml->createElement('controlfield', $campo_001);
        $marc_record->appendChild($marc_ctrl_field);
        $marc_ctrl_field->setAttribute('tag', '001');

        //Agrega campo 003 al archivo XML
        $marc_ctrl_field = $xml->createElement('controlfield', $campo_003);
        $marc_record->appendChild($marc_ctrl_field);
        $marc_ctrl_field->setAttribute('tag', '003');

        //Genera la fecha del campo 005  a partir de la creacion del registro en el sistema anterior
        $date = new DateTime($datos_libro['create_dt']);
        $campo_005 = $date->format('YmdHis');

        //Agrega campo 005 al archivo XML
        $marc_ctrl_field = $xml->createElement('controlfield', $campo_005 . '0');
        $marc_record->appendChild($marc_ctrl_field);
        $marc_ctrl_field->setAttribute('tag', '005');

        //Genera campo 008
        $idioma = idioma($datos_marc)[0];
        if (empty($idioma) || isset($idioma)) {
            $idioma = 'spa';
        }
        $campo_008 = campo_control_008(substr($date->format('Ymd'), -6), "", "", "b", $idioma);

        //Agrega campo 008 al archivo XML
        $marc_ctrl_field = $xml->createElement('controlfield', $campo_008);
        $marc_record->appendChild($marc_ctrl_field);
        $marc_ctrl_field->setAttribute('tag', '008');

        /*         * **********CARGA DEL LOS DATOS BIBLIOGRAFICOS*********** */

        /** Agrega al archivo XML los campos existentes  * */
        foreach ($datos_marc as $campo => $dato) {

            switch ($dato['tag']) {

                case 20: // ISBN no obligatorio
                    $campo_020 = campo_020($datos_marc);
                    if (!empty($campo_020) && isset($campo_020)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_020);
                    }
                    break;

                case 22: // ISSN no obligatorio
                    $campo_022 = campo_022($datos_marc);
                    if (!empty($campo_022) && isset($campo_022)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_022);
                    }
                    break;

                case 40: //fuente de la catalogacion - obligatorio OBLIGATORIO 
                    //- se completo en tabla biblio_field_copi con SIUNPA
                    $campo_040 = campo_040($dato);
                    campoNR_subcampoNR($xml, $marc_record, $campo_040);
                    break;

                case 41: //Codigo de Lengua - No Obligatorio
                    $campo_041 = campo_041($datos_marc);
                    if (!empty($campo_041) && isset($campo_041)) {
                        subcampoR($xml, $marc_record, $campo_041);
                    }
                    break;

                case 44: //Codigo de pais - no obligatorio
                    $campo_044 = campo_044($datos_marc);
                    if (!empty($campo_044) && isset($campo_044)) {
                        subcampoR($xml, $marc_record, $campo_044);
                    }
                    break;

                case 80://campo de signatura - no obligatorio Este campo pertenece a la clasificacion decimal universal
                    $campo_080 = campo_080($datos_marc);
                    if (!empty($campo_080) && isset($campo_080)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_080);
                    }
                    break;
                case 100://ENTRADA PRINCIPAL--NOMBRE DE PERSONA - Autor - campo no obligatorio
                    $campo_100 = campo_100($datos_marc); //Si tiene mas de un autor completa con el campo 700
                    if (!empty($campo_100) && isset($campo_100)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_100);
                    }
                    break;

                case 110://- ENTRADA PRINCIPAL--NOMBRE DE ENTIDAD CORPORATIVA  - campo no obligatorio
                    $campo_110 = campo_110($datos_marc); //Si tiene mas de un autor completa con el campo 710
                    if (!empty($campo_110) && isset($campo_110)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_110);
                    }
                    break;
                case 240: //Titulo Uniforme - Campo no obligatorio - 
                    $campo_240 = campo_240($datos_marc); //Si tiene mas de un titulo uniforme completa con el campo 730

                    if (!empty($campo_240) && isset($campo_240)) {
                        //crea los campos xml del registro en el campo 240 y 730 de ser necesario
                        campoR_subcampoNR($xml, $marc_record, $campo_240);
                    }
                    break;
                case 245: //Mension de Titulo - este campo es obligatorio si no esta se debe crear vacio

                    if ($dato['subfield_cd'] == 'a' && !empty($dato['field_data'])) {
                        /**subcampo $a titulo**/
                        $campo_245['tag'] = '245';
                        $campo_245['subfield_cd'] = $dato['subfield_cd'];
                        $campo_245['field_data'] = $dato['field_data'];
                        $list [] = $campo_245;
                    } else {
                        if ($dato['subfield_cd'] == 'a' && empty($dato['field_data'])) {
                            /**subcampo $a cuando esta vacio se pone informacion para completar **/
                            $campo_245['tag'] = '245';
                            $campo_245['subfield_cd'] = $dato['subfield_cd'];
                            $campo_245['field_data'] = 'completar titulo obligatorio.';
                            $list [] = $campo_245;
                        } else {
                            if ($dato['subfield_cd'] == 'b' && !empty($dato['field_data'])) {
                                /**subcampo $b  resto del titulo o subtitulo**/
                                $campo_245['tag'] = '245';
                                $campo_245['subfield_cd'] = $dato['subfield_cd'];
                                $campo_245['field_data'] = ' : '.$dato['field_data'];
                                $list [] = $campo_245;
                            } else {
                                if ($dato['subfield_cd'] == 'c' && !empty($dato['field_data'])) {
                                    /**subcampo $c mencion de responsabilidad**/
                                    $resultado = str_replace("|", " ; ", $dato['field_data']);

                                    $campo_245['tag'] = '245';
                                    $campo_245['subfield_cd'] = $dato['subfield_cd'];
                                    $campo_245['field_data'] = ' / '.$resultado;
                                    $list [] = $campo_245;
                                }
                            }
                        }
                    }
                    if ($dato['subfield_cd'] == 'c' && !empty($list)) {

                        subcampoR($xml, $marc_record, $list);
                        unset($list);
                    }
                    break;
                case 246://variante del titulo - campo repetible no obligatorio
                    $campo_246 = campo_246($datos_marc);

                    if (!empty($campo_246) && isset($campo_246)) {

                        campoR_subcampoNR($xml, $marc_record, $campo_246);
                    }

                    break;
                case 247://titulo anterior - campo repetibe no obligatorio
                    $campo_247 = campo_247($datos_marc);
                    if (!empty($campo_247) && isset($campo_247)) {

                        campoR_subcampoNR($xml, $marc_record, $campo_247);
                    }
                    break;
                case 250://250 – MENCION DE EDICION (NR) 

                    $campo_250 = campo_250($datos_marc);
                    if (!empty($campo_250) && isset($campo_250)) {

                        subcampoR($xml, $marc_record, $campo_250);
                    }
                    break;
                case 255://titulo anterior - campo repetibe no obligatorio
                    $campo_255 = campo_255($datos_marc);
                    if (!empty($campo_255) && isset($campo_255)) {

                        campoR_subcampoNR($xml, $marc_record, $campo_255);
                    }
                    break;

                case 260:
                    /** CAMPO 260  PUBLICACIÓN, DISTRIBUCIÓN, ETC.* */ //campo y subcampo repetibles no obligatorio

                    if ($dato['subfield_cd'] == 'a' && !empty($dato['field_data']) 
                        && isset($dato['field_data']) && $dato['field_data'] != ' ') {

                        $lugares = explode('|', $dato['field_data']);
                        foreach ($lugares as $campo2 => $d) {

                            $campo_260['tag'] = '260';
                            $campo_260['subfield_cd'] = $dato['subfield_cd'];
                            $campo_260['field_data'] = $d;
                            $listado_260 [] = $campo_260;
                        }
                    } else {
                        if ($dato['subfield_cd'] == 'b' && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {

                            $editores = explode('|', $dato['field_data']);
                            foreach ($editores as $campo3 => $d) {

                                $campo_260['tag'] = '260';
                                $campo_260['subfield_cd'] = $dato['subfield_cd'];
                                $campo_260['field_data'] = ' : '.$d;
                                $listado_260 [] = $campo_260;
                            }
                        } else {
                            if ($dato['subfield_cd'] == 'c' && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {

                                $fechas = explode('|', $dato['field_data']);
                                foreach ($fechas as $campo3 => $d) {

                                    $campo_260['tag'] = '260';
                                    $campo_260['subfield_cd'] = $dato['subfield_cd'];
                                    $campo_260['field_data'] = ' , '.$d;
                                    $listado_260 [] = $campo_260;
                                }
                            }
                        }
                    }
                    /***Para colocar la puntuacion correcta deberia validar los subcampos que tienen datos: 
                    Ejemplos.: 
                     $aLondon : $bMacmillan, $c1995.
                     **/
                    if ($dato['subfield_cd'] == 'c' && !empty($listado_260)) {
                        //var_dump($listado_260);
                        subcampoR($xml, $marc_record, $listado_260);
                        unset($listado_260);
                    }
                    break;
                case 300:
                    /* * CAMPO 300 - DESCRIPCIÓN FÍSICA CAMPO REPETIBLE no OBLIGATORIO  * */
                    if ($dato['subfield_cd'] == 'a' //subcampo repetible
                            && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {

                        $extensiones = explode('|', $dato['field_data']);
                        foreach ($extensiones as $campo2 => $d) {

                            $campo_300['tag'] = '300';
                            $campo_300['subfield_cd'] = $dato['subfield_cd'];
                            $campo_300['field_data'] = $d.' : ';
                            $listado_300[] = $campo_300;
                        }
                    } else {
                        if ($dato['subfield_cd'] == 'b' //subcampo NR
                                && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {
                            $campo_300['tag'] = '300';
                            $campo_300['subfield_cd'] = $dato['subfield_cd'];
                            $campo_300['field_data'] = $dato['field_data'].' ; ';
                            $listado_300 [] = $campo_300;
                        } else {
                            if ($dato['subfield_cd'] == 'c' //subcampo NR
                                    && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {
                                $campo_300['tag'] = '300';
                                $campo_300['subfield_cd'] = $dato['subfield_cd'];
                                $campo_300['field_data'] = $dato['field_data'].' + ';
                                $listado_300 [] = $campo_300;
                            }else{
                              if ($dato['subfield_cd'] == 'e' //subcampo NR
                                    && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {
                                $campo_300['tag'] = '300';
                                $campo_300['subfield_cd'] = $dato['subfield_cd'];
                                $campo_300['field_data'] = $dato['field_data'];
                                $listado_300 [] = $campo_300;
                            }  
                            }
                        }
                    }
                    /***para colocar la puntuacion deberia validar los subcampos que tiene cargado el arreglo de campo_300
                    con las convinaciones posibles
                    Ejemplos:
                     $axxviii, 175 p.
                     $a149 p. ; $c23 cm.
                     $a11 v. : $bil. ; $c24 cm.
                     $a396 p. ; $bil. ; $c30 cm. + $e1 cd-rom***/
                    if ($dato['subfield_cd'] == 'e' && !empty($listado_300)) {

                        subcampoR($xml, $marc_record, $listado_300);
                        unset($listado_300);
                    }
                    break;

                case 310:/** CAMPO NR y subcampo NR $a - PERIDIOCIDAD* */
                    if (!empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {
                        campoNR_subcampoNR($xml, $marc_record, $dato);
                    }

                    break;
                case 440:// Revisar - este campo esta obsoleto - en su lugar se debe usar 490 - 8xx
                    /** CAMPO 440 - MENCIÓN DE SERIE/PUNTO DE ACCESO ADICIONAL--TÍTULO   * */
                    if ($dato['subfield_cd'] == 'n' //subcampo repetible
                            && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {

                        $extensiones = explode('|', $dato['field_data']);
                        foreach ($extensiones as $campo2 => $d) {

                            $campo_440['tag'] = '440';
                            $campo_440['subfield_cd'] = $dato['subfield_cd'];
                            $campo_440['field_data'] = $d;
                            $listado_440[] = $campo_440;
                        }
                    } else {
                        if ($dato['subfield_cd'] == 'a' //subcampo NR
                                && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {
                            $campo_440['tag'] = '440';
                            $campo_440['subfield_cd'] = $dato['subfield_cd'];
                            $campo_440['field_data'] = $dato['field_data'];
                            $listado_440 [] = $campo_440;
                            /**prueba campo 490 $a***/
                            $campo_490['tag'] = '490';
                            $campo_490['subfield_cd'] = $dato['subfield_cd'];
                            $campo_490['field_data'] = $dato['field_data'];
                            $listado_490 [] = $campo_490;

                        } else {
                            if ($dato['subfield_cd'] == 'v' //subcampo NR
                                    && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {
                                $campo_440['tag'] = '440';
                                $campo_440['subfield_cd'] = $dato['subfield_cd'];
                                $campo_440['field_data'] = $dato['field_data'];
                                $listado_440 [] = $campo_440;
                                /**prueba campo 490 $a***/
                                $campo_490['tag'] = '490';
                                $campo_490['subfield_cd'] = $dato['subfield_cd'];
                                $campo_490['field_data'] = $dato['field_data'];
                                $listado_490 [] = $campo_490;

                            } else {
                                if ($dato['subfield_cd'] == 'p' //subcampo repetible
                                        && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {

                                    $extensiones = explode('|', $dato['field_data']);
                                    foreach ($extensiones as $campo2 => $p) {

                                        $campo_440['tag'] = '440';
                                        $campo_440['subfield_cd'] = $dato['subfield_cd'];
                                        $campo_440['field_data'] = $p;
                                        $listado_440[] = $campo_440;
                                    }
                                }
                            }
                        }
                    }
                    if ($dato['subfield_cd'] == 'v' && !empty($listado_440)) {

                        subcampoR($xml, $marc_record, $listado_440);
                        unset($listado_440);
                    }
                    if ($dato['subfield_cd'] == 'v' && !empty($listado_490)) {

                        subcampoR($xml, $marc_record, $listado_490);
                        unset($listado_490);
                    }
                    break;
                case 500://CAMPO NOTA GENERAL
                    $campo_500 = campo_500($datos_marc);

                    if (!empty($campo_500) && isset($campo_500)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_500);
                    }

                    break;

                 case 504:// NOTA DE BIBLIOGRAFÍA, ETC.
                    $campo_504 = campo_504($datos_marc);

                    if (!empty($campo_504) && isset($campo_504)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_504);
                    }

                    break;

                 case 505://  NOTA DE CONTENIDO CON FORMATO
                    $campo_505 = campo_505($datos_marc);

                    if (!empty($campo_505) && isset($campo_505)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_505);
                    }

                    break;

                case 520://RESUMEN - SUMARIO, ETC
                    $campo_520 = campo_520($datos_marc);

                    if (!empty($campo_520) && isset($campo_520)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_520);
                    }

                    break;
                case 650:
                    /** PUNTO DE ACCESO ADICIONAL DE MATERIA--TÉRMINO DE MATERIA**/
                    $campo_650 = campo_650($datos_marc);
                     if (!empty($campo_650) && isset($campo_650)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_650);
                    }
                    break;
                case 786://FUENTE DE ARTICULO - ENTRADA/ENLACE A UNA FUENTE DE INFORMACIÓN 
                    $campo_786 = campo_786($datos_marc);

                    if (!empty($campo_786) && isset($campo_786)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_786);
                    }

                    break;
                default:

                    break;
            }
        }
       
        /*         * **CAMPO 942 REGISTRO LOCAL DE KOHA**** */
        //$tipo_reg = 'CS';
        $marc_data_field = $xml->createElement('datafield');
        $marc_record->appendChild($marc_data_field);
        $marc_data_field->setAttribute('tag', '942');
        $marc_data_field->setAttribute('ind1', ' ');
        $marc_data_field->setAttribute('ind2', ' ');
        $marc_data_subfield = $xml->createElement('subfield', $tipo_reg);
        $marc_data_field->appendChild($marc_data_subfield);
        $marc_data_subfield->setAttribute('code', 'c');

        /*         * CREA REGISTRO DE ITEMS PARA KOHA* */
        foreach ($ejemplares_libro as $key => $value) {
            //var_dump($value);
            /*             * CAMPO 952 */
            $marc_data_field = $xml->createElement('datafield');
            $marc_record->appendChild($marc_data_field);
            $marc_data_field->setAttribute('tag', '952');
            $marc_data_field->setAttribute('ind1', ' ');
            $marc_data_field->setAttribute('ind2', ' ');

            switch ($value['copy_cod_loc']) {
                case 1: // RECTORADO
                    itemSubcampos($xml, $marc_data_field, 'BIB_RECT', $value, $tipo_reg);
                    break;
                case 2://UACO
                    itemSubcampos($xml, $marc_data_field, 'BIB_UACO', $value, $tipo_reg);
                    break;
                case 3://UART
                    itemSubcampos($xml, $marc_data_field, 'BIB_UART', $value, $tipo_reg);
                    break;
                case 4://UASJ
                    itemSubcampos($xml, $marc_data_field, 'BIB_UASJ', $value, $tipo_reg);
                    break;
                case 5://UARG
                    itemSubcampos($xml, $marc_data_field, 'BIB_UARG', $value, $tipo_reg);
                    break;

                case 10:// satelite pico truncado
                    itemSubcampos($xml, $marc_data_field, 'SAT_TRUN', $value, $tipo_reg);
                    break;
                case 11://satelite piedrabuena
                    itemSubcampos($xml, $marc_data_field, 'SAT_PBNA', $value, $tipo_reg);                  
                    break;
                case 12://satelite calafate Ya no esta vigente se asician ejemmplares a siunpa
                    itemSubcampos($xml, $marc_data_field, 'BIB_RECT', $value, $tipo_reg);
                    break;
                case 13://Biblioteca APEP UARG Ya no esta vigente se asician ejemmplares a siunpa
                    itemSubcampos($xml, $marc_data_field, 'BIB_RECT', $value, $tipo_reg);                   
                    break;
                case 14://Biblioteca Austral de Psicoanálisis UARG
                    itemSubcampos($xml, $marc_data_field, 'SAT_APSI', $value, $tipo_reg);
                    break;
                case 15://Biblioteca Satélite Puerto Madryn Ya no esta vigente se asician ejemmplares a siunpa
                    itemSubcampos($xml, $marc_data_field, 'BIB_RECT', $value, $tipo_reg);                   
                    break;
                case 16:// Centro de Información Puerto Deseado
                    itemSubcampos($xml, $marc_data_field, 'SAT_PDES', $value, $tipo_reg);                   
                    break;
                case 17://Biblioteca Satélite Río Grande Ya no esta vigente se asician ejemmplares a siunpa
                    itemSubcampos($xml, $marc_data_field, 'BIB_RECT', $value, $tipo_reg);                    
                    break;
                case 18://Biblioteca Satélite Gobernador Gregores
                    itemSubcampos($xml, $marc_data_field, 'SAT_GREG', $value, $tipo_reg);                   
                    break;
                case 19://Biblioteca Satélite Ushuaia Ya no esta vigente se asician ejemmplares a siunpa
                    itemSubcampos($xml, $marc_data_field, 'BIB_RECT', $value, $tipo_reg);                  
                    break;
                case 20://Biblioteca TeatrUNPA UARG Ya no esta vigente se asician ejemmplares a siunpa
                    itemSubcampos($xml, $marc_data_field, 'BIB_RECT', $value, $tipo_reg);                   
                    break;
                default:
                    break;
            }
        }
        
    }
    crearXML($xml, $nombre_xml, $directorio);
}



function leader($tamanio, $pos_base, $peli = false) {
    $cabecera = str_pad($tamanio, 5, "0", STR_PAD_LEFT);
    $cabecera .= "a"; //05 - c: reg corregido - a: aumento de codificación
    $cabecera .= $peli ? "g" : "a"; //06 - a: material textual - g:material gráfico proyectable
    $cabecera .= "m"; //07 - m: monográfico
    $cabecera .= " "; //08 - #: sin control especifico
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

function campo_control_008($fecha, $publicacion = "", $ilustración = "", $tipo_item = "", $idioma = "") {
    $campo008 = $fecha; //0a5 fecha de ingreso segun el patrón aammdd
    $campo008 .= "|"; //6 tipo de fecha |:sin fecha
    $campo008 .= "####"; // 7a10 fecha de inicio de publicacion NO APLICA
    $campo008 .= "####"; //11a14 fecha de fin  de publicacion NO APLICA
    /* REQUIERE TABLA DE CONVERSION ENTRE BIBUN Y */
    $campo008 .= str_pad($publicacion, 3, "#"); //15a17 lugar de publicacion segun USMARC Code List for Countries
    $campo008 .= str_pad($ilustración, 4, "|"); //18a21 ilustraciones
    $campo008 .= "|"; //22 publico al que esta destinada
    $campo008 .= "|"; //23 forma del item
    $campo008 .= str_pad($tipo_item, 4, "|"); //24a27 naturaleza del contenido b: bibliografia, m:tesis ' ':naturaleza no especificada
    $campo008 .= "|"; //28 publicación gubernamental #:no es
    $campo008 .= "|"; //29 publicacion de una conferencia |:no codificada
    $campo008 .= "|"; //30 homenaje |:no codificada
    $campo008 .= "|"; //31 indice |:no codificada
    $campo008 .= "|"; //32 posición no definida |:no codificada
    $campo008 .= "|"; //33 forma literaria
    $campo008 .= "|"; //34 biografia #:no contiene |:no se intenta codificar
    $campo008 .= str_pad($idioma, 3, " "); //35a37 idioma REQUIERE TABLA DE CONVERSION
    $campo008 .= "|"; //38 registro modificado |:no codificada
    $campo008 .= "d"; //39 fuente de catalogacion |:no codificada

    return $campo008;
}

/* * CAMPO 020 ISBN* */

function campo_020($consulta) {

    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 20 && !empty($key['field_data']) && $key['field_data'] != ' ') {

            $isbns = explode('|', $key['field_data']);
            foreach ($isbns as $campo2 => $dato) {

                $isbn = str_replace('-', '', $dato, $contador);
                $campo_020['tag'] = '020';
                $campo_020['subfield_cd'] = $key['subfield_cd'];
                $campo_020['field_data'] = $isbn;
                $listado_isbn [] = $campo_020;
            }
        }
    }

    return $listado_isbn;
}

/* * CAMPO 022 ISBN* */

function campo_022($consulta) {

    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 22 && !empty($key['field_data']) && $key['field_data'] != ' ') {

            $issns = explode('|', $key['field_data']);
            foreach ($issns as $campo2 => $dato) {

                $issn = str_replace('-', '', $dato, $contador);
                $campo_022['tag'] = '022';
                $campo_022['subfield_cd'] = $key['subfield_cd'];
                $campo_022['field_data'] = $issn;
                $listado_issn [] = $campo_022;
            }
        }
    }

    return $listado_issn;
}

/* * CAMPO 040 Fuente de Catalogación NR y subcampos NR* */

function campo_040($consulta) {

    $campo_040['tag'] = '040';
    $campo_040['subfield_cd'] = $consulta['subfield_cd'];
    $campo_040['field_data'] = $consulta['field_data'];
    return $campo_040;
}

/* * CAMPO 041 Lengua* */

function campo_041($consulta) {

    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 41 && !empty($key['field_data']) && $key['field_data'] != ' ') {

            $cod_idioma = explode('|', $key['field_data']);
            foreach ($cod_idioma as $campo2 => $dato) {
                $campo_041 ['tag'] = '041';
                $campo_041 ['subfield_cd'] = $key['subfield_cd'];
                if (!empty(gestorRegistroBiblio::consultarIdiomaMarc($dato)[0]['marc'])) {
                    $campo_041 ['field_data'] = gestorRegistroBiblio::consultarIdiomaMarc($dato)[0]['marc'];
                } else {
                    $campo_041 ['field_data'] = $dato;
                }
                $listado_lengua [] = $campo_041;
            }
        }
    }
    return $listado_lengua;
}

/* * CAMPO 0041 PAIS/ENTIDAD* */

function campo_044($consulta) {


    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 44 && !empty($key['field_data']) && $key['field_data'] != ' ') {

            $paises = explode('|', $key['field_data']);

            foreach ($paises as $campo2 => $dato) {

                $sacar_guion = str_replace('-', '', $dato, $contador);
                $sacar_corchete = str_replace('[', '', $sacar_guion, $contador);
                $sacar_corchete2 = str_replace(']', '', $sacar_corchete, $contador);
                $campo_044 ['tag'] = '044';
                $campo_044 ['subfield_cd'] = $key['subfield_cd'];
                $campo_044 ['field_data'] = $dato;
                $listado_paises [] = $campo_044;
            }
        }
    }
    return $listado_paises;
}

/* * CAMPO 080 SIGNATURA - CDU* */

function campo_080($consulta) {

    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 80 && !empty($key['field_data']) && $key['field_data'] != ' ') {
            $signaturas = explode('|', $key['field_data']);
            foreach ($signaturas as $s) {
                if (!empty($s)) {
                    $campo_080['tag'] = '080';
                    $campo_080['subfield_cd'] = $key['subfield_cd'];
                    $campo_080['field_data'] = $s;
                    $listado_80 [] = $campo_080;
                }
            }
        }
    }
    return $listado_80;
}

/* * CAMPO 100 Entrada Principal de autor y 700 Entrada Secundaria de autores* */
//en la base de datos de openbiblio solo se cuenta con el campo $a 
function campo_100($consulta) {

    foreach ($consulta as $campo => $key) {

        if ($key['tag'] == 100 && !empty($key['field_data']) && $key['field_data'] != ' ') {

            $autores = explode('|', $key['field_data']);

            $i = 0;

            foreach ($autores as $campo => $dato) {
                if ($i === 0) {
                    $campo_100['tag'] = '100';
                    $campo_100['subfield_cd'] = $key['subfield_cd'];
                    $campo_100['field_data'] = $dato.'.';
                    $registro_autores [] = $campo_100;
                    $i = $i + 1;
                } else {
                    $campo_700['tag'] = '700';
                    $campo_700['subfield_cd'] = $key['subfield_cd'];
                    $campo_700['field_data'] = $dato.'.';
                    $registro_autores [] = $campo_700;
                }
                //$listado_autores[] = $dato;
            }
        }
    }

    return $registro_autores;
}

/* * CAMPO 110 Entrada Principal de autor corporativo y 710 Entrada Secundaria de autores corporativos* */

function campo_110($consulta) {

    foreach ($consulta as $campo => $key) {

        if ($key['tag'] == 110 && !empty($key['field_data']) && $key['field_data'] != ' ') {

            $autores = explode('|', $key['field_data']);
            $i = 0;
            foreach ($autores as $campo2 => $dato) {

                if ($i === 0) {
                    $campo_110['tag'] = '110';
                    $campo_110['subfield_cd'] = $key['subfield_cd'];
                    $campo_110['field_data'] = $dato.'.';
                    $registro_autores [] = $campo_110;
                    $i = $i + 1;
                } else {
                    $campo_710['tag'] = '710';
                    $campo_710['subfield_cd'] = $key['subfield_cd'];
                    $campo_710['field_data'] = $dato.'.';
                    $registro_autores [] = $campo_710;
                }
            }
        }
    }

    return $registro_autores;
}

function campo_240($consulta) {

    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 240 && !empty($key['field_data']) && $key['field_data'] != ' ') {

            $t_uniforme = explode('|', $key['field_data']);

            $index = 0;
            foreach ($t_uniforme as $campo => $dato) {

                if ($index === 0) {

                    $campo_240['tag'] = '240';
                    $campo_240['subfield_cd'] = $key['subfield_cd'];
                    $campo_240['field_data'] = $dato;
                    $registro_titulos_uniforme [] = $campo_240;
                    $index = $index + 1;
                } else {
                    $campo_730['tag'] = '730';
                    $campo_730['subfield_cd'] = $key['subfield_cd'];
                    $campo_730['field_data'] = $dato;
                    $registro_titulos_uniforme [] = $campo_730;
                }
            }
        }
    }

    return $registro_titulos_uniforme;
}

function campo_246($consulta) {

    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 246 && !empty($key['field_data']) && $key['field_data'] != ' ') {

            $titulos = explode('|', $key['field_data']);
            foreach ($titulos as $campo2 => $dato) {

                //$titulo = str_replace('-', '', $dato, $contador);
                $campo_246['tag'] = '246';
                $campo_246['subfield_cd'] = $key['subfield_cd'];
                $campo_246['field_data'] = $dato.'.';
                $listado_titulos [] = $campo_246;
            }
        }
    }

    return $listado_titulos;
}

function campo_247($consulta) {

    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 247 && !empty($key['field_data']) && $key['field_data'] != ' ') {

            $titulos = explode('|', $key['field_data']);
            foreach ($titulos as $campo2 => $dato) {

                //$titulo = str_replace('-', '', $dato, $contador);
                $campo_247['tag'] = '247';
                $campo_247['subfield_cd'] = $key['subfield_cd'];
                $campo_247['field_data'] = $dato.'.';
                $listado_titulos [] = $campo_247;
            }
        }
    }
    return $listado_titulos;
}

/* * CAMPO 250 MENCIÓN DE EDICION* */

function campo_250($consulta) {


    foreach ($consulta as $campo => $key) {

        if ($key['tag'] == 250 && !empty($key['field_data']) && $key['field_data'] != ' ') {
            //var_dump($key['tag']);
            if ($key['subfield_cd'] == 'a') {
                $campo_250['tag'] = '250';
                $campo_250 ['subfield_cd'] = 'a'; //$a - Mención de edición (NR) 
                $campo_250 ['field_data'] = $key['field_data'];
            } else {
                if ($key['subfield_cd'] == 'b') {
                    $campo_250['tag'] = '250';
                    $campo_250 ['subfield_cd'] = 'b'; //$b - Resto de la mención de edición (NR)
                    $campo_250 ['field_data'] = $key['field_data'];
                }
            }

            $listado_edicion [] = $campo_250;
            /*             * $edicion = explode('|', $key['field_data']);
              $i = 0;
              foreach ($edicion as $campo2 => $dato)
              {

              if ($i === 0 && $key['subfield_cd'] == 'a')
              {

              $campo_250['tag'] = '250';
              $campo_250 ['subfield_cd'] = 'a';
              $campo_250 ['field_data'] = $dato;
              $listado_edicion [] = $campo_250;
              $i++;
              }
              else
              {
              $campo_250['tag'] = '250';
              $campo_250 ['subfield_cd'] = 'b';
              $campo_250 ['field_data'] = $dato;
              $listado_edicion [] = $campo_250;
              }
              }* */
        }
    }
    return $listado_edicion;
}

function campo_255($consulta) {

    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 255 && !empty($key['field_data']) && $key['field_data'] != ' ') {

            $titulos = explode('|', $key['field_data']);
            foreach ($titulos as $campo2 => $dato) {

                //$titulo = str_replace('-', '', $dato, $contador);
                $campo_255['tag'] = '255';
                $campo_255['subfield_cd'] = $key['subfield_cd'];
                $campo_255['field_data'] = $dato.'.';
                $listado_titulos [] = $campo_255;
            }
        }
    }
    return $listado_titulos;
}

/* * *CAMPO NOTA GENERAL R NO*** */

function campo_500($consulta) {

    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 500 && !empty($key['field_data']) && $key['field_data'] != ' ') {

            $notas = explode('|', $key['field_data']);
            foreach ($notas as $campo2 => $dato) {

                $campo_500['tag'] = '500';
                $campo_500['subfield_cd'] = $key['subfield_cd'];
                $campo_500['field_data'] = $dato;
                $listado_500 [] = $campo_500;
            }
        }
    }

    return $listado_500;
}

function campo_504($consulta) {

    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 504 && !empty($key['field_data']) && $key['field_data'] != ' ') {

            $notas = explode('|', $key['field_data']);
            foreach ($notas as $campo2 => $dato) {

                $campo_504['tag'] = '504';
                $campo_504['subfield_cd'] = $key['subfield_cd'];
                $campo_504['field_data'] = $dato;
                $listado_504 [] = $campo_504;
            }
        }
    }

    return $listado_504;
}
function campo_505($consulta) {

    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 505 && !empty($key['field_data']) && $key['field_data'] != ' ') {

            $notas = explode('|', $key['field_data']);
            foreach ($notas as $campo2 => $dato) {

                $campo_505['tag'] = '505';
                $campo_505['subfield_cd'] = $key['subfield_cd'];
                $campo_505['field_data'] = $dato;
                $listado_505 [] = $campo_505;
            }
        }
    }

    return $listado_505;
}
/* * *CAMPO SUMARIO - RESUMEN - ETC GENERAL R NO*** */

function campo_520($consulta) {

    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 520 && !empty($key['field_data']) && $key['field_data'] != ' ') {

            $notas = explode('|', $key['field_data']);
            foreach ($notas as $campo2 => $dato) {

                $campo_520['tag'] = '500';
                $campo_520['subfield_cd'] = $key['subfield_cd'];
                $campo_520['field_data'] = $dato;
                $listado_520 [] = $campo_520;
            }
        }
    }

    return $listado_520;
}
/* * *CAMPO Materias generado desde tabla biblio*** */

function campo_650($consulta) {

    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 650 && !empty($key['field_data']) && $key['field_data'] != ' ') {

            $notas = explode('|', $key['field_data']);
            foreach ($notas as $campo2 => $dato) {

                $campo_650['tag'] = '650';
                $campo_650['subfield_cd'] = $key['subfield_cd'];
                $campo_650['field_data'] = $dato;
                $listado_650 [] = $campo_650;
            }
        }
    }

    return $listado_650;
}
/* * *CAMPO FUENTE DE ARTICULO R NO*** */

function campo_786($consulta) {

    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 786 && !empty($key['field_data']) && $key['field_data'] != ' ') {

            $fuentes = explode('|', $key['field_data']);
            foreach ($notas as $campo2 => $dato) {

                $campo_786['tag'] = '786';
                $campo_786['subfield_cd'] = $key['subfield_cd'];
                $campo_786['field_data'] = $dato;
                $listado_786 [] = $campo_786;
            }
        }
    }

    return $listado_786;
}

function campo_942($xml, $marc_record, $tipo_material) {

    $marc_data_field = $xml->createElement('datafield');
    $marc_record->appendChild($marc_data_field);
    $marc_data_field->setAttribute('tag', '942');
    $marc_data_field->setAttribute('ind1', ' ');
    $marc_data_field->setAttribute('ind2', ' ');
    $marc_data_subfield = $xml->createElement('subfield', $tipo_material);
    $marc_data_field->appendChild($marc_data_subfield);
    $marc_data_subfield->setAttribute('code', 'c');
}

function campoR_subcampoNR($xml, $marc_record, $consulta) {
    //IMPORTANTE MUY MUCHO OJITO
    //SI EL CAMPO ES REPETIBLE SE MANTIENE ASI, PEEEEERO SI EL CAMPO NO ES REPETIBLE HAY QUE VER EL SUB 
    //CAMPO, SI EL SUB CAMPO ES REPETIBLE REQUIERE UNA ITERACCION EXTRA EN *1
    foreach ($consulta as $campo) {

        //Agrega al XML los datos del Campo
        $marc_data_field = $xml->createElement('datafield');
        $marc_record->appendChild($marc_data_field);
        $marc_data_field->setAttribute('tag', $campo['tag']);
        $marc_data_field->setAttribute('ind1', ' ');
        $marc_data_field->setAttribute('ind2', ' ');

        //Agrega al XML los datos de los subcampos
        $marc_data_subfield = $xml->createElement('subfield', $campo['field_data']);
        $marc_data_field->appendChild($marc_data_subfield);
        $marc_data_subfield->setAttribute('code', $campo['subfield_cd']);
    }
}

function campoNR_subcampoNR($xml, $marc_record, $campo) {
    //Agrega al XML los datos del Campo
    $marc_data_field = $xml->createElement('datafield');
    $marc_record->appendChild($marc_data_field);
    $marc_data_field->setAttribute('tag', $campo['tag']);
    $marc_data_field->setAttribute('ind1', ' ');
    $marc_data_field->setAttribute('ind2', ' ');

    //Agrega al XML los datos de los subcampos
    $marc_data_subfield = $xml->createElement('subfield', $campo['field_data']);
    $marc_data_field->appendChild($marc_data_subfield);
    $marc_data_subfield->setAttribute('code', $campo['subfield_cd']);
}

function subcampoR($xml, $marc_record, $campo) {

    //Agrega al XML los datos del Campo
    $marc_data_field = $xml->createElement('datafield');
    $marc_record->appendChild($marc_data_field);
    $marc_data_field->setAttribute('tag', $campo[0]['tag']);
    $marc_data_field->setAttribute('ind1', ' ');
    $marc_data_field->setAttribute('ind2', ' ');


    foreach ($campo as $subcampo) {

        //Agrega al XML los datos de los subcampos
        $marc_data_subfield = $xml->createElement('subfield', $subcampo['field_data']);
        $marc_data_subfield->setAttribute('code', $subcampo['subfield_cd']);
        $marc_data_field->appendChild($marc_data_subfield);
    }
}

function itemSubcampos($xml, $marc_data_field, $uuaa, $value, $tipo_material) {
    $marc_data_subfield = $xml->createElement('subfield', 'BIB_RECT');//este 
    $marc_data_field->appendChild($marc_data_subfield);
    $marc_data_subfield->setAttribute('code', 'a'); //localizacion permanente

    $marc_data_subfield = $xml->createElement('subfield', $uuaa);
    $marc_data_field->appendChild($marc_data_subfield);
    $marc_data_subfield->setAttribute('code', 'b'); //localizacion actual

    $marc_data_subfield = $xml->createElement('subfield', $value['copy_date_sptu']);
    $marc_data_field->appendChild($marc_data_subfield);
    $marc_data_subfield->setAttribute('code', 'd');//Fecha de adquisición

    $marc_data_subfield = $xml->createElement('subfield', $tipo_material);
    $marc_data_field->appendChild($marc_data_subfield);
    $marc_data_subfield->setAttribute('code', 'y'); //tipo de item koha

    $marc_data_subfield = $xml->createElement('subfield', $value['barcode_nmbr']);
    $marc_data_field->appendChild($marc_data_subfield);
    $marc_data_subfield->setAttribute('code', 'p');//Codigo de barras

    $marc_data_subfield = $xml->createElement('subfield', $value['barcode_nmbr']);
    $marc_data_field->appendChild($marc_data_subfield);
    $marc_data_subfield->setAttribute('code', 'i');//numero de inventario

    $marc_data_subfield = $xml->createElement('subfield', $value['copy_precio']);
    $marc_data_field->appendChild($marc_data_subfield);
    $marc_data_subfield->setAttribute('code', 'g');//Coste, precio normal de compra

    $marc_data_subfield = $xml->createElement('subfield', $value['signatura_top']);
    $marc_data_field->appendChild($marc_data_subfield);
    $marc_data_subfield->setAttribute('code', 'o');//o - Signatura topográfica completa

    $marc_data_subfield = $xml->createElement('subfield', $value['copy_proveedor']);
    $marc_data_field->appendChild($marc_data_subfield);
    $marc_data_subfield->setAttribute('code', 'e');//e - Fuente de adquisición
    //var_dump($value['signatura_top']);
    switch ($value['collection_cd']) {
        case 1:
            $cc='CR';
            # code...
            break;
        case 3:
            $cc='CG';
            break;
        case 7:
            $cc='MM';
            break;

        case 10:
            $cc='PP';
            break;
        default:
            # code...
            break;
    }
    
    $marc_data_subfield = $xml->createElement('subfield', $cc);
    $marc_data_field->appendChild($marc_data_subfield);
    $marc_data_subfield->setAttribute('code', '8');//Codigo de coleccion

}

function idioma($consulta) {


    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 41) {

            $cod_idioma = explode('|', $key['field_data']);
            foreach ($cod_idioma as $campo => $dato) {
                $idioma_marc[] = gestorRegistroBiblio::consultarIdiomaMarc($dato)[0]['marc'];
            }
        }else{
            $idioma_marc=NULL;
        }
    }
    return $idioma_marc;
}

function crearXML($xml, $nombre, $directorio) {

    $xml->formatOutput = true;
    $el_xml = $xml->saveXML();
    $xml->save($directorio.'/'.$nombre.'.xml');


    //Mostramos el XML puro
    echo "<p><b>El XML: ".$nombre." ha sido creado.... </b></p>";
    //htmlentities($el_xml) . "<br/><hr>";
}
/****function registro_MarcXml_libros($libros, $nombre_xml) {

    //DOCUMENTO XML
    $xml = new DomDocument('1.0', 'UTF-8');
    $marc_colection = $xml->createElement('collection');
    $xml->appendChild($marc_colection);
    $marc_colection->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
    $marc_colection->setAttribute('xsi:schemaLocation', 'http://www.loc.gov/MARC21/slim http://www.loc.gov/standards/marcxml/schema/MARC21slim.xsd');
    $marc_colection->setAttribute('xmlns', 'http://www.loc.gov/MARC21/slim');
    $libros_listado_10 = $libros;
    
    foreach ($libros_listado_10 as $libro_dato) {
        
        $datos_libro      = $libro_dato;
        $datos_marc       = gestorRegistroBiblio::datosMarcLibro($datos_libro['bibid']);
        $ejemplares_libro = gestorRegistroBiblio::ejemplaresLibro($datos_libro['bibid']);
        $analitica_libro  = gestorRegistroBiblio::datosAnalitica($datos_libro['bibid']);

        $marc_record = $xml->createElement('record');
        $marc_colection->appendChild($marc_record);

        //crea el leader con la cabecera del registro
        $tamanio = 1000; //generar por sistema debe calcularse a partir de los datos generados por el sistema
        $pos_base = 260; //generar por sistema debe calcularse a partir del ultimo leader
        $cabecera = leader($tamanio, $pos_base); // Llama al metodo que gener el leader
        //Agrega cabecera al archivo XML
        $marc_leader = $xml->createElement('leader', $cabecera);
        $marc_record->appendChild($marc_leader);

        //Agrega campo 001 al XML - nro de control se compone de identificador de nro control + id 
        $campo_001 = 'YPZ' . $datos_libro['bibid']; // Código CAICYT Biblioteca UARG + id bibliografico Open
        //identificador del nuemro de control
        $campo_003 = 'YPZ'; // Código CAICYT Biblioteca UARG
        //Agrega campo 001 al archivo XML
        $marc_ctrl_field = $xml->createElement('controlfield', $campo_001);
        $marc_record->appendChild($marc_ctrl_field);
        $marc_ctrl_field->setAttribute('tag', '001');

        //Agrega campo 003 al archivo XML
        $marc_ctrl_field = $xml->createElement('controlfield', $campo_003);
        $marc_record->appendChild($marc_ctrl_field);
        $marc_ctrl_field->setAttribute('tag', '003');

        //Genera la fecha del campo 005  a partir de la creacion del registro en el sistema anterior
        $date = new DateTime($datos_libro['create_dt']);
        $campo_005 = $date->format('YmdHis');

        //Agrega campo 005 al archivo XML
        $marc_ctrl_field = $xml->createElement('controlfield', $campo_005 . '0');
        $marc_record->appendChild($marc_ctrl_field);
        $marc_ctrl_field->setAttribute('tag', '005');

        //Genera campo 008
        $idioma = idioma($datos_marc)[0];
        if (empty($idioma) || isset($idioma)) {
            $idioma = 'spa';
        }
        $campo_008 = campo_control_008(substr($date->format('Ymd'), -6), "", "", "b", $idioma);

        //Agrega campo 008 al archivo XML
        $marc_ctrl_field = $xml->createElement('controlfield', $campo_008);
        $marc_record->appendChild($marc_ctrl_field);
        $marc_ctrl_field->setAttribute('tag', '008');

        //CARGA DEL LOS DATOS BIBLIOGRAFICOS

        // Agrega al archivo XML los campos existentes
        foreach ($datos_marc as $campo => $dato) {

            switch ($dato['tag']) {

                case 20: // ISBN no obligatorio
                    $campo_020 = campo_020($datos_marc);
                    if (!empty($campo_020) && isset($campo_020)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_020);
                    }
                    break;

                case 22: // ISSN no obligatorio
                    $campo_022 = campo_022($datos_marc);
                    if (!empty($campo_022) && isset($campo_022)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_022);
                    }
                    break;

                case 40: //fuente de la catalogacion - obligatorio OBLIGATORIO 
                    //- se completo en tabla biblio_field_copi con SIUNPA
                    $campo_040 = campo_040($dato);
                    campoNR_subcampoNR($xml, $marc_record, $campo_040);
                    break;

                case 41: //Codigo de Lengua - No Obligatorio
                    $campo_041 = campo_041($datos_marc);
                    if (!empty($campo_041) && isset($campo_041)) {
                        subcampoR($xml, $marc_record, $campo_041);
                    }
                    break;

                case 44: //Codigo de pais - no obligatorio
                    $campo_044 = campo_044($datos_marc);
                    if (!empty($campo_044) && isset($campo_044)) {
                        subcampoR($xml, $marc_record, $campo_044);
                    }
                    break;

                case 80://campo de signatura - no obligatorio Este campo pertenece a la clasificacion decimal universal
                    $campo_080 = campo_080($datos_marc);
                    if (!empty($campo_080) && isset($campo_080)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_080);
                    }
                    break;
                case 100://ENTRADA PRINCIPAL--NOMBRE DE PERSONA - Autor - campo no obligatorio
                    $campo_100 = campo_100($datos_marc); //Si tiene mas de un autor completa con el campo 700
                    if (!empty($campo_100) && isset($campo_100)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_100);
                    }
                    break;

                case 110://- ENTRADA PRINCIPAL--NOMBRE DE ENTIDAD CORPORATIVA  - campo no obligatorio
                    $campo_110 = campo_110($datos_marc); //Si tiene mas de un autor completa con el campo 710
                    if (!empty($campo_110) && isset($campo_110)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_110);
                    }
                    break;
                case 240: //Titulo Uniforme - Campo no obligatorio - 
                    $campo_240 = campo_240($datos_marc); //Si tiene mas de un titulo uniforme completa con el campo 730

                    if (!empty($campo_240) && isset($campo_240)) {
                        //crea los campos xml del registro en el campo 240 y 730 de ser necesario
                        campoR_subcampoNR($xml, $marc_record, $campo_240);
                    }
                    break;
                case 245: //Mension de Titulo - este campo es obligatorio si no esta se debe crear vacio

                    if ($dato['subfield_cd'] == 'a' && !empty($dato['field_data'])) {
                        //subcampo $a titulo
                        $campo_245['tag'] = '245';
                        $campo_245['subfield_cd'] = $dato['subfield_cd'];
                        $campo_245['field_data'] = $dato['field_data'];
                        $list [] = $campo_245;
                    } else {
                        if ($dato['subfield_cd'] == 'a' && empty($dato['field_data'])) {
                            //subcampo $a cuando esta vacio se pone informacion para completar
                            $campo_245['tag'] = '245';
                            $campo_245['subfield_cd'] = $dato['subfield_cd'];
                            $campo_245['field_data'] = 'completar titulo obligatorio.';
                            $list [] = $campo_245;
                        } else {
                            if ($dato['subfield_cd'] == 'b' && !empty($dato['field_data'])) {
                                //subcampo $b  resto del titulo o subtitulo
                                $campo_245['tag'] = '245';
                                $campo_245['subfield_cd'] = $dato['subfield_cd'];
                                $campo_245['field_data'] = ' : '.$dato['field_data'];
                                $list [] = $campo_245;
                            } else {
                                if ($dato['subfield_cd'] == 'c' && !empty($dato['field_data'])) {
                                    //subcampo $c mencion de responsabilidad
                                    $resultado = str_replace("|", " ; ", $dato['field_data']);

                                    $campo_245['tag'] = '245';
                                    $campo_245['subfield_cd'] = $dato['subfield_cd'];
                                    $campo_245['field_data'] = ' / '.$resultado;
                                    $list [] = $campo_245;
                                }
                            }
                        }
                    }
                    if ($dato['subfield_cd'] == 'c' && !empty($list)) {

                        subcampoR($xml, $marc_record, $list);
                        unset($list);
                    }
                    break;
                case 246://variante del titulo - campo repetible no obligatorio
                    $campo_246 = campo_246($datos_marc);

                    if (!empty($campo_246) && isset($campo_246)) {

                        campoR_subcampoNR($xml, $marc_record, $campo_246);
                    }

                    break;
                case 247://titulo anterior - campo repetibe no obligatorio
                    $campo_247 = campo_247($datos_marc);
                    if (!empty($campo_247) && isset($campo_247)) {

                        campoR_subcampoNR($xml, $marc_record, $campo_247);
                    }
                    break;
                case 250://250 – MENCION DE EDICION (NR) 

                    $campo_250 = campo_250($datos_marc);
                    if (!empty($campo_250) && isset($campo_250)) {

                        subcampoR($xml, $marc_record, $campo_250);
                    }
                    break;

                case 260:
                    //CAMPO 260  PUBLICACIÓN, DISTRIBUCIÓN, ETC. campo y subcampo repetibles no obligatorio

                    if ($dato['subfield_cd'] == 'a' && !empty($dato['field_data']) 
                        && isset($dato['field_data']) && $dato['field_data'] != ' ') {

                        $lugares = explode('|', $dato['field_data']);
                        foreach ($lugares as $campo2 => $d) {

                            $campo_260['tag'] = '260';
                            $campo_260['subfield_cd'] = $dato['subfield_cd'];
                            $campo_260['field_data'] = $d;
                            $listado_260 [] = $campo_260;
                        }
                    } else {
                        if ($dato['subfield_cd'] == 'b' && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {

                            $editores = explode('|', $dato['field_data']);
                            foreach ($editores as $campo3 => $d) {

                                $campo_260['tag'] = '260';
                                $campo_260['subfield_cd'] = $dato['subfield_cd'];
                                $campo_260['field_data'] = ' : '.$d;
                                $listado_260 [] = $campo_260;
                            }
                        } else {
                            if ($dato['subfield_cd'] == 'c' && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {

                                $fechas = explode('|', $dato['field_data']);
                                foreach ($fechas as $campo3 => $d) {

                                    $campo_260['tag'] = '260';
                                    $campo_260['subfield_cd'] = $dato['subfield_cd'];
                                    $campo_260['field_data'] = ' , '.$d;
                                    $listado_260 [] = $campo_260;
                                }
                            }
                        }
                    }
                    //Para colocar la puntuacion correcta deberia validar los subcampos que tienen datos: 
                    //Ejemplos.: 
                    //$aLondon : $bMacmillan, $c1995.
                    
                    if ($dato['subfield_cd'] == 'c' && !empty($listado_260)) {
                        //var_dump($listado_260);
                        subcampoR($xml, $marc_record, $listado_260);
                        unset($listado_260);
                    }
                    break;
                case 300:
                    //CAMPO 300 - DESCRIPCIÓN FÍSICA CAMPO REPETIBLE no OBLIGATORIO
                    if ($dato['subfield_cd'] == 'a' //subcampo repetible
                            && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {

                        $extensiones = explode('|', $dato['field_data']);
                        foreach ($extensiones as $campo2 => $d) {

                            $campo_300['tag'] = '300';
                            $campo_300['subfield_cd'] = $dato['subfield_cd'];
                            $campo_300['field_data'] = $d.' : ';
                            $listado_300[] = $campo_300;
                        }
                    } else {
                        if ($dato['subfield_cd'] == 'b' //subcampo NR
                                && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {
                            $campo_300['tag'] = '300';
                            $campo_300['subfield_cd'] = $dato['subfield_cd'];
                            $campo_300['field_data'] = $dato['field_data'].' ; ';
                            $listado_300 [] = $campo_300;
                        } else {
                            if ($dato['subfield_cd'] == 'c' //subcampo NR
                                    && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {
                                $campo_300['tag'] = '300';
                                $campo_300['subfield_cd'] = $dato['subfield_cd'];
                                $campo_300['field_data'] = $dato['field_data'].' + ';
                                $listado_300 [] = $campo_300;
                            }else{
                              if ($dato['subfield_cd'] == 'e' //subcampo NR
                                    && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {
                                $campo_300['tag'] = '300';
                                $campo_300['subfield_cd'] = $dato['subfield_cd'];
                                $campo_300['field_data'] = $dato['field_data'];
                                $listado_300 [] = $campo_300;
                            }  
                            }
                        }
                    }
                    //para colocar la puntuacion deberia validar los subcampos que tiene cargado el arreglo de campo_300
                    //con las convinaciones posibles
                    //Ejemplos:
                    //$axxviii, 175 p.
                    //$a149 p. ; $c23 cm.
                    //$a11 v. : $bil. ; $c24 cm.
                    //$a396 p. ; $bil. ; $c30 cm. + $e1 cd-rom
                    
                    if ($dato['subfield_cd'] == 'e' && !empty($listado_300)) {

                        subcampoR($xml, $marc_record, $listado_300);
                        unset($listado_300);
                    }
                    break;

                case 310://CAMPO NR y subcampo NR $a - PERIDIOCIDAD
                    if (!empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {
                        campoNR_subcampoNR($xml, $marc_record, $dato);
                    }

                    break;
                case 440:// Revisar - este campo esta obsoleto - en su lugar se debe usar 490 - 8xx
                    //CAMPO 440 - MENCIÓN DE SERIE/PUNTO DE ACCESO ADICIONAL--TÍTULO
                    if ($dato['subfield_cd'] == 'n' //subcampo repetible
                            && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {

                        $extensiones = explode('|', $dato['field_data']);
                        foreach ($extensiones as $campo2 => $d) {

                            $campo_440['tag'] = '440';
                            $campo_440['subfield_cd'] = $dato['subfield_cd'];
                            $campo_440['field_data'] = $d;
                            $listado_440[] = $campo_440;
                        }
                    } else {
                        if ($dato['subfield_cd'] == 'a' //subcampo NR
                                && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {
                            $campo_440['tag'] = '440';
                            $campo_440['subfield_cd'] = $dato['subfield_cd'];
                            $campo_440['field_data'] = $dato['field_data'];
                            $listado_440 [] = $campo_440;
                            //prueba campo 490 $a
                            $campo_490['tag'] = '490';
                            $campo_490['subfield_cd'] = $dato['subfield_cd'];
                            $campo_490['field_data'] = $dato['field_data'];
                            $listado_490 [] = $campo_490;

                        } else {
                            if ($dato['subfield_cd'] == 'v' //subcampo NR
                                    && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {
                                $campo_440['tag'] = '440';
                                $campo_440['subfield_cd'] = $dato['subfield_cd'];
                                $campo_440['field_data'] = $dato['field_data'];
                                $listado_440 [] = $campo_440;
                                //prueba campo 490 $a
                                $campo_490['tag'] = '490';
                                $campo_490['subfield_cd'] = $dato['subfield_cd'];
                                $campo_490['field_data'] = $dato['field_data'];
                                $listado_490 [] = $campo_490;

                            } else {
                                if ($dato['subfield_cd'] == 'p' //subcampo repetible
                                        && !empty($dato['field_data']) && isset($dato['field_data']) && $dato['field_data'] != ' ') {

                                    $extensiones = explode('|', $dato['field_data']);
                                    foreach ($extensiones as $campo2 => $p) {

                                        $campo_440['tag'] = '440';
                                        $campo_440['subfield_cd'] = $dato['subfield_cd'];
                                        $campo_440['field_data'] = $p;
                                        $listado_440[] = $campo_440;
                                    }
                                }
                            }
                        }
                    }
                    if ($dato['subfield_cd'] == 'v' && !empty($listado_440)) {

                        subcampoR($xml, $marc_record, $listado_440);
                        unset($listado_440);
                    }
                    if ($dato['subfield_cd'] == 'v' && !empty($listado_490)) {

                        subcampoR($xml, $marc_record, $listado_490);
                        unset($listado_490);
                    }
                    break;
                case 500://CAMPO NOTA GENERAL
                    $campo_500 = campo_500($datos_marc);

                    if (!empty($campo_500) && isset($campo_500)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_500);
                    }

                    break;

                case 520://RESUMEN - SUMARIO, ETC
                    $campo_520 = campo_520($datos_marc);

                    if (!empty($campo_520) && isset($campo_520)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_520);
                    }

                    break;
                case 650:
                    //PUNTO DE ACCESO ADICIONAL DE MATERIA--TÉRMINO DE MATERIA
                    $campo_650 = campo_650($datos_marc);
                     if (!empty($campo_650) && isset($campo_650)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_650);
                    }
                    break;
                case 786://FUENTE DE ARTICULO - ENTRADA/ENLACE A UNA FUENTE DE INFORMACIÓN 
                    $campo_786 = campo_786($datos_marc);

                    if (!empty($campo_786) && isset($campo_786)) {
                        campoR_subcampoNR($xml, $marc_record, $campo_786);
                    }

                    break;
                default:

                    break;
            }
        }
        //ANALITICAS EN UN CAMPO DE NOTA 505
        foreach ($analitica_libro as $key => $value){
            
            //CAMPO 505  NOTA DE CONTENIDO CON FORMATO
            $marc_data_field = $xml->createElement('datafield');
            $marc_record->appendChild($marc_data_field);
            $marc_data_field->setAttribute('tag', '505');
            $marc_data_field->setAttribute('ind1', '0');
            $marc_data_field->setAttribute('ind2', '0');
            
            $marc_data_subfield = $xml->createElement('subfield', $value['ana_paginacion']);
            $marc_data_field->appendChild($marc_data_subfield);
            $marc_data_subfield->setAttribute('code', 'g'); //
            $marc_data_subfield = $xml->createElement('subfield', $value['ana_materia']);
            $marc_data_field->appendChild($marc_data_subfield);
            $marc_data_subfield->setAttribute('code', 'g'); //
            $marc_data_subfield = $xml->createElement('subfield', $value['ana_autor']);
            $marc_data_field->appendChild($marc_data_subfield);
            $marc_data_subfield->setAttribute('code', 'r'); //mension de respondabilidad
            //Genera subcampo $t NR -> Título
            $titulo = $value['ana_titulo'];
            $subtitulo = $value['ana_subtitulo'];
            if($subtitulo != ''){
                $titulo = $titulo.':'.$subtitulo;
            }
            $marc_data_subfield = $xml->createElement('subfield', $titulo);
            $marc_data_field->appendChild($marc_data_subfield);
            $marc_data_subfield->setAttribute('code', 't'); 
            
        }
        //ANALITICAS EN EL CAMPO 773  ENLACE AL DOCUMENTO FUENTE/ENTRADA DE REGISTRO ANFITRIÓN
        foreach ($analitica_libro as $key => $value){
            
            //Genera campo 773
            $marc_data_field = $xml->createElement('datafield');
            $marc_record->appendChild($marc_data_field);
            $marc_data_field->setAttribute('tag', '773');
            $marc_data_field->setAttribute('ind1', '0');//Indicador = 0 (Se visualiza nota)
            $marc_data_field->setAttribute('ind2', '#');//Indicador en # (Genera nota EN:)
            //Genera subcampo $a NR -> Encabezamiento principal
            $marc_data_subfield = $xml->createElement('subfield', $value['ana_autor']);
            $marc_data_field->appendChild($marc_data_subfield);
            $marc_data_subfield->setAttribute('code', 'a'); 
            //Genera subcampo $g R -> Informacion relacionada
            $marc_data_subfield = $xml->createElement('subfield', $value['ana_materia']);
            $marc_data_field->appendChild($marc_data_subfield);
            $marc_data_subfield->setAttribute('code', 'g'); 
            //Genera subcampo $h NR -> Descripcion fisica
            $marc_data_subfield = $xml->createElement('subfield', $value['ana_paginacion']);
            $marc_data_field->appendChild($marc_data_subfield);
            $marc_data_subfield->setAttribute('code', 'h'); 
            //Genera subcampo $t NR -> Título
            $titulo = $value['ana_titulo'];
            $subtitulo = $value['ana_subtitulo'];
            if($subtitulo != ''){
                $titulo = $titulo.':'.$subtitulo;
            }
            $marc_data_subfield = $xml->createElement('subfield', $titulo);
            $marc_data_field->appendChild($marc_data_subfield);
            $marc_data_subfield->setAttribute('code', 't'); 
            
        }
        //CAMPO 942 REGISTRO LOCAL DE KOHA
        $tipo_reg = 'BK';
        $marc_data_field = $xml->createElement('datafield');
        $marc_record->appendChild($marc_data_field);
        $marc_data_field->setAttribute('tag', '942');
        $marc_data_field->setAttribute('ind1', ' ');
        $marc_data_field->setAttribute('ind2', ' ');
        $marc_data_subfield = $xml->createElement('subfield', $tipo_reg);
        $marc_data_field->appendChild($marc_data_subfield);
        $marc_data_subfield->setAttribute('code', 'c');

        //CREA REGISTRO DE ITEMS PARA KOHA
        foreach ($ejemplares_libro as $key => $value) {
            //var_dump($value);
            //CAMPO 952
            $marc_data_field = $xml->createElement('datafield');
            $marc_record->appendChild($marc_data_field);
            $marc_data_field->setAttribute('tag', '952');
            $marc_data_field->setAttribute('ind1', ' ');
            $marc_data_field->setAttribute('ind2', ' ');

            switch ($value['copy_cod_loc']) {
                case 1: // RECTORADO
                    itemSubcampos($xml, $marc_data_field, 'BIB_RECT', $value, $tipo_reg);
                    break;
                case 2://UACO
                    itemSubcampos($xml, $marc_data_field, 'BIB_UACO', $value, $tipo_reg);
                    break;
                case 3://UART
                    itemSubcampos($xml, $marc_data_field, 'BIB_UART', $value, $tipo_reg);
                    break;
                case 4://UASJ
                    itemSubcampos($xml, $marc_data_field, 'BIB_UASJ', $value, $tipo_reg);
                    break;
                case 5://UARG
                    itemSubcampos($xml, $marc_data_field, 'BIB_UARG', $value, $tipo_reg);
                    break;

                case 10:// satelite pico truncado
                    itemSubcampos($xml, $marc_data_field, 'SAT_TRUN', $value, $tipo_reg);
                    break;
                case 11://satelite piedrabuena
                    itemSubcampos($xml, $marc_data_field, 'SAT_PBNA', $value, $tipo_reg);                  
                    break;
                case 12://satelite calafate
                    itemSubcampos($xml, $marc_data_field, 'SAT_CLFT', $value, $tipo_reg);
                    break;
                case 13://Biblioteca APEP UARG
                    itemSubcampos($xml, $marc_data_field, 'SAT_APEP', $value, $tipo_reg);                   
                    break;
                case 14://Biblioteca Austral de Psicoanálisis UARG
                    itemSubcampos($xml, $marc_data_field, 'SAT_APSI ', $value, $tipo_reg);
                    break;
                case 15://Biblioteca Satélite Puerto Madryn
                    itemSubcampos($xml, $marc_data_field, 'SAT_PMDN ', $value, $tipo_reg);                   
                    break;
                case 16:// Centro de Información Puerto Deseado
                    itemSubcampos($xml, $marc_data_field, 'SAT_PDES', $value, $tipo_reg);                   
                    break;
                case 17://Biblioteca Satélite Río Grande
                    itemSubcampos($xml, $marc_data_field, 'SAT_RGRA', $value, $tipo_reg);                    
                    break;
                case 18://Biblioteca Satélite Gobernador Gregores
                    itemSubcampos($xml, $marc_data_field, 'SAT_GREG', $value, $tipo_reg);                   
                    break;
                case 19://Biblioteca Satélite Ushuaia
                    itemSubcampos($xml, $marc_data_field, 'SAT_USHU', $value, $tipo_reg);                  
                    break;
                case 20://Biblioteca TeatrUNPA UARG
                    itemSubcampos($xml, $marc_data_field, 'SAT_TEAT', $value, $tipo_reg);                   
                    break;
                default:
                    break;
            }
        }
        
    }
    crearXML($xml, $nombre_xml, '1000x27_registros_xml_BK');
}****/