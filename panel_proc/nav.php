<?php
    session_start();
    if(isset($_SESSION['userlevel_123'])){
        if($_SESSION['userlevel_123']=="beneficiary_123"){
            echo '
                    <li class = "submenu-item"><a href="#" data-target="#reqModal" data-toggle="modal">Send Request</a></li>
                    <li class = "submenu-item"><a href="#" onclick="get_reqhistory()" >Request History<span id="notif"></span></a></li> 
                    <li class = "submenu-item"><a href="#" onclick="open_pass(1)" data-toggle="modal" data-target="#cModal" >Change Password<span id="notif"></span></a></li>
                    <li class = "submenu-item"><a href="#"  onclick="logout();">Logout</a></li> 
                ';
        }else if($_SESSION['userlevel_123']=="donor_123"){
             echo '
                <li class = "submenu-item"><a href="#" data-target="#donatesModal" data-toggle="modal">Donate now</a></li>
                <li class = "submenu-item"><a href="#" onclick="get_history()">My Donation History</a></li>
                <li class = "submenu-item"><a href="#" onclick="open_pass(2)" data-toggle="modal" data-target="#cModal" >Change Password<span id="notif"></span></a></li>
                <li class = "submenu-item"><a href="#" onclick="logout();">Logout</a></li>
                
                ';
        }else{
            
        }
    }else{
        echo '
                <li class = "submenu-item"><a href="#" data-toggle="modal" data-target="#loginModal">LOGIN</a></li>
            ';
    }
?>