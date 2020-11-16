 <?php
  session_start();
  include '../../assets/PHP/conexion.inc.php';
  $name = '';
  if( $_SESSION['login_id'] == null || $_SESSION['login_id'] == ""){
    echo '¡Sin Autorización!';
    die();
  }
  else{  
    if(isset($_POST['close'])){
      session_destroy();
      header('location:../../login.php');
    }else{
      $name =  $_SESSION['usuario_name'];
      echo $_SESSION['usuario_photo'];
      $foto =  $_SESSION['usuario_photo'] == "" ? 'avatar.png' : $_SESSION['usuario_photo'];
    //   echo $foto;
      $bds = ConnectDB();
      $sql = "SELECT prod.Nombre nombre, prod.Cantidad cantidad, prod.Precio precio, prod.Foto foto, prod.Fecha fecha, cat.Descripcion descripcion, per.Nombre propietario, per.Contacto celular FROM tblproductos prod inner join tblcategoria cat on cat.PKid = prod.FKId_TblCategoria inner join tblpersonas per on per.PKId = prod.FKId_TblPersona_Owner where prod.Cantidad >= 1 ORDER BY prod.Fecha DESC ";  
      $request = $bds->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
  }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Resumen</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/css/estilosConfugracion.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/estilosRecover.css" >
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.php -->
        <?php include('../../partials/_navbar.php')?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include('../../partials/_sidebar.php')?>
            <!-- partial -->
            <!-- main-panel ends -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div id="MainContainer" class="col-12" >
                        <?php foreach ($request as $datos ): ?>
                            <div class="card mb-3" style="max-width: 700px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <?php $productImage  = $datos['foto'] == "" || $datos['foto'] == null  ? 'defaultProduct.png': $datos['foto'] ; ?>
                                        <img src="images/<?php echo $productImage ?> " class="card-img" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php  echo $datos['nombre']  ?></h5>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Precio: <?php echo $datos['precio'] ?> </li>
                                                <li class="list-group-item">Categoria: <?php echo $datos['descripcion'] ?> </li>
                                                <li class="list-group-item">Cantidad: <?php echo $datos['cantidad'] ?> </li>
                                                <li class="list-group-item">Propietario:  <?php echo $datos['propietario'] ?> </li>
                                                <li class="list-group-item">Celular: <?php echo $datos['celular'] ?> </li>
                                            </ul>
                                            <p class="card-text"><small class="text-muted"> <?php echo $datos['fecha'] ?> </small></p>
                                            <a  class="btn btn-primary">Comprar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php include '../../partials/_footer.php' ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <!--routes-->
    <script src="../../assets/js/routes.js"></script>
    <!--End routes-->
    <!--Chart-->
    <script src="../../assets/js/chart.js"></script>
    <script src="../../assets/js/configuracion.js"></script>
    <script src="../../assets/js/chat-popup.js"></script>
    <!--End chart-->
</body>

</html>