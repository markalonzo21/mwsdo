<?php
    require '../connect/coon.php';
    require '../objects/event.php';
    $event=new Event();
    $event->set_title($_POST['title'],$con);
    $event->set_description($_POST['description'],$con);
    $event->set_date($_POST['date_of_event'],$con);

    $images = array();
    $image_names = array();

    foreach ($_FILES['images']['name'] as $key => $value) {
        $filename = date('YmdHis')."_".basename($_FILES['images']['name'][$key]);
        array_push($image_names, $filename);
        $images[$_FILES['images']['tmp_name'][$key]] = $filename;
    }

    $event->imagesArr = $images;
    $event->set_images(serialize($image_names),$con);
    echo $event->insert_event($con);
?>