<?php
    include "../../connect/coon.php";
    include "../../objects/request.php";
    include "../../objects/notification.php";
    $donor=new Request();
    $donor->set_id($_POST['id'],$con);
    $donor->set_remarks($_POST['remark'],$con);
    $donor->set_status($_POST['acc'],$con);
    $donor->set_ben_id($_POST['ben_id'],$con);
    echo $donor->update_status($con);
    echo $donor->update_remarks($con);
?>