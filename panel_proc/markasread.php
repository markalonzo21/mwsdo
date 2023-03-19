<?php
    session_start();
    require '../connect/coon.php';
    require "../objects/notification.php";
    $notif = new Notification();
    echo $notif->mark_all_as_read($_POST['ids'], $_SESSION['id_123'], $con);
?>