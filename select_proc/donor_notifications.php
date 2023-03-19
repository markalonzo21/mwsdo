<?php
    session_start();
    include'../connect/coon.php';
    include'../objects/notification.php';
    $notif=new Notification();
    echo $notif->select_notifications($_SESSION['id_123'],$con);
?>