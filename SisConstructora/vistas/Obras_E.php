<?php
// Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
elseif ($_SESSION["tipodeusuario"]=="Administrador") {
  header("Location: login.html");
}
else
{
include './cuerpo/cabezera_E.php';
?>

<div class="text-center" >
<br><br>
<h2>Datos de Obra</h2>
<br>
<table class="table table-striped table-dark" id="tbllistadoobra">
  <!-- <table class="table " id="tbllistado"> -->
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Direccion</th>
      <th scope="col">Encargado</th>
      <th scope="col">Dueño</th>
      <th scope="col">Fecha de Inicio</th>
      <th scope="col">Fecha de Fin</th>
      <th scope="col">Costo</th>
    </tr>
  </thead>
  <tbody  align="center" class="" >
    <tr>
    </tr>
  </tbody>
</table>



<br><br><br>

<h2>Datos de Empleados</h2>
<br>
<table class="table table-striped table-dark" id="tbllistadoemple">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido Paterno</th>
      <th scope="col">Apellido Materno</th>
      <th scope="col">Telefono</th>
      <th scope="col">Puesto</th>
      <th scope="col">Foto</th>
      <th scope="col">Salario</th>
      <th scope="col">Nombre de obra</th>

    </tr>
  </thead>
  <tbody  align="center" class="" >
    <tr>
    </tr>
  </tbody>
</table>

<br><br>

<h2>Datos de Materiales</h2>
<br>
<table class="table table-striped table-dark" id="tbllistadomat">
  <thead>
    <tr>
      <th scope="col">Codigo de Barra</th>
      <th scope="col">Nombre</th>
      <th scope="col">Marca</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Unidad de Medida</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Precio</th>
      <th scope="col">Foto</th>
    </tr>
  </thead>
  <tbody  align="center" class="" >
    <tr>
    </tr>
  </tbody>
</table>

</div>
<?php
include './cuerpo/pie.php';
?>

<script type="text/javascript" src="scripts/Datosencargado.js"></script>


<?php 
}
ob_end_flush();
?>
