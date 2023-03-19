<?php
    session_start();
    require '../connect/coon.php';
    require "../objects/donor.php";
    $d=new Donor();
    $d->set_id($_SESSION['id_123'],$con);
    $d->set_contact($_POST['contact'],$con);
    echo $d->update_contact($con);
?>