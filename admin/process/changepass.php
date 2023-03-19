<?php
    session_start();
    require '../../connect/coon.php';
    require "../../objects/user.php";
    $d=new User();
    if(hash('SHA256',$_POST['oldpassword'])==$_SESSION['password']){
        $d->set_id($_SESSION['id'],$con);
        $d->set_password(hash("SHA256",$_POST['newpassword']),$con);
        echo $d->update_password($con);
    }else{
        echo "qwe";
    }
?>