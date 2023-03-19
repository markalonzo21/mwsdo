<?php
    include "../../connect/coon.php";
    include "../../objects/Beneficiary.php";
    $donor=new Beneficiary();
    $donor->set_id($_POST['id'],$con);
    $donor->set_status($_POST['acc'],$con);
    echo $donor->update_status($con); 
?>