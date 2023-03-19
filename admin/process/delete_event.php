<?php
    include'../../connect/coon.php';
    include'../../objects/event.php';
    $e=new Event(); 
    $e->set_id($_POST['id'],$con);
    $e->delete_event($con);
?>