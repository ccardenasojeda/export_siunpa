SELECT b.bibid, b.create_dt, b.call_nmbr1, b.call_nmbr2, b.call_nmbr3, b.title, b.title_remainder, 
	   b.responsibility_stmt, b.`author`, b.topic1, b.topic2,b.topic3, b.topic4, b.topic5,
	   mt.description as tipo_material, cdm.description as tipo_coleccion, bf.tag, bf.subfield_cd,bf.field_data

FROM biblio b

INNER JOIN material_type_dm mt ON b.`material_cd`   = mt.code AND mt.code = 2

INNER JOIN collection_dm   cdm ON b.`collection_cd` = cdm.code

INNER JOIN biblio_field bf ON b.bibid = bf.bibid

WHERE b.bibid = 100170


SELECT
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
   bcn.numeros
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
INNER JOIN biblio_copy bc 
ON b.bibid = bc.bibid
LEFT JOIN biblio_copy_num bcn ON bcn.bibid = b.bibid
WHERE
    b.bibid = 100170

/***************************************************************************************/
SELECT b.bibid, usm.tag, usm.subfield_cd, b.title_remainder as field_data 

FROM biblio b INNER JOIN material_type_dm mt ON b.`material_cd` = mt.code AND mt.code = 2 

INNER JOIN collection_dm cdm ON b.`collection_cd` = cdm.code 

INNER JOIN usmarc_subfield_dm usm ON usm.tag = 245 AND usm.subfield_cd = 'b' 

ORDER BY `b`.`bibid` ASC

SELECT bf.tag, bf.subfield_cd,bf.field_data
FROM biblio b
INNER JOIN material_type_dm mt ON b.`material_cd`   = mt.code AND mt.code = 2
INNER JOIN collection_dm   cdm ON b.`collection_cd` = cdm.code
left JOIN biblio_field_copy bf ON b.bibid = bf.bibid 
WHERE bf.tag = 41

/*******MUESTRA LOS LIBROS QUE NO TIENEN EL TAG CARGADO******/

SELECT b.bibid, usm.tag, usm.subfield_cd, ' ' as field_data 

FROM (SELECT bi.* FROM biblio bi WHERE bi.bibid NOT IN (SELECT DISTINCT bci.bibid From biblio_field_copy bci where bci.tag = 41 ORDER BY bci.bibid)) b 

INNER JOIN material_type_dm mt ON b.`material_cd` = mt.code AND mt.code = 2 

INNER JOIN collection_dm cdm ON b.`collection_cd` = cdm.code 

INNER JOIN usmarc_subfield_dm usm ON usm.tag = 41 AND usm.subfield_cd = 'a' 

ORDER BY `b`.`bibid` ASC

/*********************libros UACO**********/
SELECT
bc.bibid, bc.barcode_nmbr, bc.status_begin_dt, bc.copy_volumen, bc.copy_tomo,
bc.copy_proveedor, bc.copy_precio, bc.copy_cod_loc, bcn.anio, bcn.estado, bcn.numeros,
bi.indice, mt.description as tipo_maetrial, cdm.description as tipo_coleccion,
bcl.description as uuaa
FROM biblio b
INNER JOIN material_type_dm mt     ON b.`material_cd`   = mt.code AND mt.code = 2
INNER JOIN collection_dm cdm       ON b.`collection_cd` = cdm.code 
INNER JOIN biblio_copy bc          ON b.bibid           = bc.bibid
LEFT JOIN  biblio_copy_num bcn     ON bcn.bibid         = b.bibid
LEFT JOIN  biblio_index bi         ON b.bibid           = bi.bibid
INNER JOIN biblio_cod_library bcl  ON bc.copy_cod_loc = bcl.code  
WHERE bc.copy_cod_loc = 2
GROUP BY bc.barcode_nmbr
/************************************************************************/
SELECT bf.bibid, bf.tag, bf.subfield_cd, bf.field_data, mt.description 
FROM biblio b 
INNER JOIN material_type_dm mt ON b.`material_cd` = mt.code AND mt.code = 2 
INNER JOIN collection_dm cdm ON b.`collection_cd` = cdm.code 
INNER JOIN biblio_field_copy bf ON b.bibid = bf.bibid 
WHERE bf.tag = 20 AND bf.field_data <> '' 
ORDER BY `bf`.`bibid` ASC
/*********MUESTRA ISBNS de LIBROS SEPARDOS CON | y distinto de VACIO*************************/
SELECT bf.bibid, bf.tag, bf.subfield_cd, bf.field_data, mt.description 
FROM biblio b 
INNER JOIN material_type_dm mt ON b.`material_cd` = mt.code AND mt.code = 2 
INNER JOIN collection_dm cdm ON b.`collection_cd` = cdm.code 
INNER JOIN biblio_field_copy bf ON b.bibid = bf.bibid 
WHERE bf.tag = 20 AND bf.field_data <> '' AND bf.field_data like '%|%'
ORDER BY `bf`.`bibid` ASC

