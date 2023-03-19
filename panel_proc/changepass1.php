<?php
    session_start();
    require '../connect/coon.php';
    require "../objects/donor.php";
    $d=new Donor();
    if(hash('SHA256',$_POST['oldpassword'])==$_SESSION['password']){
        $d->set_id($_SESSION['id_123'],$con);
        $d->set_password(hash("SHA256",$_POST['newpassword']),$con);
        echo $d->update_password($con);
    }else{
        echo "qwe";
    }
?>