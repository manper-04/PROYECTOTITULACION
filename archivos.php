<?php
session_start();
if(@!$_SESSION['4dm1nmus30c4r4c0lusr']){

    header("location:index.php");
}
include 'conexion.php';
$alumno = mysqli_fetch_assoc(mysqli_query($con,"select * from talumnos where idalumno = '".$_SESSION["4dm1nmus30c4r4c0lusr"]."'"));

$archivo1 = mysqli_fetch_assoc(mysqli_query($con,"select * from tarchivos where idalumno = '".$alumno["idalumno"]."' "));

if(@$_POST["accion"]=="agregarActa"){
    $nombre = $archivo1["idalumno"].$_FILES['archivo']['name'];
    $ruta = $_FILES['archivo']['tmp_name'];
    move_uploaded_file($ruta, "archivos/" . $nombre);
    


    $agregar = mysqli_query($con,"update tarchivos set actanacimiento = '" . $nombre . "' where idalumno = '".$alumno["idalumno"]."' ");

    header("location:archivos.php");

    // $sql_agregar = 'insert into tarchivos (titulo,descripcion,archivo) VALUES (?,?,?)';
    // $sentencia_agregar = $pdo->prepare($sql_agregar);
    // $sentencia_agregar->execute(array($titulo,$descripcion,$nombre));

}

if(@$_POST["accion"]=="agregarBachillerato"){
    
    $nombre = $archivo1["idalumno"].$_FILES['archivo']['name'];
    $ruta = $_FILES['archivo']['tmp_name'];
    move_uploaded_file($ruta, "archivos/" . $nombre);
    


    $agregar = mysqli_query($con,"update tarchivos set cerbachillerato = '" . $nombre . "' where idalumno = '".$alumno["idalumno"]."' ");

    header("location:archivos.php");

    // $sql_agregar = 'insert into tarchivos (titulo,descripcion,archivo) VALUES (?,?,?)';
    // $sentencia_agregar = $pdo->prepare($sql_agregar);
    // $sentencia_agregar->execute(array($titulo,$descripcion,$nombre));

}

