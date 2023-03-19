<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("location:home.php");
    }
?>
<html>
    <head>
        <title>MWSDO</title>
        <script src="../jquery.min.js"></script>
    </head>
    <style>
        body{
            margin: 0px;
            padding: 0px;
            overflow-y: hidden;
        }
        *{
            font-family: century gothic;
        }
        #cont{
            width: 100%;
            min-height: 100%; 
        }
        #log_reg{ 
            background-color: rgba(0,0,0,0.6);
            width: 400px;
            min-height: 300px;
            box-shadow: 2px 2px 3px black;
            border-radius: 10px;
            margin: auto;
            padding: 10px;
            padding-top: 20px;
            margin-top: 60px;
        }
        #titlez{
            width:auto;
            text-align: center;
            padding:20px;
            background-color: skyblue;
        }
        .inputs{
            width:100%;
            margin-top: 10px; 
            height: 40px;
            border-radius: 5px;
            font-size: 1.04em;
            text-indent: 10px;
        }
        form button{
            margin-top: 10px;
            width: 100%;
            height: 35px;
            font-size: 1.05em;
            font-weight: bolder;
            border-radius: 5px;
            background-color:transparent;
            box-shadow: 0px 0px 6px lightblue;
            cursor: pointer;
            color: lightblue;
            border-style: none;
        }
        form button:hover{
            color: deepskyblue;
        }
        .registers{
            box-shadow: 0px 0px 6px lime;
            cursor: pointer;
            color: lime;
        }
        .registers:hover{
            color: yellowgreen;
        }

        .admin-logo-container {
            display: flex;
            padding: 12px;
            align-items: center;
            border-bottom: 12px solid maroon;
        }

        .admin-logo-container h3, h2 {
            margin: 0;
        }
        
        .admin-logo {
            width: 120px;
            height: 120px;
            margin-right: 12px;
        }

        .img-circle {
            background-color: #fff;
            border-radius: 100%;
        }

        @media screen and (max-width:400px){
            #log_reg{ 
                margin: auto; 
                border-radius: 0px; 
                margin: 0px;  
                width: auto;
                box-shadow: 0px 0px 0px transparent;
            }
            #titlez{
                margin: 0px;
            }
        }
    </style>
    <body>
        <div id="cont">
            <div class="admin-logo-container">
                <img class="admin-logo" src="../assets/images/urbizlogo.png">
                <div>
                    <h2>MWSDO</h2>
                    <h3>Calamity Assistance Request and Monitoring System</h3>
                </div>
            </div>
            <!--<h1 id="titlez">Ang Title sang System niyo na di</h1>!-->
            <div id="log_reg">
                <div id="login_d">  
                    <center>
                        <img src="../assets/images/administrator-male.png" class="img-circle" width="100px" height="100px"> 
                    </center>
                    <form id="login">
                        <h2 style="margin:0px;text-indent:3px;color:white">Login</h2>
                        <input type="text" class="inputs" placeholder="Username" name="username"> 
                        <input type="password" class="inputs" placeholder="Password" name="password">
 
                        <button>Login</button> 
                    </form> 
                </div>
            </div> 
            <br>
        </div>
    </body>
    <script>
       
        login.addEventListener("submit",(e)=>{
            e.preventDefault();
            $.ajax({
                url:"process/login_proc.php",
                method:"POST",
                data:$('#login').serializeArray(),
                success:(e)=>{
                   if(e=="suc"){
                        window.location="home.php";
                   }else{
                       alert("Failed to Login!");
                   }
                }
            })
        },false);
        
    </script>
</html>