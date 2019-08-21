<?php 
require ('config/conexion.php');

Class Usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($usuario,$clave,$tipodeusuario,$nombre,$apellidoP,$apellidoM)
	{
		$sql="INSERT INTO usuarios (login, clave,tipodeusuario,nombre,apellidoP,apellidoM) VALUES ( '$usuario','$clave','$tipodeusuario','$nombre','$apellidoP','$apellidoM')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idusuario,$usuario,$clave,$tipodeusuario,$idempleado)
	{
		$sql="UPDATE usuarios SET login = '$usuario', clave = '$clave', tipodeusuario = $tipodeusuario, idempleado_fk = '$idempleado' WHERE usuarios.idusuario = '$idusuario'";
		ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function eliminar($idusuario)
	{
		$sql="DELETE FROM usuarios WHERE idusuario = '$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idusuario)
	{
		$sql="SELECT * FROM usuarios WHERE idusuario='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM usuarios WHERE tipodeusuario='Encargadodeobra'";
		return ejecutarConsulta($sql);		
	}
	//Función para verificar el acceso al sistema
	public function verificar($login,$clave)
    {
    	// return "Hola mundo";
    	$sql="SELECT * FROM `usuarios` WHERE login='$login' AND clave='$clave'"; 
    	 return ejecutarConsulta($sql);  
    }
}

?>