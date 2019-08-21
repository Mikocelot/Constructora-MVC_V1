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
    include '../modelos/config/global.php';
    include '../modelos/config/conexion.php';
    include 'carrito.php';
    include './cuerpo/cabezera_E.php';

?>

<br>


<?php  if($mensaje != ""){ ?>
    
    <div class="alert alert-success" role="alert">
        <?php echo ($mensaje); ?>
        <a class="badge badge-success" href="menucarrito.php">Ver carrito</a>
    </div>

<?php } ?>



<div class="row">

<!-- sentencias -->

<?php
//$sql = 'SELECT foo FROM bar WHERE id = 42';
//$resultado = mysql_query($sql, $enlace);
$listaproductos=$conexion->query("SELECT * FROM material_bodega");
 // print_r($listaproductos);
?>
<script type="text/javascript">
	
	// console.log("hola mundo");
</script>
<?php foreach ($listaproductos as  $producto) { ?>
    <div class="col-3">
    <div class="card">
        <img 
        data-content="<?php echo $producto['descripcion_material'];?>" 
        data-trigger="hover" 
        data-toggle="popover" 
        class="card-img-top"
        height="150px" width="150px"  
        src="../files/materiales/<?php echo $producto['imagen']?>" alt="">

        <div class="card-body">
            <span><?php echo $producto['nombre']?></span>
            <h5 class="card-title">$ <?php echo $producto['precio']?></h5>
            <h4>Descripcion</h4>
            <p class="card-text"><?php echo $producto['descripcion_material']?></p>    
            <!-- <input>         -->
            <!-- <p class="card-text">Descripcion</p> -->
            <form method="post" action="">
            <input class="form-control" type="hidden" name="idstock" value="<?php echo  openssl_encrypt($producto['idstock'],'AES-128-ECB',KEY); ?>">
            <input class="form-control" type="hidden" name="nombre" value="<?php echo  openssl_encrypt($producto['nombre'],'AES-128-ECB',KEY); ?>">
            <input class="form-control" type="hidden" name="precio" value="<?php echo  openssl_encrypt($producto['precio'],'AES-128-ECB',KEY); ?>">
            <input class="form-control"  name="cantidad"  type="number" name="cantidad" value="1" required >
            <!-- <div class="quantity">
                <input type="number" min="1" max="9" step="1" value="1">
            </div> -->
            <br>
            <button  class="btn btn-dark" value="agregar" type="submit" name="bt-accion" >Agregar al carrito</button>
                
            </form>
        </div>
    </div>
</div>
<?php } ?>
</div>

</div>
<!-- <script type="text/javascript" src="scripts/otros_metodos.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->
<!-- 
<script>
            $("input[name='demo1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
        </script> -->
<!-- <script src="../public/tarjeta/js/jspdf.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../public/tarjeta/js/pdfFromHTML.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php

include './cuerpo/pie.php';

}
ob_end_flush();
?>