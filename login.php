<?php
  include './assets/PHP/conexion.inc.php';
  $alert = '';
  $msj = '';
  if(isset($_POST['login']) && isset($_POST['user']) && isset($_POST['password']))
  {
    $usuario = $_POST['user'];
    $password = sha1($_POST['password']);
    // echo 'Log in bro '.$usuario.' '.$password;

    // echo sha1('jean123');

    $sqlQuery = "SELECT l.PKid id,p.Nombre name FROM tbllogin l INNER JOIN tblpersonas p ON l.FKId_TblPersona = p.PKId WHERE l.usuario = '".$usuario."' and l.Password = '".$password ."' and l.FKId_TblEstado = 1";
    
    // echo $sqlQuery;
    try {
      //code...
      $bds = ConnectDB();
      $requestData = $bds->query($sqlQuery)->fetchAll(PDO::FETCH_ASSOC);
      if($requestData)
      {
        $arraShift =  array_shift($requestData);
        session_start();
        $_SESSION['login_id'] = $arraShift['id'];
        $_SESSION['usuario_name'] = $arraShift['name'];
        
        //Insertamos en el Historial
        $sql = "INSERT INTO tblhistorial( FKId_TblLogin, Fecha, Hora, FKId_TblTipoHistorial) VALUES (?,CURRENT_DATE,CURRENT_TIME,2)";
        $argumentos = [$arraShift['id']];
        $mysqlSentence = $bds->prepare($sql);
        $mysqlSentence->execute($argumentos);
        header('location:./pages/templates/index.php');
      }
      else{
        $msj = 'Usuario y/o Contraseña Incorrectos';
        $alert = 'alert alert-danger alert-dismissible fade show';       
      }
    } catch (\Throwable $th) {
      //throw $th;
      die($th->getMessage());
    }
  }
?>

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
    <link rel="stylesheet" href="assets/css/estilosLogin.css">
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
                  <div class="<?php echo $alert ?>" role="alert">
                          <p><?php echo $msj ?></p> 
                  </div>
                <div class="BRAND-LOGO">
                  <h1>¡Bienvenido!</h1>
                </div>
                <h6 class="font-weight-light">Inicia Sesión para Continuar.</h6>
                <form method="POST" action="login.php" class="pt-3">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg"  name="user" id="user" placeholder="Usuario" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Contraseña" value="">
                  </div>
                  <div class="mt-3">
                    <button type="submit" name="login" id="login" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="#">Iniciar Sesión</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                      <a href="./assets/PHP/operaciones.RP.php" class="auth-link text-black">¿Olvidaste Tu contraseña (⊙_⊙;)?</a>
                    </div>
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