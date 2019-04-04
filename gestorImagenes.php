<?php include 'gestorRegistroBiblio.php';



$imagenes = gestorRegistroBiblio::imagenesRegistros();
foreach ($imagenes as $key => $i) {
	# code...
	$img = $i['foto'];
	$image = imagecreatefromstring($img); //blob
	ob_start(); //You could also just output the $image via header() and bypass this buffer capture.
	imagejpeg($image, 'img/bibid_imagen_'.$i['bibid'].'.jpg', 80);
	$data = ob_get_contents();
	ob_end_clean();
}

//$imagen_base64='data:image/jpg;base64,' .  base64_encode($data);
//echo '<img src="'.$imagen_base64.'" />';


 ?>