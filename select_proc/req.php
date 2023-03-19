<?php
    session_start();
    include'../connect/coon.php';
    include'../objects/request.php';
    $d=new Request();
    echo $d->select_cliz($_SESSION['id_123'],$con); 
?>