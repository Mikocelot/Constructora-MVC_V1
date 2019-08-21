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

    <div  align="center" class="container " >
    <br><br><br>
    <!-- <button class="btn btn-dark" data-toggle="modal" data-target="#modal-nuevo-material" >Nuevo Material</button> -->

    <input data-toggle="modal" data-target="#modal-nuevo-material" class="botones" type="button" value="Nuevo Material" >

    <br>
    <br>
    <table class="table animated slideInUp" id="tbllistado">
      <thead align="center">
        <tr>
          <th scope="col">Codigo de Barra</th>
          <th scope="col">Nombre</th>
          <th scope="col">Marca</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Unidad de Medida</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Precio</th>
          <th scope="col">Foto</th>
          <th scope="col">Acciones a Realizar</th>
        </tr>
      </thead>
      <tbody align="center">
        <tr>
        </tr>
      </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade animated zoomIn" id="modal-nuevo-material" tabindex="-1" role="dialog" aria-labelledby="modal-nuevo-material" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Nuevo Material</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form name="formulario" id="formulario" method="POST">
              <div class="modal-body ">
                <div class=" row col">
                  <div class="col">
                      <input type="hidden" class="form-control"  name="idstock" id="idstock"  required >
                      <input type="text" class="form-control"  name="codigo" placeholder="codigo barras" id="codigo"  required >
                      <br>
                      <input type="text" class="form-control"  name="nombre" placeholder="Nombre" id="nombre"  required >
                      <br>
                      <input type="text" class="form-control"  name="marca" placeholder="Marca" id="marca"  required >
                      <br>
                      <input type="text" class="form-control"  name="descripcion" placeholder="Descripcion" id="descripcion"  required >
                      <br>
                    <button class="btn btn-success" type="button" onclick="generarbarcode()">Generar Codigo</button>
                    <button class="btn btn-info" type="button" onclick="imprimir()">Imprimir Codigo</button>    
                    <div id="print">
                        <svg id="barcode"></svg>
                    </div> 

                  </div>
                  <div class="col">
                      <input type="text" class="form-control"  name="cantidadexistente" placeholder="Cantidad" id="cantidadexistente"  required >
                      <br>
                      <input type="text" class="form-control"  name="unidadmedida" placeholder="Unidad de Medida" id="unidadmedida"  required >
                      <br>
                      <input type="number" class="form-control" name="precio" placeholder="Precio" value="" id="precio"  required >
                      <br>
                      <div class="custom-file">
                      <input id="fileInput" type="file" class="custom-file-input" name="imagen" id="imagen">
                      <label class="custom-file-label" for="customFileLangHTML" data-browse="Foto"></label>
                      <!-- <div class="wrapper">
                      <div  class="txt-primer" id="color-uno" hidden="true"> <strong>Imagen Cargada</strong> </div>
                    </div> -->

                      <br>
                      <input type="hidden" class="custom-file-input" name="imagenactual" id="imagenactual">
                      <br>
                      <!-- <img src="" width="150px" height="120px" id="imagenmuestra"> -->
                    </div>
                    <img src="" width="150px" height="120px" id="imagenmuestra"> 
                  </div>
                  
              </div>
              <div class="modal-footer">
                <button class="btn btn-dark" type="submit" id="btnGuardar" > <i class="fa fa-save"></i> Guardar</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    <!-- fin modal-->
  </div>
</body>

<?php
include './cuerpo/pie.php';
?>
<script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>

<script type="text/javascript" src="scripts/otros_metodos.js"></script>
<script type="text/javascript" src="scripts/Material.js"></script>

<?php 
}
ob_end_flush();
?>