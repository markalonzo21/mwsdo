<?php
        include'../../connect/coon.php';
        include'../../objects/user.php';
        $d=new User();   
            $d->set_username($_POST['username'],$con);
            $d->set_password(hash('SHA256',$_POST['password']),$con);
            $d->set_fname($_POST['fname'],$con);
            $d->set_lname($_POST['lname'],$con);
            $d->set_email($_POST['email'],$con);
            $d->set_contact($_POST['contact'],$con);
            $d->set_usertype(1,$con); 
            echo $d->insert($con); 
?>