<?php

require_once 'base.php';
$base = new base('openbiblio_siunpa');
//$base->conectar('openbiblio_siunpa');

/**INFORMACION BASICA DE MATERIAL**/
$sql_bibilio = "SELECT b.bibid, b.create_dt, b.call_nmbr1, b.call_nmbr2, 
                       b.call_nmbr3, b.title, b.title_remainder, 
                       b.responsibility_stmt, b.author, b.topic1, b.topic2,
                       b.topic3, b.topic4, b.topic5,
                       mt.description as tipo_material, 
                       cdm.description as tipo_coleccion
                       FROM biblio b
                       INNER JOIN material_type_dm mt ON b.`material_cd`   = mt.code AND mt.code = 2
                       INNER JOIN collection_dm   cdm ON b.`collection_cd` = cdm.code
                WHERE b.bibid = 100170";

/****INFORMACION EN CODIGOAS MARC***/
$sql_biblio_field = "SELECT bf.tag, bf.subfield_cd,bf.field_data
FROM biblio b
INNER JOIN material_type_dm mt ON b.`material_cd`   = mt.code AND mt.code = 2
INNER JOIN collection_dm   cdm ON b.`collection_cd` = cdm.code
INNER JOIN biblio_field bf ON b.bibid = bf.bibid
WHERE b.bibid = 100170";

$sql_bibilio_copy = "SELECT
bc.bibid,
bc.barcode_nmbr,
bc.status_begin_dt,
bc.copy_volumen,
bc.copy_tomo,
bc.copy_proveedor,
bc.copy_precio,
bc.copy_cod_loc,
bcn.anio,
bcn.estado,
bcn.numeros,
bi.indice
FROM
biblio b
INNER JOIN
material_type_dm mt
ON
b.`material_cd` = mt.code AND mt.code = 2
INNER JOIN
collection_dm cdm
ON
b.`collection_cd` = cdm.code
INNER JOIN
biblio_field bf
ON
b.bibid = bf.bibid
INNER JOIN
biblio_copy bc
ON
b.bibid = bc.bibid
LEFT JOIN
biblio_copy_num bcn
ON
bcn.bibid = b.bibid

LEFT JOIN biblio_index bi ON b.bibid=bi.bibid 

WHERE
b.bibid = 100170

