<?php

$bd_dns = 'mysql:host=localhost; dbname=bds_crud; charset=utf8';
$bd_user = 'root';
$bd_password = null;
$bd_options = array(PDO::ATTR_PERSISTENT => true);
$bds = new PDO($bd_dns, $bd_user, $bd_password, $bd_options);

?>