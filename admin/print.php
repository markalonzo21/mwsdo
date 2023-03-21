<?php require 'authen.php'; ?>
<?php 
    include'../connect/coon.php' ;
    include'../objects/donor.php'; 
    include'../objects/donordetail.php'; 
    include'../objects/beneficiary.php';
     
    include'../objects/request.php';
    $donor=new Donor();
    $bene=new Beneficiary();
    $req=new Request();
    $donate=new Donor_detail();
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
    </style> 
    <body onresize="sizez()"> 
        <hr>
        <center><img src="../assets/images/urbizlogo-transparent.png" width="150px;">
        <div>
            <h3 style="font-weight: bold;">MSWDO</h3>
            <h3>Calamity Assistance Request and Monitoring System</h3>
        </div>
            <br><br>
        <?php
            if($_GET['print']=='d'){
                echo "<h1>List of Donations</h1>";
            }else if($_GET['print']=='r'){
                echo "<h1>List of Accepted Request</h1>";
            }else if($_GET['print']=='b'){
                echo "<h1>List of Beneficiaries</h1>";
            }
        ?>
        </center>
       <?php
            if($_GET['print']=='d'){
        ?>
        <?php ?>
        <table class="table table-bordered">
        <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type of Donation</th>
                        <th>Amount</th>
                        <th>Relief</th>
                        <th>Details </th> 
                    </tr>
                </thead>
                <tbody id="tbod">
                    <?php  
                        $sql="select * from tbl_donordetail where (date between '".$_GET['start']."' and '".$_GET['end']."') and status=1"; 
                            $qry=$con->prepare($sql); 
                            $qry->bind_result($a,$b,$c,$d,$e,$f,$g,$h, $i);
                            $qry->execute(); 
                            while($qry->fetch()){
                                 echo "<tr >
                                        <td>".ucfirst(date('Y-m-d',strtotime($g)))."</td>
                                        <td>".ucfirst($c)."</td>
                                        <td>".ucfirst($d)."</td>
                                        <td>".ucfirst($e)."</td> 
                                        <td>".ucfirst($f)."</td> 
                                    </tr> 
                                    ";
                            }
                    ?>       
                </tbody>
              </table>
        <?php
            }else if($_GET['print']=='b'){
        ?>
             <table class="table table-bordered">
                    <thead>
                        <tr> 
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Contact</th> 
                            <th>Address</th>  
                            <th>Barangay</th>  
                        </tr>
                    </thead>
                    <tbody id="tbod">
                        <?php 
                            if($_GET['brgy'] != 'all'){
                                $sql="select * from tbl_beneficiary where status=1 and barangay='".$_GET['brgy']."' order by lname,fname";
                            }else{
                                $sql="select * from tbl_beneficiary where status=1 order by lname,fname";
                            }
                            $qry=$con->prepare($sql);
                            $qry->bind_result($a,$b,$c,$d,$e,$f,$g,$h,$i, $j);
                            if($qry->execute()){
                               while($qry->fetch()){
                                   $stat=array("<a href='#' style='color:green' onclick=\"acceptz('$a')\">Accept</a> / <a href='#' style='color:crimson' onclick=\"deletez('$a')\">Reject</a>",'Accepted',"<p style='color:crimson'>Rejected</p>");
                                   echo"
                                   <tr > 
                                        <td style='color:black'>".ucwords($c)."</td>
                                        <td style='color:black'>".ucwords($d)."</td> 
                                        <td style='color:black'>".ucwords($e)."</td> 
                                        <td style='color:black'>".ucwords($f)."</td> 
                                        <td style='color:black'>".ucwords($g)."</td> 
                                   </tr>";
                               }
                            }else{
                                return $qry->error;
                            }
                        ?>
                    </tbody>
                </table>
        <?php }else if($_GET['print']='r'){ ?>
        <table class="table table-bordered">
             <thead>
                    <tr >
                        <th>Beneficiary</th>
                        <th>Type of Calamity</th>
                        <th>Decription of Request</th>
                        <th>Amount Received</th>
                        <th>Remarks</th>
                        <th>Date</th> 
                    </tr>
                </thead>
                <p>Date: <span><?php echo $_GET['start'] ." - ".$_GET['end'];?></span></p>
                <tbody id="tbod"> 
                    
                         <?php
                            $sql="select a.*,b.fname,b.lname,b.address,b.contact from tbl_request as a
                                 inner join tbl_beneficiary as b on a.ben_id=b.b_id where (a.datez between '".$_GET['start']."' and '".$_GET['end']."') and a.status=1 
                                 order by status asc";
                            $qry=$con->prepare($sql); 
                            $qry->bind_result($id,$ben_id,$typeofcalamity,$file,$descrioptionofrequest,$amountreceived,
                                              $status,$remarkz,$datez,$fname,$lname,$address,$contact);
                            $qry->execute();
                            $calamities=array("nd"=>"Natural Disaster", "fr"=>"Fire", "ac"=>"Accident");
                            while($qry->fetch()){
                                 echo "<tr>  
                                        <td>".ucfirst($fname.' '.$lname)."</td>
                                        <td>".ucfirst($calamities[$typeofcalamity])."</td>
                                        <td>".ucfirst($descrioptionofrequest)."</td>
                                        <td>".ucfirst($amountreceived)."</td>
                                        <td>".ucfirst($remarkz)."</td> 
                                        <td>".ucfirst($datez)."</td> 
                                    </tr> 
                                    ";
                            }
                        ?>
                </tbody>
              </table>   
        <?php    } ?>
    </body>
    </html> 
<script>
    window.print();
</script>