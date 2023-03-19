<?php require 'authen.php'; ?>
<?php 
    include'../connect/coon.php' ;
    include'../objects/donor.php'; 
    include'../objects/donordetail.php'; 
    include'../objects/beneficiary.php';
    include'../objects/request.php';
    include'../objects/user.php';

    $donor=new Donor();
    $bene=new Beneficiary();
    $req=new Request();
    $donate=new Donor_detail();
    $user=new User();
    $u_id = $_SESSION['id'];
    $ret=mysqli_query($con,"select fname, lname from tbl_user where u_id='$u_id'");
    $row=mysqli_fetch_array($ret);
    $fullname=ucfirst($row['fname']." ".$row['lname']);

    $d_c    =   $donor->countz($con);
    $b_c    =   $bene->countz($con);
    $r_c    =   $req->countz($con);
    $dn_c   =   $donate->countz($con);
    $max=1000;
    ?>
<html>
<head>
    <script src="../jquery.min.js"></script>
    <meta charset="utf-8">
    <title>MSWDO</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../jquery.min.js"></script>
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'> 
    <!-- Bootsrap -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- Font awesome -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css"> 

    <link rel="stylesheet" href="../dist/ionicons-2.0.1/css/ionicons.min.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="../assets/css/owl.carousel.css">

    <!-- Template main Css -->
    <link rel="stylesheet" href="../assets/css/style.css">

        <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Modernizr -->
    <script src="../assets/js/modernizr-2.6.2.min.js"></script> 
        
    <script src="href.js"></script>

    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/daterangepicker.css">

    <!-- Moment -->
    <script src="../assets/js/moment.min.js"></script> 
    <!-- Date range picker -->
    <script src="../assets/js/daterangepicker.min.js"></script> 
    <!-- Owl Carousel -->
    <script src="../assets/js/owl.carousel.min.js"></script> 
</head>
<body onresize="sizez()">
    
<div class="wrapper">
<?php include'nav.php'; ?>
<div class="content-wrapper">
