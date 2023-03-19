<?php
    session_start();
    require_once'connect/coon.php';
    include'objects/broadcast.php';
    $broad=new Broadcast();
    $mes=$broad->select($con);

    define('PROJECT_ROOT', 'http://localhost:8888/mwsdo/');
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MWSDO</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo '<script src="'.PROJECT_ROOT.'jquery.min.js"></script>'; ?>
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'> 
        <!-- Bootsrap -->
        <?php echo '<link rel="stylesheet" href="'.PROJECT_ROOT.'assets/css/bootstrap.min.css">'; ?>

        <!-- Font awesome -->
        <?php echo '<link rel="stylesheet" href="'.PROJECT_ROOT.'assets/css/font-awesome.min.css">'; ?>

        <!-- Owl carousel -->
        <?php echo '<link rel="stylesheet" href="'.PROJECT_ROOT.'assets/css/owl.carousel.css">'; ?>

        <!-- Template main Css -->
        <?php echo '<link rel="stylesheet" href="'.PROJECT_ROOT.'vendor/datatables/css/dataTables.bootstrap.min.css">'; ?>
        <?php echo '<link rel="stylesheet" href="'.PROJECT_ROOT.'vendor/datatables/css/jquery.dataTables.min.css">'; ?>
        <?php echo '<link rel="stylesheet" href="'.PROJECT_ROOT.'assets/css/style.css">'; ?>
        
        <?php echo '<script src="'.PROJECT_ROOT.'assets/js/bootstrap.min.js"></script>'; ?>
        <?php echo '<script src="'.PROJECT_ROOT.'assets/js/jquery.ph-locations-v1.0.0.js"></script>'; ?>
    <!-- <script src="assets/js/bootstrap.min.js"></script> -->
        <script>
            const host = 'http://localhost:8888/mwsdo/';
        </script>

        <style>
            .pendings{
                color: grey !important;
            }
            .accepteds{
                color: green !important;
            }
            .rejecteds{
                color: crimson !important;
            }
            .hoverr{
            font-size: 0.7em;
            color:blue;
            cursor: pointer;
            }
            .hoverr:hover{
                color:dodgerblue;
            }
            .qr, .img-link {
                text-decoration: none !important;
            }
        </style>
    </head>

<body>