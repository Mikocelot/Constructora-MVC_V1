<?php 
require_once "../modelos/Material.php";

$material=new Material();
$idstock =isset($_POST["idstock"])? limpiarCadena($_POST["idstock"]):"";
$codigobarras=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$marca=isset($_POST["marca"])? limpiarCadena($_POST["marca"]):"";
$cantidadexistente=isset($_POST["cantidadexistente"])? limpiarCadena($_POST["cantidadexistente"]):"";
$unidadmedida=isset($_POST["unidadmedida"])? limpiarCadena($_POST["unidadmedida"]):"";
$descripcionmaterial=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$precio=isset($_POST["precio"])? limpiarCadena($_POST["precio"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
$idstockcombo=isset($_POST["idstockcombo"])? limpiarCadena($_POST["idstockcombo"]):"";
$idproveedor=isset($_POST["idproveedor"])? limpiarCadena($_POST["idproveedor"]):"";

switch ($_GET["op"]) {
	 case 'guardaryeditar':

	 		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
			{
				$imagen=$_POST["imagenactual"];
			}
			else 
			{
				$ext = explode(".", $_FILES["imagen"]["name"]);
				if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
				{
					$imagen = round(microtime(true)) . '.' . end($ext);
					move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/materiales/" . $imagen);
				}
			}

			if (empty($idstock))
			{
	            $rspta=$material->insertar($codigobarras,$nombre,$marca,$cantidadexistente,$unidadmedida,$descripcionmaterial,$precio,$imagen);
				echo $rspta ? "Material Registrado ": "Material no se puedo Registrar";	
			}
			else {
				$rspta=$material->editar($idstock,$codigobarras,$nombre,$marca,$cantidadexistente,$unidadmedida,$descripcionmaterial,$precio,$imagen);
				echo $rspta ? "Material Actualizado" : "Materal no se pudo Actualizar";
			}
			break;
	case 'eliminar':
			$rspta=$material->eliminar($idstock);
				echo $rspta ? "Material Eliminado":"Material no se pudo Eliminar".$rspta;
			break;
	case 'mostrar':
			$rspta=$material->mostrar($idstock);
			echo json_encode($rspta) ;
			break;
	case 'listar':
			$rspta=$material->listar();
			//Vamos a declarar un array
 			$data= Array();
			while ($reg=$rspta->fetch_object()) {
				$data[] = array(
					"0"=>$reg->codigodebarras,
	 				"1"=>$reg->nombre,
	 				"2"=>$reg->marca,
	 				"3"=>$reg->cantidad_existente,
	 				"4"=>$reg->unidad_medida,
	 				"5"=>$reg->descripcion_material,
	 				"6"=>$reg->precio,
	 				"7"=>"<img src='../files/materiales/".$reg->imagen."' height='50px' width='50px' >",
					 "8"=>

					 '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-nuevo-material"  onclick="mostrar('.$reg->idstock.')"><i class="material-icons">edit</i></button>'.
					 ' <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idstock.')"><i class="material-icons">delete</i></button>'
				
					 
					 
					//  '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-nuevo-material"  onclick="mostrar('.$reg->idstock.')"><i class="material-icons">edit</i></button>'.
					//  '<button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idstock.')"><i class="material-icons">delete</i></button>'
				);
			}
			$results = array(
	 			"sEcho"=>1, //Información para el datatables
	 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
	 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
	 			"aaData"=>$data);
			echo json_encode($results);
			break;
	case "selectproveedor":
		require_once "../modelos/Proveedor.php";
		$proveedor=new Proveedor();

		$rspta = $proveedor->listar();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idproveedor . '>' . $reg->nombre_empresa . '</option>';
				}
			break;
	case "selectmaterial":
		$rspta = $material->listar();
		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idstock . '>' . $reg->nombre . '</option>';
				}
			break;
	case 'Guardarentrada':
		// $rspta=$material->insertarentrada('8876677','cemento','cemex',10,'kilogramos','hjkh',78,'2019/07/07',1,1);
		  $rspta=$material->insertarentrada($codigobarras,$nombre,$marca,$cantidadexistente,$unidadmedida,$descripcionmaterial,$precio,$fecha,$idproveedor,$idstockcombo);
		
				echo $rspta ? "Material Registrado" : "Material no se pudo Registrar";	
		break;
	case 'Listarcarro':
			$rspta=$material->listar();
			$data= Array();
			while ($reg=$rspta->fetch_object()) {
				$data[] = array(
					"0"=>$reg->codigodebarras,
	 				"1"=>$reg->nombre,
	 				"2"=>$reg->marca,
	 				"3"=>$reg->cantidad_existente,
	 				"4"=>$reg->unidad_medida,
	 				"5"=>$reg->descripcion_material,
	 				"6"=>$reg->imagen,
	 				"7"=>$reg->idstock

				);
			}
			$res=json_encode($data);
			echo $res;
			echo $res.codigodebarras;
		break;
}

?>
