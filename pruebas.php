<?php

include 'gestorRegistroBiblio.php';
//$ln = "\n";
//$datos_marc = gestorRegistroBiblio::datosMarcLibro('346');
//$isbns_libros = gestorRegistroBiblio::isbnsLibros();
//$datos_marc = gestorRegistroBiblio::datosMarcLibro('98');

$cadena = 'Esta | es la cadena | de ejemplo para | sustituir un caracter';
echo $cadena;
$resultado = str_replace("|", " ; ", $cadena);
echo "La cadena resultante es: " . $resultado;
//$idioma_marc = gestorRegistroBiblio::datosMarcLibroLengua('98'); //tag 41
//var_dump($datos_marc);
//autores($datos_marc);
//campo_100($datos_marc);

//idioma($idioma_marc);
//campo_020($datos_marc);
//var_dump($datos_marc);
//var_dump(explode('|', $datos_marc[0]['field_data']));
/* * foreach ($isbns_libros as $campo => $key){
  if($key['tag'] == 20){
  echo "<br>";
  echo "**************";
  $isbns = explode('|', $key['field_data']);
  foreach ($isbns as $campo => $dato) {
  # code...
  echo "<br>";
  $sacar_guieon = str_replace('-','', $dato, $contador);
  $sacar_corchete = str_replace('-','', $sacar_guieon, $contador);
  echo $sacar_corchete;
  }
  }

  }* */

function campo_020($consulta) {
    //var_dump($consulta);
    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 20) {

            $isbns = explode('|', $key['field_data']);
            foreach ($isbns as $campo => $dato) {

                $isbn = str_replace('-', '', $dato, $contador);
                $campo_020['tag'] = 20;
                $campo_020['subfield_cd'] = $key['subfield_cd'];
                $campo_020['field_data'] = $isbn;
            }
        }
        $listado [] = $campo_020;
    }
    var_dump($listado);
    return $campo_020;
}

function idioma($consulta) {

    //var_dump($consulta);
    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 41) {

            $cod_idioma = explode('|', $key['field_data']);
            foreach ($cod_idioma as $campo => $dato) {
               $idioma_marc[]=gestorRegistroBiblio::consultarIdiomaMarc($dato)[0]['marc'];
            }
        }
    }
    return $idioma_marc;
}

function get_pais($consulta) {

    //var_dump($consulta);
    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 44) {

            echo "<br>";
            echo "**************";
            $isbns = explode('|', $key['field_data']);

            foreach ($isbns as $campo => $dato) {
                # code...
                echo "<br>";
                $sacar_guieon = str_replace('-', '', $dato, $contador);
                $sacar_corchete = str_replace('[', '', $sacar_guieon, $contador);
                $sacar_corchete2 = str_replace(']', '', $sacar_corchete, $contador);
                echo $sacar_corchete2;
            }
        }
    }
}

function autores($consulta) {


    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 100) {

            $autores = explode('|', $key['field_data']);

            foreach ($autores as $campo => $dato) {
                # code...
                echo "<br>";
                $sacar_guion = str_replace('-', '', $dato, $contador);
                $sacar_corchete = str_replace('[', '', $sacar_guion, $contador);
                $sacar_corchete2 = str_replace(']', '', $sacar_corchete, $contador);
                $listado_autores[] = $sacar_corchete2;
            }
        }
    }
    return $listado_autores;
}

function campo_100($consulta) {

    foreach ($consulta as $campo => $key) {
        if ($key['tag'] == 100) {

            $autores = explode('|', $key['field_data']);

            foreach ($autores as $campo => $dato) {
                # code...
                echo "<br>";
                $sacar_guion = str_replace('-', '', $dato, $contador);
                $sacar_corchete = str_replace('[', '', $sacar_guion, $contador);
                $sacar_corchete2 = str_replace(']', '', $sacar_corchete, $contador);
                $listado_autores[] = $sacar_corchete2;
            }
        }
    }

    for ($index = 0; $index < count($listado_autores); $index++) {
        if ($index === 0) {
            
            $campo_100['tag'] = '100';
            $campo_100['subfield_cd'] = $key['subfield_cd'];
            $campo_100['field_data'] = $listado_autores[$index];
            $registro_autores [] = $campo_100; 
        }else{
            $campo_700['tag'] = '700';
            $campo_700['subfield_cd'] = $key['subfield_cd'];
            $campo_700['field_data'] = $listado_autores[$index];
            $registro_autores [] = $campo_700; 
        }
    }
    var_dump($registro_autores);
    return $registro_autores;
}
