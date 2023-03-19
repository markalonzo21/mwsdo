<?php
    include'../../connect/coon.php';
    include'../../objects/user.php';
    $d=new User(); 
    $d->set_id($_POST['id'],$con);
    $d->delete_user($con);
?>