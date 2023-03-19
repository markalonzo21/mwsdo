<?php
    session_start();
    include'../connect/coon.php';
    include'../objects/donor.php';
    $d=new Donor();
    echo $d->donor_info($_SESSION['id_123'],$con);
?>