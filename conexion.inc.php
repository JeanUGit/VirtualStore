<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 
 require_once "../../vendor/autoload.php";
//  require_once "constants.php";
//  require 'dependencias/Exception.php';
//  require 'dependencias/PHPMailer.php';
//  require 'dependencias/SMTP.php';

function ConnectDB(){
    $bd_dns = 'mysql:host=localhost; dbname=storevirtual; charset=utf8';
    $bd_user = 'storevirtual';
    $bd_password = '3203825242vale';
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
        if($_POST['TxtCorreo']=="")
        {
            $alertColor = "alert alert-warning"; 
            $msj = "Debe deligenciar un Correo!";
        }
        else{
            $correo = $_POST['TxtCorreo'];
            $bds = ConnectDB();
            $strSQL = "SELECT Correo,Nombre FROM TblPersonas WHERE Correo ='$correo' ;";
            $persona = $bds->query($strSQL)->fetchAll(PDO::FETCH_NUM);
            if($persona)
            {
                $person = array_shift($persona);
                $alertColor = "alert alert-success";
                $codeEncrypt = uniqid("MYWendY");
                $msj = Send_Email($person[0],$person[1],$codeEncrypt);   
            }
            else{
                $alertColor = "alert alert-danger";
                $msj= "¡consulté con el Administrador!";   
            }
                
        }
        return array($msj,$alertColor,$codeEncrypt);
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

?>