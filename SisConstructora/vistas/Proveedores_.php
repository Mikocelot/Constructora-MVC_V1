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
        <!-- <button class="btn btn-dark" data-toggle="modal" data-target="#modal-buscar-proveedor" >Buscar Proveedor</button> -->
        <hr>
        <div class="grid-item form-estilo  ">
            <div class="container ">
                <br>
                <form name="formulario" id="formulario" method="POST">
                    <div class="row" >
                        <div class="col" >
                            <input type="hidden" name="idproveedor" id="idproveedor"    required>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre"   required>
                        </div>
                        <div class="col" >
                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion"  required >
                        </div>
                        <div class="col" >
                            <input type="number" class="form-control" name="telefono" id="telefono"placeholder="Telefono"   required>
                        </div>
                    </div>
                    <br>
                    <div class="row" >
                        <div class="col" >
                            <input type="email" class="form-control" name="email" id="email" placeholder="Correo"  required >
                        </div>
                        <div class="col" >
                            <div class="custom-file">
                                <!-- <input type="file" class="custom-file-input" name="imagen" id="imagen"> -->
                                <input id="fileInput" type="file" class="" name="imagen">  
                                <label data-browse="Foto" class="custom-file-label" for="fileInput"></label>
                                <br><br>
                                <!-- <div class="wrapper">
                                <div  class="txt-primer" id="color-uno" hidden="true"> <strong>Imagen Cargada</strong> </div>
                                </div> -->

                                <!-- <img src="" width="170px" height="140px" id="imagen"> -->
                                <!-- <img src="" width="150px" height="120px" id="imagenmuestra"> -->
                            </div>
                            <br><br>
                            
                                <img src="" width="170px" height="140px" id="imagenmuestra">
                                <input type="hidden" class="custom-file-input" name="imagenactual" id="imagenactual">                            
                        </div>
                    </div>
                    <br>
                    <!-- <button class="btn btn-dark" type="submit" id="btnGuardar" > <i class="fa fa-save"></i> Guardar</button> -->

                    <input class="botones" type="submit" id="btnGuardar" value="Guardar" >




                </form>
            </div>
        </div>
        <br>
        <div class="grid-item  ">
            <div class="container ">
                <table class="table text-center " id="tbllistado">
                    <thead align="center">
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Imagen</th>
                        <th>Opciones</th>
                      </thead>
                      <tbody>                            
                      </tbody>
                </table>
            </div>
        </div>
        
    </div>
    
</body>


<?php
include './cuerpo/pie.php';
?>

<script type="text/javascript" src="scripts/proveedor.js"></script>
<script type="text/javascript" src="scripts/otros_metodos.js"></script>

<?php 
}
ob_end_flush();
?>