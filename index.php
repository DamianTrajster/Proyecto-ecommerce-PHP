<?php include "cabecera.php" ;  ?>  
<?php include "conexion.php" ;  ?>  
<?php

$objConexion =  new conexion();  
$proyectos=$objConexion->consultar("SELECT * FROM `proyectos`");

?>



<br>
<div class="p-5 bg-light">
     <div class="container">
         <h1 class="display-3">Bienvenidos a GuidoGrayskull</h1>
         <p class="lead">Comercio electrónico</p>
         <hr class="my-2">
         <p>Mas informacion</p>
         
     </div>
 </div>



    <div class="row row-cols-md-3 g-4">

    <?php foreach($proyectos as $proyecto){ ?>
    <div class="col-md-3">
    <div class="card ">
      <img  src="imagenes/<?php echo $proyecto['imagen']; ?>" class="card-img-top" alt="..." height="400">
      <div class="card-body">
        <h5 class="card-title"><?php echo $proyecto['nombre']; ?></h5>
        <p class="card-text"><?php echo $proyecto['descripcion']; ?></p>
        <a class="btn btn-success" href="https://wa.me/+5491124582788?text=+esta_disponible?:<?php echo $proyecto['descripcion'];?>" target="_blank">Comprar</a>
      </div>
    </div>
  </div>

  <?php   }  ?>

  

</div> 


   

    
<?php include "pie.php" ;  ?> 