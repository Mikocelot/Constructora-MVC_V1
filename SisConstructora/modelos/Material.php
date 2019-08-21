<?php 
require ('config/conexion.php');
class Material
{
	public function __construct()
	{

	}

	public function insertar($codigodebarras,$nombre,$marca,$cantidad_existente,$unidad_medida,$descripcion_material,$precio,$imagen)
	{
		$sql="INSERT INTO material_bodega(codigodebarras,nombre,marca,cantidad_existente,unidad_medida,descripcion_material,precio,imagen)VALUES ('$codigodebarras','$nombre','$marca','$cantidad_existente','$unidad_medida','$descripcion_material','$precio','$imagen')";
		return ejecutarConsulta($sql);
	}

	public function editar($idstock,$codigodebarras,$nombre,$marca,$cantidad_existente,$unidad_medida,$descripcion_material,$precio,$imagen)
	{
		$sql="UPDATE material_bodega SET codigodebarras = '$codigodebarras', nombre = '$nombre', marca = '$marca', cantidad_existente = '$cantidad_existente', unidad_medida = '$unidad_medida', descripcion_material = '$descripcion_material',precio='$precio', imagen = '$imagen' WHERE idstock = '$idstock'";
		return ejecutarConsulta($sql);
	}

	/*Insertar entrada */
	public function insertarentrada($codigodebarras,$nombre,$marca,$cantidad_existente,$unidad_medida,$descripcion_material,$precio,$fecha,$idprovedor,$idstock)
	{
		// $total=$cantidad_existente*$precio;
		$sql="INSERT INTO materialentrada( codigodebarras, nombre, marca, cantidad, unidad_medida, descripcion, precio, total, fecha, idprovedor_fk, idstock_fk) VALUES ('$codigodebarras','$nombre','$marca','$cantidad_existente','$unidad_medida','$descripcion_material','$precio','77','$fecha','$idprovedor','$idstock')";
		return ejecutarConsulta($sql);
	}

	/*Insertar Salida venta */

	public function insertarsalida()
	{
		ob_start();
		session_start();
		 $iduser=$_SESSION['idusuario'];
	    //// recolecta la informacion y se almacena en el total
		foreach ($_SESSION['CARRITO'] as $indice => $producto) { 
			$precio=$producto['precio'];
			$cant=$producto['cantidad'];
			$multipli=$precio * $cant;
		    $total = $total+$multipli;
		}
		$sql="INSERT INTO materialsalida (total_venta,fechadeventa,iduser_fk) VALUES ('$total',now(),'$iduser')";
			//$idsalidanew=ejecutarConsulta($sql);
			 $idsalidanew=ejecutarConsulta_retornarID($sql);
		$sw=true;

		foreach ($_SESSION['CARRITO'] as $indice => $producto) {
			$precio=$producto['precio'];
			$cant=$producto['cantidad'];
			$idstock=$producto['id'];
		    $sql_detalle = "INSERT INTO `detalle_salida` (`precio`,`cantidad`,`idbodega_material_fk`,`idsalidamat_fk`) VALUES ('$precio','$cant','$idstock','$idsalidanew')";
				ejecutarConsulta($sql_detalle) or $sw = false;
			}
		if ($sw) {
			unset($_SESSION['CARRITO']);
		}
		return $sw ;
		ob_end_flush();
	}
	
	public function eliminar($idstock)
	{
		$sql="DELETE FROM material_bodega 
		WHERE idstock='$idstock'";
		return ejecutarConsulta($sql);
	}
	
	public function mostrar($idstock)
	{
		$sql="SELECT * FROM material_bodega where idstock='$idstock'";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function listar()
	{
		$sql="SELECT * FROM material_bodega";
		return ejecutarConsulta($sql);
	}
}
ob_end_flush();

?>
