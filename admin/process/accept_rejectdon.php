<?php
    include "../../connect/coon.php";
    include "../../objects/donordetail.php";
    include "../../objects/notification.php";
    $donor=new Donor_detail();
    $notif = new Notification();
    $donor->set_id($_POST['id'],$con);
    $donor->set_status($_POST['acc'],$con);
    $donor->set_donor_id($_POST['donor_id'], $con);
    echo $donor->update_status($con).$_POST['id']; 
?>