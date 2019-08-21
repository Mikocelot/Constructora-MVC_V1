<?php
//Activamos el almacenamiento en el buffer
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
include 'carrito.php';
include './cuerpo/cabezera_E.php';
include '../modelos/config/global.php';
include '../modelos/config/conexion.php';   
?>

<br>
<h3>Lista de Carros</h3>
<?php  if(!empty($_SESSION['CARRITO']))  { ?>
<table  class="table table-light table-bordered ">
    <tbody id="">
        <tr>
        <th width="40%" > Descripcion</th>
        <th width="15%" class="text-center" > Cantidad</th>
        <th width="20%" class="text-center" > Precio</th>
        <th width="20%" class="text-center" > Total</th>
        <th width="5%" class="text-center" > Elimniar </th>
        </tr>
        <?php  $total=0; ?>
        <?php  foreach ($_SESSION['CARRITO'] as $indice => $producto) {  ?>
        <tr>
        <td width="40%" > <?php echo $producto['nombre']   ?></td>
        <td width="15%"  class="text-center" > <?php echo $producto['cantidad']   ?></td>
        <td width="20%"  class="text-center" > <?php echo $producto['precio']   ?></td>
        <td width="20%"  class="text-center" > <?php echo number_format( $producto['cantidad'] *  $producto['precio']  ) ?></td>
        <td width="5%" class="text-center">
        <!-- <button class="btn btn-danger" >E</button> -->
        <form method="post" action="">
        <input class="form-control" type="hidden" name="id" value="<?php echo  $producto['id']; ?>">
            <button type="submit" name="bt-accion" value="borrar" class="btn btn-danger" ><i class="material-icons">delete</i></button>
        </form>
        </td>
        </tr>
        <?php $total = $total+($producto['cantidad'] * $producto['precio']) ; ?>
        <?php  } ?>
        <tr>
        <td colspan="3" align="right"> <h3>Total</h3></td>
        <td align="right" > <h3> $<?php  echo number_format($total,2); ?>  </h3></td>
        <td width="20%"  class="text-center" > </td>
        </tr>
        <!-- neuvo -->

        <tr>
            <td colspan="5">
                <!-- <form class="formulario"  name="formulario" id="formulario"  method="post" action="../controllers/pagar.php"> -->
                 <form class="formulario"  name="formulario" id="formulario"  method="post">
                    <!-- <div class="alert alert-success" role="alert">
                        <div class="form-group">
                            <label for="my-input">Correo de Contacto</label>
                            <input id="correo" class="form-control" type="email" placeholder="Ingresa tu correo" name="correo"  >
                        </div>
                        <small id="emailHelp"  class="form-text text-muted" >
                            los productos se enviaran a este correo
                        </small>                        
                    </div>       -->
                    <!-- <button type="submit" name="bt-accion" onclick="HTMLtoPDF()" value="proceder" class="btn btn-dark btn-lg btn-block "> Proceder a Pagar</button>                                   -->

                    <button data-toggle="modal" data-target="#modaltick" type="submit" name="bt-accion"  value="proceder" class="btn btn-dark btn-lg btn-block "> Proceder a Pagar</button>                                  
                  </form>
            </td>
        </tr>


    </tbody>
</table>




    <!-- Modal -->
    <div class="modal fade animated zoomIn" id="modaltick" tabindex="-1" role="dialog" aria-labelledby="modaltick" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Generar Ticket</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
          
<div  id="ticket_disen" class="text-center">
<h5>Constructora Cadaver</h5>
  <img src="../public/icons/skull.png" width="150px" height="150px" alt="">
  <h6>Ticket de Compra</h6>
  <p><?php echo "Fecha De Compra: " . date ("j/M/Y"); ?></p>
  <table  align="center"  class="table-striped ">
    <tbody  id="">
        <tr>
        <th  > Cantidad</th>
        <th> producto</th>
        <th> Precio</th>
        <th> Total</th>
        </tr>
        <?php  $total=0; ?>
        <?php  foreach ($_SESSION['CARRITO'] as $indice => $producto) {  ?>
        <tr>
        <td   > <?php echo $producto['cantidad']   ?></td>
        <td > <?php echo $producto['nombre']   ?></td>
        <td   > <?php echo $producto['precio']   ?></td>
        <td   > <?php echo number_format( $producto['cantidad'] *  $producto['precio']  ) ?></td>
        </tr>
        <?php $total = $total+($producto['cantidad'] * $producto['precio']) ; ?>
        <?php  } ?>
        <tr>
          <td>___________</td>
          <td>___________</td>
          <td>___________</td>
          <td>________</td>
        </tr>
        <tr>
        <td></td>
        <td><h6>Total</h6></td>
        <td align="right"> </td>
        <td><h6> $<?php  echo number_format($total,2); ?>  </h6></td>
        <td></td>
        <td></td>
        </tr>

    </tbody>
</table>
<br>

</div>

<!-- <button data-toggle="modal" data-target="#modaltick" type="submit" name="bt-accion" onclick="HTMLtoPDF()"  value="proceder" class="btn btn-dark btn-lg btn-block "> Proceder a Pagar</button>                                   -->
<button data-toggle="modal" data-target="#modaltick" type="submit" name="bt-accion" onclick="ticker_pdf()"  value="proceder" class="btn btn-dark btn-lg btn-block ">Ticket</button>                                  

        </div>
      </div>
    </div>
    <!-- fin modal-->








<?php }  else { ?>
<div class="alert alert-success">
No hay nada en el carro
</div>

<?php } ?>
<?php
include './cuerpo/pie.php';
?>  

<script>
function imprimir() {
  window.print();
}</script>


<script src="../public/tarjeta/js/jspdf.js"   crossorigin="anonymous"></script>
<script src="../public/tarjeta/js/pdfFromHTML.js"   crossorigin="anonymous"></script>

<script type="text/javascript" src="scripts/pagar.js"></script>

<?php 
}
ob_end_flush();
?>