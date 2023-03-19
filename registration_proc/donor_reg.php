<?php
    include "../connect/coon.php";
    include "../objects/donor.php";
    $donor=new Donor();
    $donor->set_fullname($_POST['fullname'],$con);
    $donor->set_email($_POST['email'],$con);
    $donor->set_username($_POST['username'],$con);
    $donor->set_password(hash('SHA256',$_POST['password']),$con);
    $donor->set_contact($_POST['contact'],$con);
    $donor->set_status(0,$con);
    $donor->set_tmp_name($_FILES['file']['tmp_name'],$con);
    $donor->set_valid_Document("../files/".hash("SHA256",$donor->get_username()).".".pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION),$con);
    echo $donor->insert($con); 
?>