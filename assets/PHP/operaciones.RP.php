<?php
include 'conexion.inc.php';

    list($msj,$alert,$codeEncrypt,$error) = Get_Datos();
    $buttonValue = 'Buscar Cuenta';
    $placeHolderTxt = 'Correo de Usuario';

    if($error){
        echo 'men hubo un error';
    }
    include '../../pages/templates/Recover_Password.php';

?>
