<?php
    session_start();
    require '../connect/coon.php';
    require '../objects/donordetail.php';
    $d=new Donor_detail();
    $d->set_donor_id($_SESSION['id_123'],$con);
    $d->set_id($_POST['row_id'],$con);
    $d->set_tmp_name($_FILES['qr']['tmp_name'],$con);
    $d->set_proof_of_payment("../files/donations/".$d->donor_id."_".date('YmdHis').".".pathinfo($_FILES['qr']['name'],PATHINFO_EXTENSION),$con);
    echo $d->update_proofofpayment($con);
?>