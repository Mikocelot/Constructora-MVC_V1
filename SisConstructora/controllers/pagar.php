<?php
require ('../modelos/Material.php');

$material= new Material();
switch ($_GET["op"]) {
	case 'venta':
		$rspta=$material->insertarsalida();
		   echo $rspta ? "Venta registrada" : "No se Pudo concluir venta!!";
		   // echo $rspta;
		break;
	
	default:
		echo "Url indefinida";
		break;
}
ob_end_flush();
?>