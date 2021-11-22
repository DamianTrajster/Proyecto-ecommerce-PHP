<?php
    session_start();
   /* if(isset($_SESSION['usuario'])!= "damian"){
        header("location:login.php");  
    }
 */ 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guido Grayskull</title>


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>


<div class="container">
    <a href="index.php">Inicio</a> |
    
   

    <?php if(isset($_SESSION['usuario'])!= "guidograyskull"){ ?>
        <a href="login.php">login</a> 
       
    <?php }else {?>
        <a href="portafolio.php">Administracion</a>
        <a href="cerrar.php">Cerrar</a> 
     <?php  }?>
   
    

   