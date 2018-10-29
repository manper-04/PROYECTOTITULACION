<?php
session_start();
if(@!$_SESSION['4dm1nmus30c4r4c0lusr']){

    header("location:index.php");
}

include 'conexion.php';

$id = $_GET['id'];
$documento = $_GET['documento'];

$archivo = mysqli_fetch_assoc(mysqli_query($con,"select * from tarchivos where idarchivos = '" . $id ."'"));
// $sql_unico = 'select * from tarchivos where idarchivo = "' . $id .'"';
// $gsent_unico = $pdo->prepare($sql_unico);
// $gsent_unico->execute(array($id));
// $resultado_unico = $gsent_unico->fetch();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   
   <?php

    header('content-type: application/pdf');
    readfile('archivos/' . $documento);
   ?>
   
    
</body>
</html>