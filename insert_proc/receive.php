<?php
    session_start();
    require '../connect/coon.php';
    require '../objects/request.php'; 
    $d=new Request(); 
    $d->set_id($_POST['id'],$con);
    $d->set_amountreceived($_POST['amount'],$con);  
   echo $d->update_amountreceived($con);
    echo $d->amountreceived;    
?>