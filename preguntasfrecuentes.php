<?php
session_start();
if(@!$_SESSION['4dm1nmus30c4r4c0lusr']){

    header("location:index.php");
}
include 'conexion.php';
$alumno = mysqli_fetch_assoc(mysqli_query($con,"select * from talumnos where idalumno = '".$_SESSION["4dm1nmus30c4r4c0lusr"]."'"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php 

require 'head.php';

?>
</head>
<body>
<nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color lighten-1">
<i class="fas fa-align-left mr-3" style="color:white"></i> <a class="navbar-brand" href="archivos.php" style="text-decoration:none;color:white;font-weight:600;">Titulacion Web</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-5" aria-controls="navbarSupportedContent-5" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse show" id="navbarSupportedContent-5" style="">
        <ul class="navbar-nav mr-auto">
         
          <li class="nav-item ">
            <a class="nav-link waves-effect waves-light" style="font-weight:300" href="archivos.php">Agregar documentos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect waves-light" style="font-weight:300" href="preguntasfrecuentes.php">Preguntas Frecuentes</a>
          </li>
          
        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
          <li class="nav-item">
            <a class="nav-link waves-effect waves-light">1
              <i class="fa fa-envelope"></i>
            </a>
          </li>
          <li class="nav-item avatar dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" width="25px"class="rounded-circle z-depth-0" alt="avatar image">
              <?php echo  $alumno["nombre"]; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
              <!-- <a class="dropdown-item waves-effect waves-light" href="#">Action</a>
              <a class="dropdown-item waves-effect waves-light" href="#">Another action</a> -->
              <a class="dropdown-item waves-effect waves-light" onClick="return confirm('Deseas cerrar sesion?');" href="destroysession.php">Cerrar Sesion</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container wow fadeInLeft">
        <div class="row">
            <div class="col-sm-12 mt-5">
                <h1 class="text-primary">¿Como subir mis documentos?</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet sunt laboriosam impedit enim doloremque eveniet nisi facilis voluptatum excepturi necessitatibus accusamus sequi non harum nulla quibusdam ea, eligendi rerum soluta.</p><br>

                <h1 class="text-primary">¿Cuanto tiempo tarda el tramite?</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet sunt laboriosam impedit enim doloremque eveniet nisi facilis voluptatum excepturi necessitatibus accusamus sequi non harum nulla quibusdam ea, eligendi rerum soluta.</p><br>

                <h1 class="text-primary">¿Es seguro?</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet sunt laboriosam impedit enim doloremque eveniet nisi facilis voluptatum excepturi necessitatibus accusamus sequi non harum nulla quibusdam ea, eligendi rerum soluta.</p><br>
            </div>
        </div>
    
    
    </div>
    
</body>
</html>