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

<div class="container  style_form" >
  <form name="formulario" id="formulario" method="POST">
    <div class=" row col">
      <div class="col">
        <input type="text" class="form-control" name="nombreusuario" placeholder="Nombre de Usuario" id="nombreusuario"  required >
        <br>
        <input type="text" class="form-control" name="clave" placeholder="Clave" id="clave"  required >
        <br>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nombre" required>
        <br>
<!--         
        <input type="text" class="form-control" name="apellidoP" placeholder="Apellido Paterno" id="apellidoP"  required >
        <br>
        <input type="text" class="form-control" name="apellidoM" placeholder="Apellido Materno" id="apellidoM"  required > -->
      </div>
      <div class="col text-center " >
        <input type="text" class="form-control" name="apellidoP" placeholder="Apellido Paterno" id="apellidoP"  required >
        <br>
        <input type="text" class="form-control" name="apellidoM" placeholder="Apellido Materno" id="apellidoM"  required >      
        <br>
        <!-- <div class="normal-container">
        <div class="smile-rating-container">
        <div class=" smile-rating-toggle-container" >

        <div class="form-check">
          <input class="form-check-input  admin"  type="radio" name="radioadministrador" id="radioadministrador" value="Administrador">
          <label  class="rating-label rating-label-admin " for="radioadministrador"> Administrador </label>
        </div>
        
        <div class="form-check">
          <input class="form-check-input encargado" type="radio" name="radioadministrador" id="radioadministrador" value="Encargadodeobra">
          <label  class="rating-label rating-label-encargado" for="radioadministrador"> Encargado de Obra </label>
        </div>

        </div>
        
        </div>

        </div> -->
        <div class="form-check">
          <input class="form-check-input  "    type="radio" name="radioadministrador" id="radioadministrador" value="Administrador">
          <label > Administrador </label>
        </div>
        
        <div class="form-check">
          <input class="form-check-input " type="radio" name="radioadministrador" id="radioadministrador" value="Encargadodeobra">
          <label > Encargado de Obra </label>
        </div>

        <!-- lo hace con id yo debo de usar los name para el pedo-->

<!-- 
        <div class="normal-container">
	        <div class="smile-rating-container">
		      <div class="smile-rating-toggle-container">
			      <div class="submit-rating">
				      <input  type="radio" id="admin"       class="admin"      name="radioadministrador"   value="Administrador"  /> 
				      <input  type="radio" id="encargado"   class="encargado"  name="radioadministrador"   value="Encargadodeobra"  /> 
			    	  <label for="admin" class="rating-label rating-label-admin">Administrador</label>
			    	  <div class="smile-rating-toggle"></div>								
				      <div class="toggle-rating-pill"></div>
			    	  <label for="encargado" class="rating-label rating-label-encargado">Encargado</label>
			      </div>
		</div>
	</div>
</div>
  
   -->


      </div>
      
    </div>

    <div class="text-center">

    <input class="botones" type="submit" id="btnGuardar" value="Ingresar" >


    

    <!-- <button class="btn btn-dark" type="submit" id="btnGuardar" > <i class="fa fa-save"></i>Ingresar</button>
 -->

    
    </div>
    </form>

</div>



        
<!-- <div class="normal-container">
	<div class="smile-rating-container">
		<div class="smile-rating-toggle-container">
			<form class="submit-rating">
				<input id="meh"  name="satisfaction" type="radio" /> 
				<input id="fun" name="satisfaction" type="radio" /> 
				<label for="meh" class="rating-label rating-label-meh">Adminstrador</label>
				<div class="smile-rating-toggle"></div>
				<div class="toggle-rating-pill"></div>
				<label for="fun" class="rating-label rating-label-fun">Encargado</label>
			</form>
		</div>
	</div>
</div>
   -->


</body>
<?php
include './cuerpo/pie.php';
?>
    <script type="text/javascript" src="scripts/Usuario.js"></script>

<?php 
}
ob_end_flush();
?>
