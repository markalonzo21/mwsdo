<?php
    session_start();
    require '../connect/coon.php';
    require '../objects/donordetail.php';
    $d=new Donor_detail();
    $d->set_donor_id($_SESSION['id_123'],$con);
    $d->set_typeofdonation($_POST['type_of_donation'],$con);
    $d->set_amount($_POST['amount'],$con);
    $d->set_relief($_POST['relief'],$con);
    $d->set_detail($_POST['detail'],$con);
    $d->set_date(date('Y-m-d'),$con);
    $d->set_status(0,$con);
    $d->set_proof_of_payment("", $con);
    echo $d->insert($con);
?>