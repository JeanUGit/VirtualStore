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

        
        try {
          //code...
          $sql = "INSERT INTO tblpersonas (PKId,Nombre,Apellido,Correo,Direccion,Contacto,Foto) values ('".$documento."','".$nombre."','".$apellido."','".$correo."','".$direccion."','".$contacto."','".$foto."')";
          $sql2 = "INSERT INTO tblLogin(usuario,Contraseña,FKId_TblPersona,FKId_TblEstado) values ('".$usuario."','".$contraseña."','".$documento."','".$estado."')";
          $dato1 = $bds-> query($sql);
          $dato2 = $bds-> query($sql2);
        } catch (\Throwable $th) {
          die( $th);
          //throw $th;
        }
      }
      else{
        echo 'Men ninguna dato vacio';
      }
  }
  include '../../pages/templates/register.php';
?>