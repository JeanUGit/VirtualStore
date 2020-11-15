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
        $codeEncrypt = "";
        $error = false;
        $loginId = -1;
        if($_POST['TxtCorreo']=="")
        {
            $alertColor = "alert alert-warning alert-dismissible fade show"; 
            $msj = "Debe deligenciar un Correo!";
            $error = true;
        }
        else{
            $correo = $_POST['TxtCorreo'];
            $bds = ConnectDB();
            $strSQL = "SELECT people.Correo, people.Nombre, login.PKid  FROM TblPersonas people inner join tbllogin login on people.PKId = login.FKId_TblPersona WHERE Correo ='$correo';";
            
            $persona = $bds->query($strSQL)->fetchAll(PDO::FETCH_NUM);
            if($persona)
            {
                $person = array_shift($persona);
                $alertColor = "alert alert-success alert-dismissible fade show";
                $codeEncrypt = uniqid("vrtualStore");
                $loginId = $person[2];
                $error = false;
                $msj = Send_Email($person[0],$person[1],$codeEncrypt); 
            }
            else{
                $alertColor = "alert alert-danger alert-dismissible fade show";
                $msj= "¡consulté con el Administrador!";
                $error = true;   
            }
                
        }
        return array($msj,$alertColor,$codeEncrypt,$error,$loginId);
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

function Recover_Password($newPassword, $usuarioId){
    try {
        //code...
        $sql1 = "UPDATE tbllogin SET Password = '".$newPassword."' WHERE tbllogin.PKid = ?";
        $sql2 = "INSERT INTO tblhistorial( FKId_TblLogin, Fecha, Hora, FKId_TblTipoHistorial) VALUES (?,CURRENT_DATE,CURRENT_TIME,1)";
        $bds = ConnectDB();
        $resquestUpdate = $bds->prepare($sql1);
        $executing = $resquestUpdate->execute([$usuarioId]);

        $resquestUpdate = $bds->prepare($sql2);
        $executing = $resquestUpdate->execute([$usuarioId]);
        
        return $executing;

    } catch (\Throwable $th) {
        //throw $th;
        return 'Conflicto en la base de datos'.$th->getMessage();
    }
}

function GuardarConfiguracion(){
    
}



?>