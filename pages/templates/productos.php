<?php
// include '../../PHP/conexion.inc.php';
include '../../assets/PHP/conexion.inc.php';
$bds_connection = ConnectDB();

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
                <div class="BRAND-LOGO">
                  <h1>¡Productos!</h1>
                </div>
                <form class="pt-3">
                <div class="form-group">
                    <label id="lblFoto" for="foto">    
                      <i for="foto" class="material-icons">
                        add_photo_alternate
                      </i>
                      Foto De Producto
                    </label>
                    <input type="file" class="form-control form-control-lg" id="foto" change="filePreview(this);" />
          
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="nombre" placeholder="Nombre del producto">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Cantidad">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Precio de venta">
                  </div>
                  <div class="form-group">
                   <select name="Categoria" id="Categoria" class="form-control form-control-lg">
                       <?php foreach ($requestData  as $data):?>
                        <option value="echo <?php echo  $data[0] ?>"> <?php echo  $data[1] ?> </option>
                       <?php endforeach;?>
                   </select>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Documento del Vendedor">
                  </div>
                  <div class="mt-3">
                    <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="index.php">Guardar</a>
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