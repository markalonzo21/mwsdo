<?php
    require '../../connect/coon.php';

    require '../../objects/broadcast.php';
    $d=new Broadcast();
    function update_broadcast($mes,$id,$d,$con){
        $d->set_id(1,$con);
        $d->set_broadcast_mes($mes,$con);
        $d->set_date(date('Y-m-d'),$con);
        echo $d->update_broadcast($con);
    }
    update_broadcast($_POST['mes'],1,$d,$con);
?>