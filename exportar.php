<?php 
require_once 'base.php';
$base = new base();

$sql = "SELECT code, description, default_flg FROM estado_dm";

$base->conectar('openbiblio_uaco');
$consulta = $base->consulta($sql);
header('Content-Type: text/xml');

echo "<estados>";

while($dato = mysql_fetch_row($consulta)){

	echo "<estado_dm>";
	echo "<code>$dato[0]</code>";
	echo "<description>$dato[1]</description>";
	echo "<default_flg>$dato[2]</default_flg>";
	echo "</estado_dm>";
}
echo "</estados>";
/***********************************************************************/

?>