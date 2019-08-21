<?php 
require ('config/conexion.php');

class Empleado
{
	public function __construct()
	{

	}

	public function insertar($nombre,$apellidoP,$apellidoM,$telefono,$tipodeempleado,$imagen,$salario_hora,$idobra_fk)
	{
		$sql="INSERT INTO empleado(nombre,apellidoP,apellidoM,telefono,tipodeempleado,imagen,salario_hora,idobra_fk)VALUES ('$nombre','$apellidoP','$apellidoM','$telefono','$tipodeempleado','$imagen','$salario_hora','$idobra_fk')";
		return ejecutarConsulta($sql);
	}

	public function editar($idempleado,$nombre,$apellidoP,$apellidoM,$telefono,$tipodeempleado,$imagen,$salario_hora,$idobra_fk)
	{
		$sql="UPDATE empleado set nombre='$nombre' ,apellidoP='$apellidoP' 
		,apellidoM='$apellidoM',telefono='$telefono',tipodeempleado='$tipodeempleado',imagen='$imagen',salario_hora='$salario_hora',idobra_fk='$idobra_fk'
		where idempleado='$idempleado'";
		return ejecutarConsulta($sql);
	}
	
	public function eliminar($idempleado)
	{
		$sql="DELETE FROM empleado 
		WHERE idempleado='$idempleado'";
		return ejecutarConsulta($sql);
	}
	
	public function mostrar($idempleado)
	{
		$sql="SELECT * FROM empleado where idempleado='$idempleado'";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function listar()
	{
		$sql="SELECT empleado.idempleado,empleado.nombre,empleado.apellidoP,empleado.apellidoM, empleado.telefono,empleado.tipodeempleado,empleado.imagen,empleado.salario_hora,obra.nombreobra from empleado INNER JOIN obra ON obra.idobra=empleado.idobra_fk ";
		return ejecutarConsulta($sql);
	}

	public function listarempleado()
	{
		ob_start();
		session_start();
		$iduser=$_SESSION['idusuario'];
		$sql="SELECT empleado.idempleado,empleado.nombre,empleado.apellidoP,empleado.apellidoM, empleado.telefono,empleado.tipodeempleado,empleado.imagen,empleado.salario_hora,obra.nombreobra from empleado 
			INNER JOIN obra ON empleado.idobra_fk =obra.idobra
			INNER JOIN usuarios on obra.idusuario_fk=usuarios.idusuario
			WHERE usuarios.idusuario='$iduser'";
		return ejecutarConsulta($sql);
		ob_end_flush();
	}
}

?>
