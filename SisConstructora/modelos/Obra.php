<?php 
require ('config/conexion.php');

class Obra
{
	public function __construct()
	{

	}

	public function insertar($nombreobra,$direccion,$nombre_dueno,$fechadeinicio,$fechadetermino,$costofinal,$encargado)
	{
		$sql="INSERT INTO obra(nombreobra,direccion,nombre_dueno,fechadeinicio,fechadetermino,costofinal,idusuario_fk)VALUES ('$nombreobra','$direccion','$nombre_dueno','$fechadeinicio','$fechadetermino','$costofinal','$encargado')";
		return ejecutarConsulta($sql);
	}

	public function editar($idobra,$nombreobra,$direccion,$nombre_dueno,$fechadeinicio,$fechadetermino,$costofinal,$encargado)
	{
		$sql="UPDATE obra set nombreobra='$nombreobra' ,direccion='$direccion' 
		,idusuario_fk='$encargado',nombre_dueno='$nombre_dueno',fechadeinicio='$fechadeinicio',fechadetermino='$fechadetermino',costofinal='$costofinal'
		where idobra='$idobra'";
		return ejecutarConsulta($sql);
	}
	
	public function eliminar($idobra)
	{
		$sql="DELETE FROM obra 
		WHERE idobra='$idobra'";
		return ejecutarConsulta($sql);
	}
	
	public function mostrar($idobra)
	{
		$sql="SELECT * FROM obra where idobra='$idobra'";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function listar()
	{
		$sql="SELECT `idobra`, `nombreobra`, `direccion`, `nombre_dueno`, `fechadeinicio`, `fechadetermino`, `costofinal`, `nombre`,`apellidoP`,`apellidoM` FROM `obra` inner join usuarios
			on usuarios.idusuario=obra.idusuario_fk ";
		return ejecutarConsulta($sql);
	}
	public function listarencargado()
	{
		ob_start();
		session_start();
		$iduser=$_SESSION['idusuario'];
		$sql="SELECT `idobra`, `nombreobra`, `direccion`, `nombre_dueno`, `fechadeinicio`, `fechadetermino`, `costofinal`, `nombre`,`apellidoP`,`apellidoM` FROM `obra` inner join usuarios on usuarios.idusuario=obra.idusuario_fk WHERE obra.idusuario_fk='$iduser'";
		return ejecutarConsulta($sql);
		ob_end_flush();
	}

	 

}

?>
