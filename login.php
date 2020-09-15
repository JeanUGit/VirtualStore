<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Iniciar Sesión</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
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
                  <h1>¡Bienvenido!</h1>
                </div>
                <h4>¡Hola! Empecemos!</h4>
                <h6 class="font-weight-light">Inicia Sesión para Continuar.</h6>
                <form class="pt-3">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Usuario">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Contraseña">
                  </div>
                  <div class="mt-3">
                    <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="./pages/templates/index.php">Iniciar Sesión</a>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                      <a href="./assets/FuncionalidadesPHP/operaciones.RP.php" class="auth-link text-black">¿Olvidaste Tu contraseña (⊙_⊙;)?</a>
                    </div>
                  </div>
                  <div class="mb-2">
                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="mdi mdi-facebook mr-2"></i>Facebook</button>
                  </div>
                  <div class="mb-2">
                    <button type="button" class="btn btn-block btn-facebook auth-form-btn" style="background-color: rgb(193, 59, 44)">
                      <i class="mdi mdi-gmail mr-2"></i>Gmail</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> ¿No tienes Una Cuenta? <a href="./pages/templates/register.html" class="text-primary">Registrarse</a>
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
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>