<?php
        include'../../connect/coon.php';
        include'../../objects/user.php';
            $d=new User();   
            $d->set_id($_POST['id'],$con);
            $d->set_fname($_POST['fname'],$con);
            $d->set_lname($_POST['lname'],$con);
            $d->set_email($_POST['email'],$con);
            $d->set_contact($_POST['contact'],$con);
            $d->update_user($con);  
?>