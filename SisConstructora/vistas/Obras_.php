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

    <div  align="center" class="container  ">
      <br>
      <br><br>
      <div  class="text-center animated fadeInUp">
        
      <!-- <button class="btn btn-dark" data-toggle="modal" data-target="#modal-nueva-obra">Nueva Obra</button> -->

      <input class="botones" type="button" data-toggle="modal" data-target="#modal-nueva-obra" value="Nueva Obra" >

      </div>
      <br>
      <table class="table text-center " id="tbllistado">
          <thead align="center">
              <th scope="col">Nombre Obra</th>
              <th scope="col">Direccion</th>
              <th scope="col">Encargado de la obra</th>
              <th scope="col">Dueño</th>
              <th scope="col">Fecha de Inicio</th>
              <th scope="col">Fecha de Finalizacion</th>
              <th scope="col">Costo total</th>
              <th scope="col">Accion a Realizar</th>
            </thead>
            <tbody>                            
            </tbody>
      </table>
      <!-- Modal -->
      <div class="modal fade" id="modal-nueva-obra" tabindex="-1" role="dialog" aria-labelledby="modal-nuevo-material" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
                            <h5 class="modal-title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form name="formulario" id="formulario" method="POST">
                              <div class="modal-body "><div class=" row col">
                                <div class="col">
                                    <input type="hidden" class="form-control" name="idobra" id="idobra"  required   >
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nombre"  required >
                                    <br>
                                    <input type="text" class="form-control" name="direccion" placeholder="Direccion" id="direccion"  required >
                                    <br>
                                    <label>Encargado de obra(*):</label>
                                    <select id="idencargado" name="idencargado" class="form-control"  >
                                    </select>
                                    <!-- <input type="text" class="form-control" name="duedeobra" placeholder="Dueño de Obra" id="duedeobra"> -->
                                  </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="duedeobra" placeholder="Dueño de Obra" id="duedeobra"  required >
                                    <!-- <input type="date" class="form-control" name="fechainicio" placeholder="Fecha de Inicio" id="fechainicio"> -->
                                    <br>
                                    <div class="row col-xl">
                                      <p class="col">Fecha de Inicio</p>
                                        <input type="date" class="form-control col-lg-9" name="fechainicio" placeholder="Fecha de Inicio" id="fechainicio"  required >
                                    </div>
                                    <!-- <input type="date" class="form-control" name="fechainicio" placeholder="Fecha de Inicio" id="fechainicio"> -->
                                    <!-- <input type="date" class="form-control" name="fechafin" placeholder="Fecha de Fin" id="fechafin"> -->
                                    <br>                                    
                                    <div class="row col-xl">
                                        <p class="col">Fecha de Finalizacion</p>
                                        <input type="date" class="form-control col-lg-9 " name="fechafin" placeholder="Fecha de Fin" id="fechafin"  required >
                                      </div>
                                    <!-- <input type="date" class="form-control" name="fechafin" placeholder="Fecha de Fin" id="fechafin"> -->
                                    <input type="hidden" class="form-control" name="costo" placeholder="Costo total" value="0" id="costo"  required >  
                                    <br>
                                </div>              
                              </div>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-dark" type="submit" id="btnGuardar" > <i class="fa fa-save"></i> Guardar</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </body>




<?php
          include './cuerpo/pie.php';
?>


<script type="text/javascript" src="scripts/Obra.js"></script>

<?php 
}
ob_end_flush();
?>