<?php
    include'../../connect/coon.php';
    include'../../objects/event.php';
    $e=new Event(); 
    $e->set_id($_POST['id'],$con);
    $e->set_title($_POST['title'],$con);
    $e->set_description($_POST['description'],$con);
    $e->set_date($_POST['date_of_event'],$con);
    $e->edit_event($con);
?>