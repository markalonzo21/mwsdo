<?php

    include'../../connect/coon.php';
    include'../objects/notification.php';

    $donid=$_SESSION['id_123'];
    $ret=mysqli_query($con,"select fname, lname, contact from tbl_beneficiary where b_id='$donid'");
    $row=mysqli_fetch_array($ret);
    $fname=$row['fname'];
    $lname=$row['lname'];
    $contact=$row['contact'];


    $notif=new Notification();
    $notif_count = $notif->count($donid,$con);
?>

<div class="wrapper">
<div class="sidebar">
    <ul class="sidebar-nav-container">
        <div class="sidebar-logo">
            <img src="../assets/images/urbizlogo-transparent.png">
            <h3>MWSDO</h3>
        </div>
        <hr class="sidebar-divider">
        <li class="sidebar-nav-item"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span><a href="#" onclick="window.location.href = 'index.php'">Dashboard</a></li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">Interface</div>
        <li class="sidebar-nav-item"><a href="#" data-target="#reqModal" data-toggle="modal">Request Now</a></li>
        <li class="sidebar-nav-item"><a href="#" onclick="window.location.href = 'profile.php'">Profile</a></li>
        <li class="sidebar-nav-item"><a href="#" onclick="open_pass(2)" data-target="#cModal" data-toggle="modal">Change Password</a></li>
        <li class="sidebar-nav-item"><a href="#" onclick="logout();">Logout</a></li>
    </ul>
</div>


<!-- <nav class="navbar navbar-static-top">
    <div class="navbar-top">
        <div class="container">
            <div class="row"></div>
        </div>
    </div>
    <div class="navbar-main">
        <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse pull-right">
            <ul class="nav navbar-nav" id="ang_nav">
                <li class = "submenu-item"><a href="#" onclick="window.location.href = 'index.php'">Home</a></li>
                <li class = "submenu-item"><a href="#" data-target="#reqModal" data-toggle="modal">Request now</a></li>
                <li class="submenu-item">
                    <div class="hdivider"></div>
                </li>
                <li class="dropdown">
                    <a id="dLabel" data-target="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span><?php echo ucfirst($fname).' '.ucfirst($lname); ?></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a href="#" onclick="window.location.href = 'profile.php'" class="dropdown-menu-link">My Profile</a></li>
                        <li><a href="#" class="dropdown-menu-link" onclick="open_pass(1)" data-target="#cModal" data-toggle="modal">Change Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#" class="dropdown-menu-link" onclick="logout();">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <div class="dropdown notif">
                <div class="dropdown-toggle notification-center" id="dNotif" data-target="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <?php if($notif_count > 0) echo "<span id='notify'></span>"; ?>
                    <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                </div>
                <div class="messages dropdown-menu dropdown-menu-right w350" aria-labelledby="dNotif">
                    <div class="notif-header">
                        <h4 class="notif-title">Notifications</h4>
                        <h6 class="notif-sub">
                            <a href="#" onclick="read_all_messages()">Mark all as read</a>
                        </h6>
                    </div>
                    <ul id="notif_c" class="notif-container">
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
</nav> -->

<div class="content-wrapper">