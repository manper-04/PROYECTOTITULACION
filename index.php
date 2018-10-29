<?php
session_start();
include 'conexion.php';

if($_POST){

  $usuario = $_POST["txtUsuario"];
  $password = $_POST["txtPassword"];
  $usuario = $con->real_escape_string($usuario);
  $password = $con->real_escape_string($password);

  $validacion = mysqli_query($con,"select * from talumnos where usuario='$usuario' and password='$password' and status = 'A' limit 1");
  if(mysqli_num_rows($validacion)>0){
    $validacion = mysqli_fetch_assoc($validacion);
    $_SESSION['4dm1nmus30c4r4c0lusr']= $validacion["idalumno"];
    
   
   
    header("location: archivos.php");

      }

  }

?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php 

    require 'head.php';

    ?>
   

  </head>
  <body>

    <section class="container-fluid  fondo wow fadeInLeft">
     <center><img src="img/fcays.png" width="200px" alt="" class="mb-5 mt-5 wow fadeInDown" data-wow-delay="0.4s"></center>
      <div class="row wow fadeInDown" data-wow-delay="0.4s">
     
    
        <div class="cuadro col-sm-8 offset-sm-2 col-xs-12 col-md-4 offset-md-4 ">
      
          <form action="index.php" method="POST">
         
            
            <div class="form-group">
                <h5 class="text-center" style="font-weight:900">Iniciar sesión</h5>
                <i><h6 class="text-center mb-5" style="font-weight:300">Bienvenido alumno</h6></i>
                
           
              <input type="text" class="form-control mb-3" id="txtUsuario" name="txtUsuario" placeholder="Usuario" required>
              <input type="password" class="form-control mb-3" id="txtPassword" name="txtPassword" placeholder="Contraseña" required>

              <input type="submit"  value="Ingresar" class="btn btn-primary w-100"></input>
            <div id="info" class="mt-4">

            </div>
            </div>
          </form>

        </div>

      </div>
    </section>
  </body>
</html>
