<?php 

  include '../../assets/PHP/conexion.inc.php';

    $bds = ConnectDB();
    $documento = $_POST['documento'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $correo =$_POST['correo'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $contacto = $_POST['contacto'] ?? ''; 
    $foto = $_POST['foto'] ?? '';
    $usuario = $_POST['usuario'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';
    $estado = 1;


    if(isset($_POST['btnGuardar'])){
      if($documento!="" && $nombre!="" && $apellido!="" && $correo!="" && $direccion!="" && $contacto!="" && $usuario!="" && $contraseña!=""){
          // Get image name
          $image = $_FILES['image']['name'];
          
          // image file directory
          $target = "./images/".basename($image);
                
          try {
            //code...
            $sql = "INSERT INTO tblpersonas (PKId,Nombre,Apellido,Correo,Direccion,Contacto,Foto) values ('".$documento."','".$nombre."','".$apellido."','".$correo."','".$direccion."','".$contacto."','".$image."')";
            $sql2 = "INSERT INTO tblLogin(usuario,Contraseña,FKId_TblPersona,FKId_TblEstado) values ('".$usuario."','".$contraseña."','".$documento."','".$estado."')";
            $dato1 = $bds-> query($sql);
            $dato2 = $bds-> query($sql2);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
              $msj = 0 ;
            }else{
              $msj = 1;
            }
          } catch (\Throwable $th) {
          die( $th);
          //throw $th;
        }
      }
      else{
        echo 'Men ninguna dato vacio';
      }
  }

  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Crear Cuenta</title>
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
                  <h1>¡Crear Cuenta!</h1>
                </div>
                <h4>¿Primera Vez?</h4>
                <h6 class="font-weight-light">Sólo sigue los siguientes pasos.</h6>
                <form class="pt-3" method="POST" action="register.php">
                  <div class="form-group">
                    <label id="lblFoto" for="foto">    
                      <i for="foto" class="material-icons">
                        add_photo_alternate
                      </i>
                      Foto De Perfil
                    </label>
                    <input type="file" class="form-control form-control-lg" id="foto" onchange="filePreview(this);" />
          
                  </div>
                  <div class="form-group" id="imagePreview">
                   
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="documento" placeholder="Documento">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="nombre" placeholder="Nombre">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="apellido" placeholder="Apellido">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="correo" placeholder="Correo">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="direccion" placeholder="Dirección" >
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="contacto" placeholder="Contacto">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="usuario" placeholder="Usuario">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="contraseña" placeholder="Contraseña">
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input">Estoy de acuerdo con los terminos </label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" id="btnGuardar" name ="btnGuardar" >Guardar</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> ¿Ya tienes Una Cuenta? <a href="../../login.php" class="text-primary">IniciarSesión</a>
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