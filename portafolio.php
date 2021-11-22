<?php include "cabecera.php" ;  ?>  
<?php include "conexion.php" ;  ?>  


<?php 

if(isset($_SESSION['usuario'])!= "damian"){
    header("location:login.php");  
}


if($_POST){

    //leer archivos
    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];

    //fecha para el archivo
    $fecha= new DateTime();
    $imagen=$fecha->getTimestamp()."_".$_FILES['archivo']['name'];

    //adjuntar imagen
    $imagen_temporal=$_FILES['archivo']['tmp_name'];


    move_uploaded_file($imagen_temporal,"imagenes/".$imagen);


    //cargar archivos
    $objConexion =  new conexion();  

    $sql="INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion'); ";

    $objConexion->ejecutar($sql);


    //redirecionamiento
    header("location:portafolio.php");  




}


//borrar un registro e imagen
if($_GET){
    //DELETE FROM `proyectos` WHERE `proyectos`.`id` = 2 

        $id=$_GET['borrar'];
    $objConexion =  new conexion();  

    $imagen=$objConexion->consultar("SELECT imagen FROM `proyectos` WHERE id=".$id );

    unlink("imagenes/".$imagen[0]['imagen']);

    $sql="DELETE FROM `proyectos` WHERE `proyectos`.`id`=".$id;
    $objConexion->ejecutar($sql);

     //redirecionamiento
     header("location:portafolio.php");  


}

$objConexion =  new conexion();  
$proyectos=$objConexion->consultar("SELECT * FROM `proyectos`");



?>  


   
<br>


<div class="container  mt-5">
    <div class="row">
        <div class="col-md-6">
        <div class="card">
    <div class="card-header">
       Productos a cargar
    </div>
    <div class="card-body">
        
    <form action="portafolio.php" method="post" enctype="multipart/form-data">
    Nombre del producto: <input required class="form-control" type="text" name="nombre" id="">
    <br>
    Imagen del producto: <input  required class="form-control" type="file" name="archivo" id="">
    <br>
    Descripcion:
    <br>
    <textarea  required class="form-control" id=""  rows="3" name="descripcion"></textarea>
    <br>
    <input class="btn btn-success" type="submit" value="Enviar Proyecto">
    </form>
    </div>
    <div class="card-footer text-muted">
       
    </div>
</div>

        </div>

    <div class="col-md-6">
        <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Descripcion</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>

    <?php foreach($proyectos as $proyecto){ ?>
         <tr>
            <td><?php echo $proyecto['id']; ?></td>
            <td><?php echo $proyecto['nombre']; ?></td>
            <td>
               <img width="100" src="imagenes/<?php echo $proyecto['imagen']; ?>" alt=""> 
           
        
        </td>
            <td><?php echo $proyecto['descripcion']; ?></td>
            <td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>">Eliminar</a></td>
        </tr>

    <?php   }  ?>
       
    </tbody>
</table>

            </div>
        
    </div>
</div>






<?php include "pie.php" ;  ?> 