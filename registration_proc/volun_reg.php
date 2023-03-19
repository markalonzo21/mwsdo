<?php
    include "../connect/coon.php";
    include "../objects/volunter.php";
    $ben=new Volunteer();
    $ben->set_fname($_POST['fname'],$con);
    $ben->set_fname($_POST['mname'],$con);
    $ben->set_lname($_POST['lname'],$con); 
    $ben->set_contact($_POST['contact'],$con);
    $ben->set_status(0,$con);
    $ben->set_tmp_name($_FILES['file']['tmp_name'],$con);
    $ben->set_valid_Document("../files/".hash("SHA256",$_FILES['file']['tmp_name']).".".pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION),$con);
    echo $ben->insert($con); 
?>