GROUP BY bc.barcode_nmbr";

  crear($base, $sql_bibilio, $sql_bibilio_copy, $sql_biblio_field); //Creamos el archivo
  //leer();  //Luego lo leemos

  //Para crear el archivo
  function crear($base, $sql_bibilio, $sql_bibilio_copy, $sql_biblio_field){

    $xml = new DomDocument('1.0', 'UTF-8');

    $marc_colection  = $xml->createElement('collection');
    $marc_colection  = $xml->appendChild($marc_colection);
    
    $marc_colection->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
    $marc_colection->setAttribute('xsi:schemaLocation', 'http://www.loc.gov/MARC21/slim http://www.loc.gov/standards/marcxml/schema/MARC21slim.xsd');
    $marc_colection->setAttribute('xmlns', 'http://www.loc.gov/MARC21/slim');

    $marc_record     = $xml->createElement('record');
    $marc_record     = $marc_colection->appendChild($marc_record);


    $marc_leader     = $xml->createElement('leader', '01309cam a2200313 a 4500');
    $marc_leader     = $marc_record->appendChild($marc_leader);

    /**Datos de Libros**/
    $consulta_biblio = $base->consulta($sql_bibilio);
    
    var_dump($consulta_biblio);
    
    while($dato = mysqli_fetch_row($consulta_biblio)){

      $marc_ctrl_field = $xml->createElement('controlfield', 'OSt'.$dato[0]);
      $marc_ctrl_field = $marc_record->appendChild($marc_ctrl_field);
      $marc_ctrl_field->setAttribute('tag', '001');

      $marc_ctrl_field = $xml->createElement('controlfield', 'OSt');
      $marc_ctrl_field = $marc_record->appendChild($marc_ctrl_field);
      $marc_ctrl_field->setAttribute('tag', '003');

      $marc_ctrl_field = $xml->createElement('controlfield', '20180913152815.0');
      $marc_ctrl_field = $marc_record->appendChild($marc_ctrl_field);
      $marc_ctrl_field->setAttribute('tag', '005');

      $marc_ctrl_field = $xml->createElement('controlfield', '990701s2000    nyua     b    001 0 eng  ');
      $marc_ctrl_field = $marc_record->appendChild($marc_ctrl_field);
      $marc_ctrl_field->setAttribute('tag', '008');

      //TITULO
      $marc_data_field = $xml->createElement('datafield');
      $marc_data_field = $marc_record->appendChild($marc_data_field);
      $marc_data_field->setAttribute('tag', '245');
      $marc_data_field->setAttribute('ind1', '');
      $marc_data_field->setAttribute('ind2', '');
      $marc_data_subfield = $xml->createElement('subfield', $dato[5]);
      $marc_data_subfield = $marc_data_field->appendChild($marc_data_subfield);
      $marc_data_subfield->setAttribute('code', 'a');

      /*Datos Marc*/
      $consulta_biblio_field = $base->consulta($sql_biblio_field);

      while($field=mysqli_fetch_row($consulta_biblio_field)){

        switch ($field[0]) {

          case 20:
            # code...
          $marc_data_field = $xml->createElement('datafield');
          $marc_data_field = $marc_record->appendChild($marc_data_field);
          $marc_data_field->setAttribute('tag', $field[0]);
          $marc_data_field->setAttribute('ind1', '');
          $marc_data_field->setAttribute('ind2', '');

          $marc_data_subfield = $xml->createElement('subfield', $field[2]);
          $marc_data_subfield = $marc_data_field->appendChild($marc_data_subfield);
          $marc_data_subfield->setAttribute('code', $field[1]);
          break;

          case 22:
            # code...
          $marc_data_field = $xml->createElement('datafield');
          $marc_data_field = $marc_record->appendChild($marc_data_field);
          $marc_data_field->setAttribute('tag', $field[0]);
          $marc_data_field->setAttribute('ind1', '');
          $marc_data_field->setAttribute('ind2', '');

          $marc_data_subfield = $xml->createElement('subfield', $field[2]);
          $marc_data_subfield = $marc_data_field->appendChild($marc_data_subfield);
          $marc_data_subfield->setAttribute('code', $field[1]);
          break;

          case 41:
            # code...
          $marc_data_field = $xml->createElement('datafield');
          $marc_data_field = $marc_record->appendChild($marc_data_field);
          $marc_data_field->setAttribute('tag', $field[0]);
          $marc_data_field->setAttribute('ind1', '');
          $marc_data_field->setAttribute('ind2', '');

          $marc_data_subfield = $xml->createElement('subfield', $field[2]);
          $marc_data_subfield = $marc_data_field->appendChild($marc_data_subfield);
          $marc_data_subfield->setAttribute('code', $field[1]);
          break;

          case 260:
            # code...
          $marc_data_field = $xml->createElement('datafield');
          $marc_data_field = $marc_record->appendChild($marc_data_field);
          $marc_data_field->setAttribute('tag', $field[0]);
          $marc_data_field->setAttribute('ind1', '');
          $marc_data_field->setAttribute('ind2', '');

          $marc_data_subfield = $xml->createElement('subfield', $field[2]);
          $marc_data_subfield = $marc_data_field->appendChild($marc_data_subfield);
          $marc_data_subfield->setAttribute('code', $field[1]);
          break;

          case 300:
            # code...
          $marc_data_field = $xml->createElement('datafield');
          $marc_data_field = $marc_record->appendChild($marc_data_field);
          $marc_data_field->setAttribute('tag', $field[0]);
          $marc_data_field->setAttribute('ind1', '');
          $marc_data_field->setAttribute('ind2', '');

          $marc_data_subfield = $xml->createElement('subfield', $field[2]);
          $marc_data_subfield = $marc_data_field->appendChild($marc_data_subfield);
          $marc_data_subfield->setAttribute('code', $field[1]);
          break;
          
          default:
            # code...
          break;
        }

      }
      /****942*****/
      $marc_data_field = $xml->createElement('datafield');
      $marc_data_field = $marc_record->appendChild($marc_data_field);
      $marc_data_field->setAttribute('tag', '942');
      $marc_data_field->setAttribute('ind1', '');
      $marc_data_field->setAttribute('ind2', '');

      $marc_data_subfield = $xml->createElement('subfield', 'LI');
      $marc_data_subfield = $marc_data_field->appendChild($marc_data_subfield);
      $marc_data_subfield->setAttribute('code', 'c');
      

      /*Datos de Item*/
      $consulta_datos_items = $base->consulta($sql_bibilio_copy);

      while($item=mysqli_fetch_row($consulta_datos_items)){

        $marc_data_field = $xml->createElement('datafield');
        $marc_data_field = $marc_record->appendChild($marc_data_field);
        $marc_data_field->setAttribute('tag', '952');
        $marc_data_field->setAttribute('ind1', '');
        $marc_data_field->setAttribute('ind2', '');

        $marc_data_subfield = $xml->createElement('subfield', 'BIB_UARG');
        $marc_data_subfield = $marc_data_field->appendChild($marc_data_subfield);
        $marc_data_subfield->setAttribute('code', 'a');

        $marc_data_subfield = $xml->createElement('subfield', 'BIB_UARG');
        $marc_data_subfield = $marc_data_field->appendChild($marc_data_subfield);
        $marc_data_subfield->setAttribute('code', 'b');

        $marc_data_subfield = $xml->createElement('subfield', $dato[2]);
        $marc_data_subfield = $marc_data_field->appendChild($marc_data_subfield);
        $marc_data_subfield->setAttribute('code', 'c');

        $marc_data_subfield = $xml->createElement('subfield', 'LI');
        $marc_data_subfield = $marc_data_field->appendChild($marc_data_subfield);
        $marc_data_subfield->setAttribute('code', 'y');

        $marc_data_subfield = $xml->createElement('subfield', $item[1]);
        $marc_data_subfield = $marc_data_field->appendChild($marc_data_subfield);
        $marc_data_subfield->setAttribute('code', 'p');        


      }

    }    

    $xml->formatOutput = true;
    $el_xml = $xml->saveXML();
    $xml->save('prueba_xml_marc.xml');

    //echo $el_xml;
    //Mostramos el XML puro
    echo "<p><b>El XML ha sido creado.... Mostrando en texto plano:</b></p>".
    htmlentities($el_xml)."<br/><hr>";
  }

  //Para leerlo
  function leer(){
    echo "<p><b>Ahora mostrandolo con estilo</b></p>";
    $xml = simplexml_load_file('libros.xml');
    $salida ="";
    foreach($xml->libro as $item){
      $salida .=
      "<b>Autor:</b> " . $item->autor . "<br/>".
      "<b>Título:</b> " . $item->titulo . "<br/>".
      "<b>Ano:</b> " . $item->anio . "<br/>".
      "<b>Editorial:</b> " . $item->editorial . "<br/><hr/>";
    }
    echo $salida;
  }
  ?>