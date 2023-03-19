<?php
    session_start();
    require '../connect/coon.php';
    require "../objects/beneficiary.php";
    $d=new Beneficiary();

    $d->set_username($_POST['username'],$con);
    $d->set_password(hash('SHA256',$_POST['password']),$con); 
    $ret=$d->login($con);
    $mes=array("Your Account is not Accepted yet!","Login Successfully","Your Request has been Rejected!");
    if(!empty($ret[0])){ 
        if($ret[1]==1){
            $_SESSION['id_123']=$ret[0];
            $_SESSION['userlevel_123']="beneficiary_123";
            $_SESSION['password']=hash('SHA256',$_POST['password']);
            
        } 
        echo $mes[$ret[1]];
    }else{
        echo"Incorrect Username or password!";
    }
?>