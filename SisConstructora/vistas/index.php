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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/inicio-administrador.css">
    <!-- <link rel="stylesheet" href="animate.css"> -->
    <link rel="stylesheet" href="../public/css/global.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>Inicio Administracion</title>
</head>
<body >
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php" >Logo de Constructora</a>
      <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div id="my-nav" class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item ">
                  <a class="nav-link" href="Empleados_.php">Empleados</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link " href="Materiales_.php" >Materiales</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link " href="Proveedores_.php" >Proveedores</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link " href="Obras_.php" >Obras</a>
              </li>
              
              <li class="nav-item">
                  <a class="nav-link " href="EntradaMaterial.php" >Entrada de Materiales</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link " href="Registro_usuarios.php" >Registro de Usuarios</a>
              </li> 
          </ul>
          
          <div class="nav-item">
                  <h4 class="nav-link " href="../controllers/Usuarios.php?op=salir" >
                    <span><a href="../controllers/Usuarios.php?op=salir" class="btn btn-default btn-flat"><img width="20" src="../public/Icons/logout.png" title="Cerrar Sesión" srcset="">
                    </a>
                    </span>
                  </h4>
          </div>
      </div>
  </nav>
  <br><br><br>
  <div  class="container ">
      
      <h1 class="biene" >Bienvenido</h1>
 
  </div>
  
  <div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>

    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../public/icons/cons1.jpg" class="d-block w-100" alt="...">

      </div>
      <div class="carousel-item">
        <img src="../public/icons/cons_2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../public/icons/cons_3.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../public/icons/c2.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<?php 
}
ob_end_flush();
?>