/**muestra isbns de LIBROS no vacios **/

SELECT bf.bibid, bf.tag, bf.subfield_cd, bf.field_data, mt.description 
FROM biblio b 
INNER JOIN material_type_dm mt ON b.`material_cd` = mt.code AND mt.code = 2 
INNER JOIN collection_dm cdm ON b.`collection_cd` = cdm.code 
INNER JOIN biblio_field_copy bf ON b.bibid = bf.bibid 
WHERE bf.tag = 20 AND bf.field_data <> '' 
ORDER BY `bf`.`bibid` ASC

/******MUESTRA SOLO LOS ISBNS QUE ESTAN ENTRE CORCHETES***************/
SELECT * FROM (SELECT * 
FROM `biblio_field` 
WHERE `tag` = 20 AND `field_data` NOT LIKE '%[sic]%') as bb
WHERE bb.field_data LIKE '%[%' AND bb.field_data LIKE '%]%'


/************ISBN SIN SIGNOS***********************/

SELECT *, if((`tag` = 20),replace(replace(replace(replace(replace(replace(replace(`field_data`,'-',''),'13:',''),' ',''),'sbn:',''),'isbn:',''),':',''),'i',''),`field_data`) AS `field_data_isbn`
FROM `biblio_field_copy` 
WHERE tag = 20 

/*****materias de libros****/
SELECT bibid,
       CONCAT(REPLACE(topic1, '-', ''), '' ,REPLACE(topic2, '-', '|'),  ''  ,REPLACE(topic3, '-', '|'),  '' ,REPLACE(topic4, '-', '|'),  '' ,REPLACE(topic5, '-', '|')) as materias
FROM `biblio` 
WHERE material_cd = 2


/****EXPORTAR desde sql a CVS*****/

SELECT barcode INTO OUTFILE '/tmp/barcode_items.csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' LINES TERMINATED BY '\n' FROM items

SELECT barcode 
INTO OUTFILE '/tmp/barcode_items_3.csv' 
FIELDS TERMINATED BY ',' 
OPTIONALLY ENCLOSED BY ' ' 
LINES TERMINATED BY '\n' 
FROM items


/*****************CAMPO 40 $c***********/

INSERT INTO `biblio_field_copy`(`bibid`,`tag`, `subfield_cd`, `field_data`)
SELECT b.bibid, usm.tag, usm.subfield_cd, 'SIUNPA' as field_data 

FROM (SELECT bi.* FROM biblio bi WHERE bi.bibid NOT IN (SELECT DISTINCT bci.bibid From biblio_field_copy bci where bci.tag = 40 AND bci.subfield_cd = 'c' ORDER BY bci.bibid)) b 

INNER JOIN material_type_dm mt ON b.`material_cd` = mt.code AND mt.code = 1

INNER JOIN collection_dm cdm ON b.`collection_cd` = cdm.code 

INNER JOIN usmarc_subfield_dm usm ON usm.tag = 40 AND usm.subfield_cd = 'c' 

ORDER BY `b`.`bibid` ASC


/*****************CAMPO 80 $a Clasificacion Decimal Universal***********/

