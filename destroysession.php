<?php
session_start();
if($_SESSION['4dm1nmus30c4r4c0lusr']){
    session_destroy();
    header("location:index.php");
}else{
    header("location:index.php");
}


?>