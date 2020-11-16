<?php
// include '../../PHP/conexion.inc.php';
include '../../assets/PHP/conexion.inc.php';
$bds_connection = ConnectDB();

$msj = '';
$alert = '';

function fetchCategoryData($bds){
  $sql = "SELECT * FROM tblcategoria";
  try {
    //code...
    $categorias = $bds->query($sql)->fetchAll(PDO::FETCH_NUM);
    return $categorias;
  } catch (\Throwable $th) {
    //throw $th;
    return $th;
  }
  
}

function uploadProductFile($bds){

 try {
   //code...
      // Initialize message variable
    $msj = -1;

    // If upload button is clicked ...

      // Get image name
      $image = $_FILES['image']['name'];

      // image file directory
      $target = "./images/".basename($image);

      // execute query
      $nombre =  $_POST['nombre'];
      $cantidad = $_POST['cantidad'];
      $precio = $_POST['precio']; 
      $categoria = $_POST['Categoria']; 
      $documento =  $_POST['documento'];
      $sql = "INSERT INTO tblproductos(Nombre, Cantidad, Precio, Fecha, Foto, FKId_TblCategoria, FKId_TblEstado, FKId_TblPersona_Owner) VALUES (?,?,?,CURRENT_DATE,?,?,1,?)";
      $arguments = [$nombre,$cantidad,$precio,$image,$categoria,$documento];
      $prepareData = $bds->prepare($sql);
      $result =   $prepareData->execute($arguments);
      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msj = 0 ;
      }else{
        $msj = 1;
      }
      return $msj;
 } catch (\PDOException $th) {
   //throw $th;
   return $msj;
 }
}

if(isset($_POST['upload']))
{
  if ( isset($_POST['nombre']) && isset($_POST['cantidad']) &&  isset($_POST['precio']) && isset($_POST['Categoria']) && isset($_POST['documento']) ) {
    if(uploadProductFile($bds_connection) == 0){
      $msj = 'Productos Guardado Con Exito';
      $alert = 'alert alert-success alert-dismissible fade show';
      header('location:index.php');
    }
    else{
      $msj = 'Hubieron Problemas al Cargar Los Archivos';
      $alert = 'alert alert-danger alert-dismissible fade show';
    }
  
  }
  else{
    $msj = 'Debe llenar todos los campos';
    $alert = 'alert alert-warning alert-dismissible fade show';
  }  
}


$requestData = fetchCategoryData($bds_connection);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agregar Productos</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/estilosRecover.css">
    <link rel="stylesheet" href="../../assets/css/estilosRegistro.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="auth-form-light text-left p-5">
                                <div class="<?php echo $alert ?>" role="alert">
                                    <p><?php echo $msj ?></p>
                                </div>
                            </div>
                            <div class="BRAND-LOGO">
                                <h1>¡Productos!</h1>
                            </div>
                            <form class="pt-3" method="POST" action="productos.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label id="lblFoto" for="image">
                                        <i for="foto" class="material-icons">
                                            add_photo_alternate
                                        </i>
                                        Foto De Producto
                                    </label>
                                    <input type="file" name="image" class="form-control form-control-lg" id="image" />
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="nombre"
                                        placeholder="Nombre del producto">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="cantidad"
                                        placeholder="Cantidad">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="precio"
                                        placeholder="Precio de venta">
                                </div>
                                <div class="form-group">
                                    <select name="Categoria" id="Categoria" class="form-control form-control-lg">
                                        <?php foreach ($requestData  as $data):?>
                                        <option value="<?php echo  $data[0] ?>"> <?php echo  $data[1] ?> </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="documento"
                                        placeholder="Documento del Vendedor">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="upload"
                                        class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"
                                        href="index.php">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="https://ajax.googleapis.com/ajax/libs/d3js/6.2.0/d3.min.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/registro.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
</body>

</html>