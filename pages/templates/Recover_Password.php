
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Recuperar Cuenta</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/estilosRecover.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="BRAND-LOGO">
                  <h1>¡Recuperame!</h1>
                </div>
                <h4>¡Sigue estos pasos!</h4>
                <div class="buscarCorreo" id="buscarCorreo">
                  <form class="pt-3" method="POST" action="operaciones.RP.php" >
                    <div class="<?php echo $alert ?>" role="alert">
                       <p><?php echo $msj ?></p> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      </button>
                    </div>
                    <div class="form-group">
                      <input type="text" id="TxtCorreo" name="TxtCorreo" value="" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="<?php echo  $placeHolderTxt; ?>">
                    </div>
  
                    <div class="mt-3">
                      <button type=submit  name="btnOperacion" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="<?php echo $buttonValue; ?>"> <?php echo $buttonValue; ?>  </button>
                    </div>
                    <div class="text-center mt-4 font-weight-light"> ¿Recordaste Tu Cuenta? <a href="../../login.php" class="text-primary">IniciarSesión</a>
                    </div>
                  </form>
                </div>


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
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/recovery.js"></script>
    <!-- endinject -->
  </body>
</html>