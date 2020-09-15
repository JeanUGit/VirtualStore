<?php
include 'conexion.inc.php';

    list($msj,$alert,$codeEncrypt) = Get_Datos();
    include '../../pages/templates/Recover_Password.html';

?>
