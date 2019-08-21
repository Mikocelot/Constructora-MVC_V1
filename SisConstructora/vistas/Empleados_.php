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
    <div  align="center" class="container ">
      <!-- <button  class=" btn control-form">mosrta</button> -->
  
      <div class=" grid-container ">
        <div class="col">
            <div class="grid-container-componentes">
                <div id="panel" class="grid-item estilo-tarjeta">
                    <div id="tarjeta_pdf">
                        <img id="img" class="contorno_imagen" src="../public/Icons/skull.png" width="250px" height="250px" alt="">
                        <h3 id="Nomempleado" >Nombre Empleado</h3>
                        <h5 id="Puesto">Puesto</h5>
                        <table id="Mostrar" class="table">
                          <thead>
                            <tr class="text-center">
                              <th scope="col">Obra</th>
                              <th scope="col">Salario</th>
                              <th scope="col">Telefono</th>
                            </tr>
                          </thead>
                          <tbody class="text-center" id="table">
                            <tr class="text-center">
                              
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div   class="col respon_form">
                  <div class="grid-item estilo-formulario ">
                    <div class="container">
                      <form  name="formulario" id="formulario" method="POST">
                        <div class="row" >
                          <div class="col">
                            <input type="hidden" class="form-control" name="idempleado" placeholder="Nombre" id="idempleado"  required >
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nombre" required>
                          </div>
                          <div class="col" >
                            <input type="text" class="form-control" name="apellidoP" placeholder="Apellido Paterno" id="apellidoP"  required >
                          </div>
                        </div>
                        <br>
                        <div class="row" >
                          <div class="col" >
                            <input type="text" class="form-control" name="apellidoM" placeholder="Apellido Materno" id="apellidoM"  required >
                          </div>
                          <div class="col" >
                            <input type="text" class="form-control" name="telefono" placeholder="Telefono" id="telefono"  required >
                          </div>
                        </div>
                        <br>
                        <div class="row" >
                          <div class="col" >
                            <input type="text" class="form-control" name="tipodeempleado" placeholder="Puesto" id="tipodeempleado"  required >
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" name="salario_hora" placeholder="Salario" id="salario_hora"  required >
                          </div>
                        </div>
                        <br>
                        <br>
                        <div class="grid-item" >
                          <label>Obra(*):</label>
                          <select id="idobra" name="idobra" class="form-control" required >
                          </select>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col" >
                            <!-- <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#modal-qr"   > QR</button>                             -->
                            <input id="botonqr"   class="botones" type="button"  data-toggle="modal" data-target="#modal-qr"  value=" QR ">
                          </div>
                          <div class="col" >
                            <div class="custom-file  fondo_rojo">
                              <input id="fileInput" type="file" class="custom-file-input" name="imagen" id="imagen">
                              <label class="custom-file-label" for="customFileLangHTML" data-browse="Foto"></label>

                              <input type="hidden" class="custom-file-input" name="imagenactual" id="imagenactual">
                                <!-- <img src="" width="150px" height="120px" id=""> -->
                            </div>
                          </div>
                        </div>
                        <br>
                        <!-- <button class="btn btn-dark boton" type="submit" id="btnGuardar" > <i class="fa fa-save"></i> Guardar</button>
                        <button class="btn btn-dark boton" type="button" onclick="limpiar();">Cancelar</button>

                         -->
                        <input class="botones" type="button" onclick="limpiar();" value=" Cancelar ">
                        <input class="botones" type="submit" id="btnGuardar" value=" Guardar ">
                        <div>                          
                        </div>
                      </form>
                    </div>
                  </div>                  
                </div> 
              </div>
              <!--  -->
              
              <input id="print_credencial" class="botones" type="button" name="print_credencial" type="button"  onclick="getScreen()" value="Imprimir Credencial" >
              <a href="" id="blank"></a>
              <!-- <button id="ejecuta">Ejecutar mensaje</button> -->
              <!-- <button class="btn" disabled="disabled">Enviar</button> -->

              <br>
              <div class="abajo_tabla table ">
                 <table class="table " id="tbllistado">
                        <thead  align="center" >
                          <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">A Paterno</th>
                            <th scope="col">A Materno</th>
                            <th scope="col">Telefono</th>                          
                            <th scope="col">Puesto</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Salario</th> 
                            <th scope="col">Obra</th>
                            <th scope="col">Opciones</th>  
                          </tr>
                        </thead>
                        <tbody  align="center" class="" >
                          <tr>
                          </tr>
                        </tbody>
                 </table>                 
               </div>
            </div> 
            
    <!-- Modal -->
    <div class="modal fade animated zoomIn" id="modal-qr" tabindex="-1" role="dialog" aria-labelledby="modal-nuevo-material" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Genera QR</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
              <div class="modal-body ">
                <div class=" row col">
                  <div class="col">
                    <div id="print_tarjetaqr">                      
                  <div id="print">

                  <div id="qr"  >
                  <img id="qr" class="" src="../public/Icons/skull.png" width="220px" height="220px" alt="">

                  </div>
                  </div>
                  </div>
                    </div>
                  <div class="col text-center">
                  <br>
                  <button value="Generar" onclick="update_qrcode()" class="btn btn-dark"> Generar </button>
                  <!-- <button  onclick="imprimirqr()" class="btn btn-dark"> Imprimir </button> -->
                  <br>
                  <br>
                  <button class="btn btn-dark" type="button" onclick="imprimir()">Imprimir Codigo</button>    

                  </div>              
                </div>
              </div>
        </div>
      </div>
    </div>
    <!-- fin modal-->
<!--  -->
                                
<?php
include './cuerpo/pie.php';
?>

<!-- <script>
$("#fileInput").change(function(){
    $("div").prop("hidden", this.files.length == 0);
});
</script> -->

	<script src="../public/tarjeta/js/jspdf.js"></script>
  <script src="../public/tarjeta/js/pdfFromHTML.js"></script>
  
  <script type="text/javascript" src="scripts/qrcode.js"></script>
  <script type="text/javascript" src="scripts/Empleado.js"></script>
  <script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>

  
  <script type="text/javascript" src="scripts/otros_metodos.js"></script>
  <!-- these js files are used for making PDF -->
  


<?php 
}
ob_end_flush();
?>