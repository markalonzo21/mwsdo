  <?php session_start(); ?>
<html>
    <head>
        <script src="../jquery.min.js"></script>
        <meta charset="utf-8">
        <title>Valencia City Social Welfare and Development</title>
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
        <div id="navx">
            <ul class="listx">
                <li><img src="../assets/images/dswd-logo_final2.png" width="50%"></li>
                <li  class="activex">Dashboard</li>
                <li>Admin/Users</li>
                <li>Donors</li>
                <li>Beneficiaries</li>
                <li>Donate</li>
                
                <li>Request</li>
                <li style="color:crimson;text-shadow:1px 1px 3px black">Close</li>
            </ul>
        </div> 
        <div id="contx">
            <div style="height:65px;background-color:dodgerblue"></div>
            <div style="padding:10px">
            
            <table class="table" id="tbod">
             <thead>
                    <tr style="background-color:dodgerblue;color:white">
                        <th>Date</th>
                        <th>Type of Donation</th>
                        <th>Amount</th>
                        <th>Details </th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="tbod"> 
                    
                         <?php 
                            include'../connect/coon.php';
                            include'../objects/donordetail.php';
                            $d=new Donor_detail();
                            echo $d->select(null,$con);
                        ?>
                </tbody>
              </table>
            </div>
        <button id="menux"> 
            Menu
        </button>
        <div class="modal fade" id="remarksModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="donateModalLabel">Accept Donation</h4>
                  </div>
                  <div class="modal-body">

                        <form class="form-donation" id="acc_f">

                                <h3 class="title-style-1 text-center">Accept Donation<span class="title-under"></span>  </h3>
                                <div class="row">
                                    <div class="form-group col-md-12 "> 
                                        <textarea class="form-control" required placeholder="Remarks"></textarea>
                                    </div>
                            </div>
                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary pull-right" name="donateNow" id="d_bid">Accept</button> 
                                    </div>

                                </div> 
                        </form>

                  </div>
                </div>
              </div> 
    </div> <!-- /.modal -->
            
    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="donateModalLabel">Reject Donation</h4>
                  </div>
                  <div class="modal-body">

                        <form class="form-donation" id="re_f">

                                <h3 class="title-style-1 text-center">Reject Donation<span class="title-under"></span>  </h3>
                                <div class="row">
                                    <div class="form-group col-md-12 "> 
                                        <textarea class="form-control" required placeholder="Remarks"></textarea>
                                    </div>
                            </div>
                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-danger pull-right" name="donateNow" id="d_bid">Reject</button> 
                                    </div>

                                </div> 
                        </form>

                  </div>
                </div>
              </div> 
    </div> <!-- /.modal -->
    </body>
        </html>

    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
    $(document).ready(function(){
        $('#tbod').DataTable({
            responsive:false,
            sort:false
        });
    });
    var iid="";
    function sizez(){ 
        contx.style.width=(window.innerWidth-260)+"px"; 
    }
    
    window.onload=()=>{
        sizez(); 
    }
    acc_f.addEventListener('submit',(e)=>{
        e.preventDefault();
       if(confirm("Are you sure you want to Accept it?")==false){
            return false;
        }
        $.ajax({
            method:"post",
            data:{id:iid,acc:1},
            url:"process/accept_rejectdon.php",
            success:(e)=>{
                alert("Request Successfully Accpepted!");
                $("#remarksModal").modal("hide");
                acc_f.reset();
                document.getElementById('t'+iid).innerHTML="<p>Accepted</p>"; 
            }
        }); 
    });
    
    re_f.addEventListener('submit',(e)=>{
        e.preventDefault();
       if(confirm("Are you sure you want to Reject it?")==false){
            return false;
        }
        $.ajax({
            method:"post",
            data:{id:iid,acc:2},
            url:"process/accept_rejectdon.php",
            success:(e)=>{
                alert("Request Successfully Rejected!");
                $("#rejectModal").modal("hide");
                re_f.reset();
                document.getElementById('t'+iid).innerHTML="<p style='color:crimson'>Rejected</p>"; 
            }
        }); 
    });
    function acceptz(id){ 
        iid=id;
        $('#remarksModal').modal("show");   
    }
    function deletez(id){ 
        
        iid=id;
        $('#rejectModal').modal("show");   
    }
</script>