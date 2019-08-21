<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
elseif ($_SESSION["tipodeusuario"]=="Encargadodeobra") {
  header("Location: login.html");
}
else
{
          include './cuerpo/cabecera.php';
?>

<br><br><br>
<div class="container style_form" >
  <form name="formulario" id="formulario" method="POST">
    <div class=" row col">
      <div class="col">
        <input type="text" class="form-control"  name="codigo" placeholder="codigo barras" id="codigo"  required >
        <br>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nombre"  required >
        <br>
        <input type="text" class="form-control" name="marca" placeholder="Marca" id="marca"  required >
        <br>
        <input type="number" class="form-control" name="cantidadexistente" placeholder="Cantidad" id="cantidadexistente"  required >
        <br>
        <label>Proveedor(*):</label>
        <select id="idproveedor" name="idproveedor" class="form-control"  >
        </select>
      </div>
        <div class="col">
        <input type="text" class="form-control" name="unidadmedida" placeholder="Unidad de Medida" id="unidadmedida"  required >
        <br>
        <input type="text" class="form-control " name="descripcion" placeholder="Descripcion" id="descripcion"  required >
        <br>
        <input type="number" class="form-control" name="precio" placeholder="Precio" value="" id="precio"  required >
        <br>
        <input type="date" class="form-control" name="fecha" placeholder="Fecha" value="" id="fecha"  required >
        <br>
        <label>Nombre Material(*):</label>
        <select id="idstockcombo" name="idstockcombo" class="form-control"  >
        </select>
        <br>
        </div>
        </div>
        <div class="text-center">
        <input class="botones" type="submit" id="btnGuardar" value="Ingresar" >

        <!-- <button class="btn btn-dark" type="submit" id="btnGuardar" > <i class="fa fa-save"></i>Ingresar</button> -->
        </div>
    </form>

</div>

</body>



<?php
include './cuerpo/pie.php';
?>
<script type="text/javascript" src="scripts/MaterialEntr.js"></script>

<?php 
}
ob_end_flush();
?>