if(@$_POST["accion"]=="agregarCerprofesional"){
    $nombre = $archivo1["idalumno"].$_FILES['archivo']['name'];
    $ruta = $_FILES['archivo']['tmp_name'];
    move_uploaded_file($ruta, "archivos/" . $nombre);
    


    $agregar = mysqli_query($con,"update tarchivos set cerprofesional = '" . $nombre . "' where idalumno = '".$alumno["idalumno"]."' ");

    header("location:archivos.php");

    // $sql_agregar = 'insert into tarchivos (titulo,descripcion,archivo) VALUES (?,?,?)';
    // $sentencia_agregar = $pdo->prepare($sql_agregar);
    // $sentencia_agregar->execute(array($titulo,$descripcion,$nombre));

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 

    require 'head.php';

    ?>

    <title>Document</title>
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

<script>

$(document).ready(function() {

    // Bloque de codigo para deshabilitar el boton de enviar en caso de que no haya archivo cargado en el archivo "archivos.php"
    
    $(':input[type="submit"]').prop('disabled', true);
    $(':input[type="file"]').change(function() {
        if($(this).val() != '') { 
            $(':input[type="submit"]').prop('disabled', false);
        }
    });
    });

</script>


    <div class="container ">
        <div class="row">
                <div class="col-sm-3 mt-5">
                        <h6 style="font-weight:600">Historial del Trámite</h6>
                        <p>Ve el progreso de la revision de documentos</p>
                </div>

                <div class="col-sm-5 mt-5"><br>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-sm-4 mt-5 ">
                       <button class="btn btn-light" style="border-radius:30px;">TODOS</button>
                       <button class="btn btn-primary" style="border-radius:30px;">PENDIENTES</button>
                </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mt-4">
                <p style="font-weight:600">Para agregar tus documentos deben de estar previamente escaneados</p>
            </div>
        </div>
    
        <div class="row mt-3">
            <div class="col-sm-12 col-md-4 col-xs-12">
                    <div class="card" >
                        <div class="view overlay" >
                            <?php 
                                if($archivo1["actanacimiento"] != ""){
                            ?>
                            <iframe src="archivos/<?php echo $archivo1["actanacimiento"]; ?> " frameborder="0" width="100%" height="200px" ></iframe>

                            <?php
                                } 
                                else{
                                    echo "<img src='img/default.jpg'style='width:100%' height='200px'>";
                                }
                                ?>     
                         </div>

                        <div class="card-body">

                        <!-- Title -->
                        <center><h4 class="card-title">Acta de Nacimiento</h4></center>
                      
                        <?php 
                        if($archivo1["actanacimiento"] != ""){
                        echo '<center><p>AGREGADO</p></center>';

                        

                        

                        ?>
                        <!-- Button -->
                        <a href="archivo.php?id=<?php echo $archivo1["idarchivos"];?>&documento=<?php echo $archivo1["actanacimiento"];?> " target="_blank"><button type="button"  class="btn btn-info float-left" style="border-radius:30px;"><i class="fas fa-eye mr-2" style="font-size:15px;"></i>ver</button></a>
                        <button type="button" class="btn btn-info float-right" style="border-radius:30px;"><i class="fas fa-edit mr-2" style="font-size:15px;"></i>Editar</button>
                        <?php 

                        } else{
                            echo '<center><p>PENDIENTE</p></center>';
                            echo "<center><button type='button' class='btn btn-primary' 
                            data-toggle='modal' data-target='#agregarActa' style='border-radius:30px;'><i class='fas fa-edit ' style='font-size:15px;'></i>Agregar</button></center>";
                        }
                        
                        ?>
                        <!-- Button trigger modal -->


                        <!-- Modal -->
                        <div class="modal fade" id="agregarActa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Subir Acta de Nacimiento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="accion" value="agregarActa">
                                            <input type="file" class="form-control mt-3 mb-3" name="archivo" id="archivo">
                                            <input type="submit" class="btn btn-primary mt-3 mb-3 w-100" value="Enviar"><br>
                                        

                                    </form>
                            </div>
                            <div class="modal-footer">
                                
                            </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
            </div> 
            <div class="col-sm-12 col-md-4 col-xs-12">
                    <div class="card" >
                        <div class="view overlay" >
                            <?php 
                                if($archivo1["cerbachillerato"] != ""){
                            ?>
                            <iframe src="archivos/<?php echo $archivo1["cerbachillerato"]; ?> " frameborder="0" width="100%" height="200px" ></iframe>

                            <?php
                                } 
                                else{
                                    echo "<img src='img/default.jpg'style='width:100%' height='200px'>";
                                }
                                ?>     
                         </div>

                        <div class="card-body">

                        <!-- Title -->
                        <center><h4 class="card-title">Certificado de Bachillerato</h4></center>
                        <!-- Text -->
                        
                        <?php 
                        if($archivo1["cerbachillerato"] != ""){
                        echo '<center><p>AGREGADO</p></center>';

                       

                        

                        ?>
                        <!-- Button -->
                        <a href="archivo.php?id=<?php echo $archivo1["idarchivos"];?>&documento=<?php echo $archivo1["cerbachillerato"];?> " target="_blank"><button type="button" class="btn btn-info float-left" style="border-radius:30px;"><i class="fas fa-eye mr-2" style="font-size:15px;"></i>ver</button></a>
                        <button type="button" class="btn btn-info float-right" style="border-radius:30px;"><i class="fas fa-edit mr-2" style="font-size:15px;"></i>Editar</button>
                        <?php 

                        } else{
                            echo '<center><p>PENDIENTE</p></center>';
                            echo "<center><button type='button' class='btn btn-primary '
                            data-toggle='modal' data-target='#agregarBachillerato' style='border-radius:30px;'><i class='fas fa-edit ' style='font-size:15px;'></i>Agregar</button></center>";
                        }
                        
                        ?>
                        <!-- Modal -->
                        <div class="modal fade" id="agregarBachillerato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Subir Certificado Bachillerato</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="accion" value="agregarBachillerato">
                                            <input type="file" class="form-control mt-3 mb-3" name="archivo" id="archivo">
                                            <input type="submit" class="btn btn-primary mt-3 mb-3 w-100" value="Enviar"><br>
                                        

                                    </form>
                            </div>
                            <div class="modal-footer">
                                
                            </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
            </div> 
            <div class="col-sm-12 col-md-4 col-xs-12">
                    <div class="card" >
                        <div class="view overlay" >
                            <?php 
                                if($archivo1["cerprofesional"] != ""){
                            ?>
                            <iframe src="archivos/<?php echo $archivo1["cerprofesional"]; ?> " frameborder="0" width="100%" height="200px" ></iframe>

                            <?php
                                } 
                                else{
                                    echo "<img src='img/default.jpg'style='width:100%' height='200px'>";
                                }
                                ?>     
                         </div>

                        <div class="card-body">

                        <!-- Title -->
                        <center><h4 class="card-title">Certificado Profesional</h4></center>
                        <!-- Text -->
                        
                        <?php 
                        if($archivo1["cerprofesional"] != ""){
                        echo '<center><p>AGREGADO</p></center>';

                       

                        

                        ?>
                        <!-- Button -->
                        <a href="archivo.php?id=<?php echo $archivo1["idarchivos"];?>&documento=<?php echo $archivo1["cerprofesional"];?>" target="_blank"><button type="button" class="btn btn-info float-left" style="border-radius:30px;"><i class="fas fa-eye mr-2" style="font-size:15px;"></i>ver</button></a>
                        <button type="button" class="btn btn-info float-right" style="border-radius:30px;"><i class="fas fa-edit mr-2" style="font-size:15px;"></i>Editar</button>
                        <?php 

                        } else{
                            echo '<center><p>PENDIENTE</p></center>';
                            echo "<center><button type='button' class='btn btn-primary '
                            data-toggle='modal' data-target='#agregarCerprofesional' style='border-radius:30px;'><i class='fas fa-edit ' style='font-size:15px;'></i>Agregar</button></center>";
                        }
                        
                        ?>
                         <!-- Modal -->
                         <div class="modal fade" id="agregarCerprofesional" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Subir Certificado Profesional</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="accion" value="agregarCerprofesional">
                                            <input type="file" class="form-control mt-3 mb-3" name="archivo" id="archivo">
                                            <input type="submit" class="btn btn-primary mt-3 mb-3 w-100" value="Enviar"><br>
                                        

                                    </form>
                            </div>
                            <div class="modal-footer">
                                
                            </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
            </div> 
        </div>
    </div>
</body>
</html>