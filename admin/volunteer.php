<?php require 'authen.php'; ?>
<html>
      <head>
        <script src="../jquery.min.js"></script>
        <meta charset="utf-8">
        <title>DSWD</title>
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

        <!-- Owl carousel -->
        <link rel="stylesheet" href="../assets/css/owl.carousel.css">

        <!-- Template main Css -->
        <link rel="stylesheet" href="../assets/css/style.css">
        
    <script src="../assets/js/bootstrap.min.js"></script>
        <!-- Modernizr -->
        <script src="../assets/js/modernizr-2.6.2.min.js"></script> 
        <script src="href.js"></script>
    </head>
    <style>
        body{
            margin: 0px;
            padding: 0px;
            background-color: whitesmoke;
        }
        *{
            font-family: century gothic;
        }
        #navx{
            position: fixed;
            top: 0px;
            left: 0px;
            background-color:lightblue;
            width: 260px;
            height: 100%;
            z-index: 999;
        }
        .listx{
            margin: 0px;
            padding: 0px;
        }
        .listx li{
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 1.2em;
            border-bottom-style: solid;
            border-bottom-width: 1px;
            border-color: #222222;
            text-indent: 10px;
            font-weight:bold;
            color: darkblue; 
            cursor: pointer;
        }
        .listx li:hover{ 
            border-bottom-color: blue;
        }
        .listx li:first-child{
            background-color: dodgerblue;
            text-align: center; 
            font-size: 1.8em;
            color: white;
            font-weight: bolder;
            pointer-events: none;
        }
        .listx li:last-child{
            display: none;
        }
        #menux{
            width: 60px;
            height: 60px;
            border-radius:100%;
            position: fixed; 
            bottom: 50px;
            left: 30px;
            background-color: orange;
            box-shadow: 2px 2px 4px black;
            border-style: none;
            color: white;
            font-weight: bolder;
            text-shadow: 1px 1px 1px black;
            opacity: 0.5;
            cursor: pointer;
            display: none; 
        }
        #menux:hover{
            transition: 1s;
            opacity: 1;
        }
        *:active{
            outline-style: none !important; 
        }
        
        #contx{
             
            position: fixed;
            top: 0px;
            height: 100%;
            right:0px;
            overflow-y: auto;
        }
        @media screen and (max-width:900px){
            
            #menux{
                display: block;
            }
            #navx{
                transition: 1s;
                display: none; 
                transform: translateX(-260px);
            }
             
            .listx li:last-child{
                display: list-item;
            }
            #contx{
                left: 0px;
                width: 100% !important;
            }
        }
        .activex{
            background-color: greenyellow;
            color: white !important;
            background-color: lightblue !important;
            color: #222222;
            border-right-style: solid;
            border-right-color: darkblue !important;
            border-right-width: 2px;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.4);
            pointer-events: none;
        }
        .actt{
            width:150px;
            
            text-align: center; 
        }
        .actt a{
            cursor: pointer;
            font-weight: bold;
        }
        .actt a:first-child{
            color: dodgerblue;
        }
        .actt a:last-child{
            color: crimson;
        }
        #contx{ 
            position: fixed;
            top: 0px;
            height: 100%;
            right:0px;
        }
        @media screen and (max-width:900px){
            
            #menux{
                display: block;
            }
            #navx{
                transition: 1s;
                display: none; 
                transform: translateX(-260px);
            }
             
            .listx li:last-child{
                display: list-item;
            }
            #contx{
                left: 0px;
                width: 100% !important;
            }
        }#contx{ 
            position: fixed;
            top: 0px;
            height: 100%;
            right:0px; 
        }
        @media screen and (max-width:900px){
            
            #menux{
                display: block;
            }
            #navx{
                transition: 1s;
                display: none; 
                transform: translateX(-260px);
            }
             
            .listx li:last-child{
                display: list-item;
            }
            #contx{
                left: 0px;
                width: 100% !important;
            }
        }
        #dash{
            list-style: none;
            padding: 0px;
            text-align: center;
        }
        #dash li{
            display: inline-block;
            width: 300px;
            height: 150px;
            background-color: crimson;  
        }
        @media screen and (max-width:1200px){
            #dash li{
                width: 49%;
            }
        }
        .head_{
            font-size: 1.2em;
            font-weight: bold;
            padding: 5px;
            background-color: firebrick;
            color: white;
        } 
        #graph{
            width: 500px; 
            margin-left: 10px;
            margin: auto;
        }
        #graph ul{
            
            list-style: none;
            padding: 0px;
            text-align: center;
        }
        #graph li{ 
            width:100%;
            display: block;
            margin-top: 10px;
            height: 80px; 
            color: white;
            text-shadow: 1px 1px 3px black;
        }
        .headz{ 
            background-color:grey;
        }
        #don{
            transition: 1s;
        }
    </style> 
    <body onresize="sizez()">
        <?php include'broadcast.php'; ?>
        <div id="navx">
            <ul class="listx">
                <li><img src="../assets/images/dswd-logo_final2.png" width="50%"></li>
                <li onclick='change_location("home.php")'>Dashboard</li>
                <li onclick='change_location("user.php")'>Admin/Users</li>
                <li onclick='change_location("donor.php")'>Donors</li>
                <li onclick='change_location("beneficiary.php")'>Beneficiaries</li>
                <li class="activex" onclick='change_location("volunteer.php")'>Volunteer</li>
                <li onclick='change_location("donate.php")'>Donate</li>
                <li onclick='change_location("request.php")'>Request</li>
                <li onclick='show_broad()'>Broadcast</li>
                <li onclick='change_location("process/logout.php")'>logout</li>
                <li style="color:crimson;text-shadow:1px 1px 3px black">Close</li>
            </ul>
        </div> 
        <div id="contx">
            <div style="height:62px;background-color:dodgerblue"></div>
            <br><br>
            <div style="padding:20px">
                <button class="btn btn-lg btn-success" data-target="#volunModal" data-toggle='modal'>Add Volunteer</button>
                <hr>
                <table class="table table-bordered" id="his_t" >
                    <thead style="background-color:dodgerblue;color:white">
                        <tr>
                            <th>Valid Document</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Contact Number</th> 
                            <th>Date Registered</th>
                            <th style='width:220px'>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbod">
                        <?php
                           include'../connect/coon.php';
                            $sql="select * from tbl_volunteer order by status asc, lname asc,fname asc,mname asc";
                            $qry=$con->prepare($sql);
                            $qry->bind_result($a,$b,$c,$d,$e,$f,$g,$h);
                            if($qry->execute()){
                               while($qry->fetch()){ 
                                    
                                    $stat=array("<a href='#' style='color:green' onclick='acceptz($a)'>Accept</a> / 
                                            <a href='#' style='color:crimson' onclick='deletez($a)'>Delete</a>","<a href='#' style='color:green' onclick='updatez($a)'>Update</a> / 
                                            <a href='#' style='color:crimson' onclick='deletez($a)'>Delete</a>");
                                    echo"
                                   <tr id='tr$a' ".($h==0 ? "style='background-color:#eeeeee'" : "")."> 
                                    
                                        <td  ><a href='$b' target='blank'>View</a>'</td>
                                        <td style='color:black'>".ucwords($e)."</td>
                                        <td style='color:black'>".ucwords($c)."</td>
                                        <td style='color:black'>".ucwords($d)."</td>
                                        <td style='color:black'>".ucwords($f)."</td> 
                                        <td style='color:black'>".date('m-d-Y',strtotime($g))."</td>
                                        <td style='color:black'>
                                            ".$stat[$h]."
                                        </td> 
                                   </tr>";
                               }
                            }else{
                                return $qry->error;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
     
    
            
    <div class="modal fade" id="upvolunteerModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="donateModalLabel">Update Volunteer</h4>
          </div>
          <div class="modal-body">

                <form class="form-donation" id="upvolun_f">

                        <h3 class="title-style-1 text-center">Update Volunteer<span class="title-under"></span>  </h3>
                        <div class="row">

                        </div>
                        <div class="row">

                            <div class="form-group col-md-12 ">
                                First Name
                                <input type="text" class="form-control php" name="fname" placeholder="First Name" d="d" required id="fn">
                            </div>

                        </div>
                    <div class="row">

                            <div class="form-group col-md-12 ">
                                Middle Name
                                <input type="text" class="form-control php" name="mname" placeholder="Middle Name" d="d" required id="mn">
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group col-md-12 ">
                                Last Name
                                <input type="text" class="form-control php" name="lname" placeholder="Last Name" d="d" required id="ln">
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                Contact Number
                                <input type="text" class="form-control php" name="contact" placeholder="Contact number" d="d" required id="co">
                            </div>

                        </div>
                        <input type='hidden' name='update'>
                        <input type='hidden' name='id' id="iid">
                        <div class="row">

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary pull-right">Update Volunteer</button> 
                            </div>

                        </div> 
                </form>
            
          </div>
        </div>
      </div>
     
    </div> <!-- /.modal -->
    <div class="modal fade" id="volunModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="donateModalLabel">Be a Volunteer</h4>
          </div>
          <div class="modal-body">

                <form class="form-donation" id="volun_f">

                        <h3 class="title-style-1 text-center">Volunteer Registration<span class="title-under"></span>  </h3>

                       <div class="row">
                            <div class="form-group col-md-12 ">
                                Upload Valid Document (Image or PDF)<input type="file" class="form-control" required accept="application/pdf,image/*" name="file">
                            </div>

                        </div>


                        <div class="row">
                            
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="fname" placeholder="First name*">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="mname" placeholder="Middle name*">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="lname" placeholder="Last name*">
                                
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="contact" placeholder="Contact number">
                            </div>
                            
                        </div>
 
                        <div class="row">

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary pull-right" name="donateNow" id="volun_iid" >Register</button>
                            </div>

                        </div>



                       
                    
                </form>
            
            
          </div>
        </div>
      </div>

    </div> <!-- /.modal -->
            <button id="menux"> 
                Menu
            </button>
        </div>
    </body>
    
</html>
 <!--  Scripts
    ================================================== -->

    <!-- jQuery -->
    
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
<script>
    $(document).ready(function(){
        $('#his_t').DataTable({
            responsive:false,
            sort:false
        });
    });
    upvolun_f.addEventListener('submit',(e)=>{
        e.preventDefault();
        $.ajax({
            method:"post",
            data:$('#upvolun_f').serializeArray(),
            url:"../objects/volunter.php",
            success:(e)=>{ 
                if(e==""){
                    alert("Volunteer Successfully updated!");
                    location.reload();
                }
            }
        });
    },false);
    volun_f.addEventListener('submit',(e)=>{
        e.preventDefault();
        $.ajax({
            method:"post",
            data:$('#volun_f').serializeArray(),
            url:"../objects/volunter.php",
            success:(e)=>{ 
                if(e==""){
                    alert("Volunteer Successfully added!");
                }
            }
        });
    },false);
    function updatez(id){
        iid.value=id;
        var x=document.getElementById('tr'+id);
        fn.value=x.getElementsByTagName('td')[1].innerHTML;
        mn.value=x.getElementsByTagName('td')[2].innerHTML;
        ln.value=x.getElementsByTagName('td')[0].innerHTML;
        co.value=x.getElementsByTagName('td')[3 ].innerHTML;
        $('#upvolunteerModal').modal('show');
    }
    function deletez(id){
        if(confirm("Are you sure you want to Delete it?")==false){
            return false;
        }
        $.ajax({
            method:"post",
            data:{id:id,delete:"qwe"},
            url:"../objects/volunter.php",
            success:(e)=>{ 
                if(e==""){
                    alert("Volunteer Successfully Deleted!");
                    location.reload();
                }
            }
        });
    }
     function acceptz(id){
        if(confirm("Are you sure you want to accept it?")==false){
            return false;
        }
        $.ajax({
            method:"post",
            data:{id:id,accept:"qwe"},
            url:"../objects/volunter.php",
            success:(e)=>{  
                if(e==""){
                    alert("Volunteer Successfully Accepted!");
                    location.reload();
                }
            }
        });
    }
    function sizez(){
        contx.style.width=(window.innerWidth-260)+"px";
    }
    var aja=new XMLHttpRequest || new webkitXMLHttpRequest || new msXMLHttpRequest || new oXMLHttpRequest || new mozXMLHttpRequest; 
    var bid;
    var fid;
    var mod_id;
    var volun_true=false;
    aja.addEventListener("load",(e)=>{  
        if(e.target.responseText==""){
            if(volun_true==false){
                alert("Successfully Registered! \n Please wait the admin is still verifying your account!");
            }else{
                alert("Successfully Registered! ");
            }
            location.reload();
        }else{
            alert("Username is Already Taken!");
        }

        document.getElementById(bid).style.pointerEvents="all";
        document.getElementById(bid).innerHTML="Register";
    },false);
     volun_f.addEventListener("submit",(e)=>{
         e.preventDefault();  
         if(confirm("Are you sure want to Register?")==false){
             return;
         } 
         bid="volun_iid";
         fid="volun_f";
         mod_id="volunModal";
         volun_true=true;
         var data=serialize_form("volun_f");
         data.append("insert","qwe");
         data.append("qwe","qwe");
         document.getElementById(bid).style.pointerEvents="none";
         document.getElementById(bid).style.pointerEvents="none";
         poost({
             url:"../objects/volunter.php",
             data:data
         });
         brepass.style.borderColor="rgba(0,0,0,0.2)"; 
         
     },false);
    function serialize_form(id){
        var data=new FormData();
        for(var i=0;i<document.getElementById(id).getElementsByTagName('input').length;i++){  
            if(document.getElementById(id).getElementsByTagName('input')[i].getAttribute("type")!="file"){
                data.append(document.getElementById(id).getElementsByTagName('input')   [i].getAttribute("name"),document.getElementById(id).getElementsByTagName('input')[i].value);
            }else{ 
                data.append("file",document.getElementById(id).getElementsByTagName('input')[i].files[0]); 
            }
        }
        return data;
    }
    function poost(json){  
        aja.open("POST",json.url);
        aja.send(json.data); 
    
    }
    window.onload=()=>{
        sizez();
    }
</script>
 