<?php
    header('location:login.php');

    function sumar($n1,$n2){
        return $n1 + $n2;
    }

 $a = 20;
 $b = 30;
 $respuesta = sumar($a,$b);

 if($respuesta == null){
     echo 'no joda se daño';
 }
 else{
     echo 'la suma es: '.$respuesta;
 }


    // phpinfo()
?>