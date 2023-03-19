<?php
    include "../connect/coon.php";
    include "../objects/beneficiary.php";
    $ben=new Beneficiary();
    $ben->set_fname($_POST['fname'],$con);
    $ben->set_lname($_POST['lname'],$con);
    $ben->set_username($_POST['username'],$con);
    $ben->set_password(hash('SHA256',$_POST['password']),$con);
    $ben->set_contact($_POST['contact'],$con);
    $ben->set_address($_POST['address'],$con);
    $ben->set_brgy($_POST['barangay'],$con);
    $ben->set_status(0,$con);
    $ben->set_tmp_name($_FILES['file']['tmp_name'],$con);
    $ben->set_valid_Document("../files/".hash("SHA256",$ben->get_username()).".".pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION),$con);
    echo $ben->insert($con); 
?>