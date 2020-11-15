<?php
echo 'hola mundo';
  if(!isset($_POST['btnGuardarConfiguracion']))
  {
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $correo =  $_POST['correo'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $contacto = $_POST['contacto'] ?? '';

    echo $nombre.$apellido.$correo.$direccion.$contacto;
  }
?>

<div class="auth-form-light text-center p-5 col-8 config-form">
  <div class="BRAND-LOGO">
    <h1>¡Configuración de Usuario!</h1>
  </div>
  <h6 class="font-weight-light">Sólo sigue los siguientes pasos.</h6>
  <form class="pt-3" method="POST" action="index.php#ConfiguracionUser.php">
    <div class="form-group">

      <div class="image-preview" id="imagePreview">
        <img src="" class="image--preview__image" alt="Image Preview">
        <span class="Image-preview__default-text">Image Preview</span>
      </div>
        
        <input type="file" name="inpuFile" id="inpuFile">   
        </input>
    </div>
    <div class="form-group">
      <input type="text" class="form-control form-control-lg" name="nombre" placeholder="Nombre">
    </div>
    <div class="form-group">
      <input type="text" class="form-control form-control-lg" name="apellido" placeholder="Apellido">
    </div>
    <div class="form-group">
      <input type="email" class="form-control form-control-lg" name="correo" placeholder="Correo">
    </div>
    <div class="form-group">
      <input type="text" class="form-control form-control-lg" name="direccion" placeholder="Direccion">
    </div>
    <div class="form-group">
      <input type="text" class="form-control form-control-lg" name="contacto" placeholder="Contacto">
    <div class="mb-4">
      <div class="form-check">
        <label class="form-check-label text-muted">
          <input type="checkbox" class="form-check-input">Recuerde Guardar Su Información </label>
      </div>
    </div>
    <div class="mt-3">
      <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" name="btnGuardarConfiguracion" id="btnGuardarConfiguracion" >Guardar</button>
    </div>
  </form>
</div>