INSERT INTO `biblio_field_copy`(`bibid`,`tag`, `subfield_cd`, `field_data`)
SELECT b.bibid, usm.tag, usm.subfield_cd, b.call_nmbr1 as field_data 

FROM (SELECT bi.* FROM biblio bi WHERE bi.bibid NOT IN (SELECT DISTINCT bci.bibid From biblio_field_copy bci where bci.tag = 80 AND bci.subfield_cd = 'a' ORDER BY bci.bibid)) b 

INNER JOIN material_type_dm mt ON b.`material_cd` = mt.code AND mt.code = 1

INNER JOIN collection_dm cdm ON b.`collection_cd` = cdm.code 

INNER JOIN usmarc_subfield_dm usm ON usm.tag = 80 AND usm.subfield_cd = 'a' 

ORDER BY `b`.`bibid` ASC


/******INSERTA Autor CAMPO 100 $a para tipos de material (1) casset en biblio_field_copy****/

INSERT INTO `biblio_field_copy`(`bibid`,`tag`, `subfield_cd`, `field_data`) 
SELECT b.bibid, usm.tag, usm.subfield_cd, b.author as field_data 

FROM (SELECT bi.* FROM biblio bi WHERE bi.bibid NOT IN (SELECT DISTINCT bci.bibid From biblio_field_copy bci where bci.tag = 100 AND bci.subfield_cd = 'a' ORDER BY bci.bibid)) b 

INNER JOIN material_type_dm mt ON b.`material_cd` = mt.code AND mt.code = 1

INNER JOIN collection_dm cdm ON b.`collection_cd` = cdm.code 

INNER JOIN usmarc_subfield_dm usm ON usm.tag = 100 AND usm.subfield_cd = 'a' 

ORDER BY `b`.`bibid` ASC

/******INSERTA Autor CAMPO 245 $a para tipos de material casset en biblio_field_copy****/

INSERT INTO `biblio_field_copy`(`bibid`,`tag`, `subfield_cd`, `field_data`)
SELECT b.bibid, usm.tag, usm.subfield_cd, b.title as field_data 

FROM (SELECT bi.* FROM biblio bi WHERE bi.bibid NOT IN (SELECT DISTINCT bci.bibid From biblio_field_copy bci where bci.tag = 245 AND bci.subfield_cd = 'a' ORDER BY bci.bibid)) b 

INNER JOIN material_type_dm mt ON b.`material_cd` = mt.code AND mt.code = 1

INNER JOIN collection_dm cdm ON b.`collection_cd` = cdm.code 

INNER JOIN usmarc_subfield_dm usm ON usm.tag = 245 AND usm.subfield_cd = 'a' 

ORDER BY `b`.`bibid` ASC

/******INSERTA Autor CAMPO 245 $b para tipos de material casset en biblio_field_copy****/

INSERT INTO `biblio_field_copy`(`bibid`,`tag`, `subfield_cd`, `field_data`)
SELECT b.bibid, usm.tag, usm.subfield_cd, b.title_remainder as field_data 

FROM (SELECT bi.* FROM biblio bi WHERE bi.bibid NOT IN (SELECT DISTINCT bci.bibid From biblio_field_copy bci where bci.tag = 245 AND bci.subfield_cd = 'b' ORDER BY bci.bibid)) b 

INNER JOIN material_type_dm mt ON b.`material_cd` = mt.code AND mt.code = 1

INNER JOIN collection_dm cdm ON b.`collection_cd` = cdm.code 

INNER JOIN usmarc_subfield_dm usm ON usm.tag = 245 AND usm.subfield_cd = 'b' 

ORDER BY `b`.`bibid` ASC

/******INSERTA Autor CAMPO 245 $c para tipos de material casset en biblio_field_copy****/

INSERT INTO `biblio_field_copy`(`bibid`,`tag`, `subfield_cd`, `field_data`)
SELECT b.bibid, usm.tag, usm.subfield_cd, b.responsibility_stmt as field_data 

