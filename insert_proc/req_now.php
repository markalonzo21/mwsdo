<?php
    session_start();
    require '../connect/coon.php';
    require '../objects/request.php'; 
    $d=new Request();
    $d->set_ben_id($_SESSION['id_123'],$con);
    $d->set_typeofcalamity($_POST['type_of_calamity'],$con);
    $d->set_tmp_name($_FILES['proofOfImage']['tmp_name'],$con);
    $d->set_file("../files/".$d->ben_id.date('YmdHis').".".pathinfo($_FILES['proofOfImage']['name'],PATHINFO_EXTENSION),$con);
    $d->set_descriptionofrequest($_POST['desc'],$con);
    $d->set_amountreceived(0,$con);
    $d->set_status(0,$con);
    $d->set_remarks("",$con);
    $d->set_datez(date('Y-m-d'),$con);
    echo $d->insert($con);
?>