<?php
include 'conexion.inc.php';
    $buttonValue = 'Buscar Cuenta';
    $placeHolderTxt = 'Correo de Usuario';

    

    if(isset($_POST['btnOperacion'])){

        $btnOperacion = $_POST['btnOperacion'];

        switch

        list($msj,$alert,$codeEncrypt,$error) = Get_Datos();
        if(!$error){
            echo 'men 0 error';
        }
    }
   
    include '../../pages/templates/Recover_Password.php';

?>
