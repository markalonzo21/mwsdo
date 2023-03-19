<?php
    session_start();
    require '../../connect/coon.php';
    require "../../objects/user.php";
    $d=new User();

    $d->set_username($_POST['username'],$con);
    $d->set_password(hash('SHA256',$_POST['password']),$con); 
    $ret=$d->login($con); 
    if(!empty($ret)){ 
        echo "suc";
        $_SESSION['id']=$ret;
        $_SESSION['password']=hash('SHA256',$_POST['password']);
    }else{
        echo"failed";
    }
?>