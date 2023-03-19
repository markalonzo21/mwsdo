<?php
    include "../../connect/coon.php";
    include "../../objects/donor.php";
    $donor=new Donor();
    $donor->set_id($_POST['id'],$con);
    $donor->set_status($_POST['acc'],$con);
    echo $donor->update_status($con); 
?>