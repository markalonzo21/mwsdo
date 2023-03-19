<?php
    session_start();
    include'../connect/coon.php';
    include'../objects/beneficiary.php';
    $bene=new Beneficiary();
    echo $bene->beneficiary_info($_SESSION['id_123'],$con);
?>