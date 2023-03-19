<?php

        include'../../connect/coon.php';
        include'../../objects/user.php';
        $d=new User(); 
        $d->set_id($_POST['id'],$con);
        $d->set_password(hash('SHA256',$_POST['pass']),$con);
        echo $d->update_password($con);
?>