<?php
// require_once "../../vendor/autoload.php";
require 'dependencias/Exception.php';
require 'dependencias/PHPMailer.php';
require 'dependencias/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// $ip = '160.153.129.238';

function ConnectDB(){
    $bd_dns = 'mysql:host=localhost; dbname=database_storevirtual; charset=utf8';
    // $bd_user = 'storevirtual';
    // $bd_password = '3203825242vale';
    $bd_user = 'root';
    $bd_password = '';
    $bd_options = array(PDO::ATTR_PERSISTENT => true);
    try{
        $bds = new PDO($bd_dns, $bd_user, $bd_password, $bd_options);
        return $bds;
        
    }catch(PDOException $error){
        return $error->getmessage();
    }

}

function Get_Datos(){
    if(isset($_POST['btnOperacion']))
    {

        $alertColor = "";
        $msj= "";
        $codeEncrypt = 0;
        $error = false;
        if($_POST['TxtCorreo']=="")
        {
            $alertColor = "alert alert-warning alert-dismissible fade show"; 
            $msj = "Debe deligenciar un Correo!";
            $error = true;
        }
        else{
            $correo = $_POST['TxtCorreo'];
            $bds = ConnectDB();
            $strSQL = "SELECT Correo,Nombre FROM TblPersonas WHERE Correo ='$correo' ;";
            $persona = $bds->query($strSQL)->fetchAll(PDO::FETCH_NUM);
            if($persona)
            {
                $person = array_shift($persona);
                $alertColor = "alert alert-success alert-dismissible fade show";
                $codeEncrypt = uniqid("vrtualStore");
                $msj = Send_Email($person[0],$person[1],$codeEncrypt); 
                $error = false;  
            }
            else{
                $alertColor = "alert alert-danger alert-dismissible fade show";
                $msj= "¡consulté con el Administrador!";
                $error = true;   
            }
                
        }
        return array($msj,$alertColor,$codeEncrypt,$error);
    }
    
}

function Send_Email($correo,$name,$codeEncrypt){
   
    $mail = new PHPMailer(true);

    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'pruebacorreophp15092020@gmail.com';   //username
        $mail->Password = 'prueba15092020';   //password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465; 

        $mail->setFrom('pruebacorreophp15092020@gmail.com', 'Virtual Store');
        $mail->addAddress($correo, 'Jean');
        
        $mail->isHTML(true);
        
        $mail->Subject = 'Codigo de Seguridad';

        $year = date('y');
        ob_start(); // sirve para crear un bufer que lo que hace es que no permite ejecutar las siguientes lineas de código
        include('../../pages/templates/templateEmail.php');
        $template = ob_get_clean();//obtenemos todo lo que hay dentro del bufer y lo guardamos en una variable
        
        $mail->Body = $template;
        $mail->send();

        return  "Se envió el Código de Verificación!";

    }catch(Exception $e){
        return $e;
    }     
}
// INSERT INTO tblPersonas Procedimiento de almacenado
// $id,$nombre,$apellido,$correo,$direccion,$contacto,$foto,$usuario,$contraseña,$estado
function RegistrarPersona(){
    $bds = ConnectDB();
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    $correo = $_GET['correo'];
    $direccion = $_GET['direccion'];
    $contacto = $_GET['contacto'];
    $foto = $_GET['foto'];
    $usuario = $_GET['usuario'];
    $contraseña = $_GET['contraseña'];
    $estado = 1;
    

    if(isset($_POST['btnGuardar'])){
        if($nombre!=null||$apellido!=null||$correo!=null|| $direccion!=null||$contacto!=null||$foto!=null||$usuario!=null||$contraseña!=null||$estado!=0)
            $sql = "INSERT INTO tblpersonas (Nombre,Apellido,Correo,Direccion,Contacto,Foto),tblLogin(usuario,Contraseña,FKId_TblPersona,FKId_TblEstado)
            values ('".$nombre."','".$apellido."','".$correo."','".$direccion."','".$contacto."','".$foto."','".$usuario."','".$contraseña."''".$estado."')";
                
    }
}


?>