<?php
    session_start();
    include'../connect/coon.php';
    include'../objects/donordetail.php';
    $d=new Donor_detail();
    echo $d->select_cliz($_SESSION['id_123'],$con);
?>