FROM (SELECT bi.* FROM biblio bi WHERE bi.bibid NOT IN (SELECT DISTINCT bci.bibid From biblio_field_copy bci where bci.tag = 245 AND bci.subfield_cd = 'c' ORDER BY bci.bibid)) b 

INNER JOIN material_type_dm mt ON b.`material_cd` = mt.code AND mt.code = 1

INNER JOIN collection_dm cdm ON b.`collection_cd` = cdm.code 

INNER JOIN usmarc_subfield_dm usm ON usm.tag = 245 AND usm.subfield_cd = 'c' 

ORDER BY `b`.`bibid` ASC


/******INSERTA MATERIAS CAMPO 650 $a para tipos de material casset en biblio_field_copy****/

INSERT INTO `biblio_field_copy`(`bibid`,`tag`, `subfield_cd`, `field_data`)
SELECT b.bibid, usm.tag, usm.subfield_cd, 
CONCAT(REPLACE(b.topic1, '-', ''), '' ,REPLACE(b.topic2, '-', '|'),  ''  ,REPLACE(b.topic3, '-', '|'),  '' ,REPLACE(b.topic4, '-', '|'),  '' ,REPLACE(b.topic5, '-', '|')) as field_data 

FROM (SELECT bi.* FROM biblio bi WHERE bi.bibid NOT IN (SELECT DISTINCT bci.bibid From biblio_field_copy bci where bci.tag = 650 AND bci.subfield_cd='a' ORDER BY bci.bibid)) b 

INNER JOIN material_type_dm mt ON b.`material_cd` = mt.code AND mt.code = 1 

INNER JOIN collection_dm cdm ON b.`collection_cd` = cdm.code 

INNER JOIN usmarc_subfield_dm usm ON usm.tag = 650 AND usm.subfield_cd = 'a' 

ORDER BY `b`.`bibid` ASC



/********ARMA TAG 650 CON MATERIAS consulta para validar los registeros que no poseen este campo*********/
SELECT b.bibid, usm.tag, usm.subfield_cd, ' ' as field_data, 
CONCAT(REPLACE(b.topic1, '-', ''), '' ,REPLACE(b.topic2, '-', '|'),  ''  ,REPLACE(b.topic3, '-', '|'),  '' ,REPLACE(b.topic4, '-', '|'),  '' ,REPLACE(b.topic5, '-', '|')) as materias 

FROM (SELECT bi.* FROM biblio bi WHERE bi.bibid NOT IN (SELECT DISTINCT bci.bibid From biblio_field_copy bci where bci.tag = 650 ORDER BY bci.bibid)) b 

INNER JOIN material_type_dm mt ON b.`material_cd` = mt.code AND mt.code = 2 

INNER JOIN collection_dm cdm ON b.`collection_cd` = cdm.code 

INNER JOIN usmarc_subfield_dm usm ON usm.tag = 650 AND usm.subfield_cd = 'a' 

ORDER BY `b`.`bibid` ASC


/*******INSERTA TAG 650 biblio_field_copy para libros******/

INSERT INTO `biblio_field_copy`(`bibid`,`tag`, `subfield_cd`, `field_data`) 
SELECT b.bibid, usm.tag, usm.subfield_cd, 
CONCAT(REPLACE(b.topic1, '-', ''), '' ,REPLACE(b.topic2, '-', '|'),  ''  ,REPLACE(b.topic3, '-', '|'),  '' ,REPLACE(b.topic4, '-', '|'),  '' ,REPLACE(b.topic5, '-', '|')) as field_data 

FROM (SELECT bi.* FROM biblio bi WHERE bi.bibid NOT IN (SELECT DISTINCT bci.bibid From biblio_field_copy bci where bci.tag = 650 ORDER BY bci.bibid)) b 

INNER JOIN material_type_dm mt ON b.`material_cd` = mt.code AND mt.code = 2 

INNER JOIN collection_dm cdm ON b.`collection_cd` = cdm.code 

INNER JOIN usmarc_subfield_dm usm ON usm.tag = 650 AND usm.subfield_cd = 'a' 

ORDER BY `b`.`bibid` ASC
