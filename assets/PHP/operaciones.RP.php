<?php
include 'conexion.inc.php';
    $buttonValue = 'Buscar Cuenta';
    $placeHolderTxt = 'Correo de Usuario';
    session_start();
    $msj = '';
    $alert='';
    $codeEncrypt = '';
    $error = false;
    $logID = -1;

    if(isset($_POST['btnOperacion'])){
        $btnOperacion = $_POST['btnOperacion'];
        switch ($btnOperacion) {
            case 'Buscar Cuenta':
                echo 'entro a  buscar correo';
                $datos = Get_Datos();
                $msj = $datos[0];
                $alert = $datos[1];
                $_SESSION['codigo'] =  $datos[2];
                $error = $datos[3];
                $_SESSION['logId'] = $datos[4];
                echo $alert.'-'.$codeEncrypt.'-'.$error.'-'.$logID;

                if(!$error){
                    $buttonValue = 'Validar Código';
                    $placeHolderTxt = 'Ingrese El Código de Verificación';
                }
                break;
            case 'Validar Código':
                if($_POST['TxtCorreo'] !="" || $_POST['TxtCorreo'] != null ){
                    if( $_SESSION['codigo']  == $_POST['TxtCorreo'])
                    {
                        $buttonValue = 'Crear Nueva';
                        $placeHolderTxt = 'Crear Nueva Contraseña';
                    }
                    else{
                        $msj = 'Código de verificación Erroneo';
                        $alert = 'alert alert-danger alert-dismissible fade show';
                        // header('location:../../login.php');
                    }
                }
                else{
                    $msj = 'No ingresaste Un código';
                    $alert = 'alert alert-warning alert-dismissible fade show';
                }
                break;

            case 'Crear Nueva':
                if($_POST['TxtCorreo'] !="" || $_POST['TxtCorreo'] != null){
                   $requestUpdatedPassword = Recover_Password(sha1($_POST['TxtCorreo']), $_SESSION['logId']);
                   if($requestUpdatedPassword)
                   {
                        $msj = 'Contraseña Actualizada';
                        $alert = 'alert alert-success alert-dismissible fade show';
                        $buttonValue = 'Buscar Cuenta';
                        $placeHolderTxt = 'Correo de Usuario';
                   }else{
                        $msj = 'Hubo un Problema';
                        $alert = 'alert alert-danger alert-dismissible fade show';
                        $buttonValue = 'Buscar Cuenta';
                        $placeHolderTxt = 'Correo de Usuario';
                   }
                }
                else{
                    $msj = 'No ingresaste Un código';
                    $alert = 'alert alert-warning alert-dismissible fade show';
                }
                break;
        
            default:
                # code...
                break;
        }
    }
   
    include '../../pages/templates/Recover_Password.php';

?>
