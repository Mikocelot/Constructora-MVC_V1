<?php 
require_once "../modelos/Proveedor.php";

$proveedor=new Proveedor();

$idproveedor =isset($_POST["idproveedor"])? limpiarCadena($_POST["idproveedor"]):"";
$nombreempresa=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";


switch ($_GET["op"]) {
	case 'guardaryeditar':
		if (empty($idproveedor)){
			$rspta=$proveedor->insertar($nombreempresa,$direccion,$telefono,$email,$imagen);
			echo $rspta ? "Proveedor registrado" : "Proveedor no se pudo registrar";
		}
		else {
			$rspta=$proveedor->editar($idproveedor,$nombreempresa,$direccion,$telefono,$email,$imagen);
			echo $rspta ? "Categoría actualizada" : "Categoría no se pudo actualizar";
		}
		break;
	case 'eliminar':
		$rspta=$proveedor->eliminar($idproveedor);
			echo $rspta ? "Proveedor eliminado":"Proveedor no se puedo eliminar";
		break;
	case 'mostrar':
		$rspta=$proveedor->mostrar($idproveedor);
		echo json_encode($rspta) ;
		break;
	case 'listar':
		$rspta=$proveedor->listar();
		
		$data= array();
		while ($reg=$rspta->fetch_object()) {
			$data[] = array(
				"0"=>'hola',
				"1"=>$reg->nombre_empresa,
 				"2"=>$reg->direccion,
 				"3"=>$reg->telefono,
 				"4"=>$reg->correo,
 				// "5"=>"<img src='../files/articulos/".$reg->imagen."' height='50px' width='50px' >",
			);
		}
		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
		echo json_encode($results);
		break;
}