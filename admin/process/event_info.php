<?php
    include'../../connect/coon.php';
    include'../../objects/event.php';
    $e=new Event(); 
    $e->set_id($_POST['id'],$con);
    // var_dump($e->get_event_info($con));
    echo $e->get_event_info($con);
?>