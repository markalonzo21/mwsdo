<?php include'header.php'; ?>
<div class="content-heading">
    <h1 class="title">Donors</h1>
    <?php include 'content_heading.php'; ?>
</div>
            <div style="padding:20px">
                <button class="btn btn-lg btn-success" data-target="#donateModal" data-toggle='modal'>Add Donor</button>
                <hr>
                <table class="table table-bordered" id="his_t" >
                    <thead style="background-color:dodgerblue;color:white">
                        <tr>
                            <th>Valid Document</th>
                            <th>FullName</th>
                            <th>Email</th> 
                            <th>Contact</th> 
                            <th style='width:220px'>Status</th>
                        </tr>
                    </thead>
                    <tbody id="tbod">
                        <?php
                            $sql="select * from tbl_donor order by status asc";
                            $qry=$con->prepare($sql);
                            $qry->bind_result($a,$b,$c,$d,$e,$f,$g,$h);
                            if($qry->execute()){
                               while($qry->fetch()){
                                   $stat=array("<a href='#' style='color:green' onclick=\"acceptz('$a')\">Accept</a> / <a href='#' style='color:crimson' onclick=\"deletez('$a')\">Reject</a>",'Accepted',"<p style='color:crimson'>Rejected</p>");
                                   echo"
                                   <tr >
                                        <td><a target='blank' href='$b'>View Valid Document</a></td>
                                        <td style='color:black'>".ucwords($c)."</td>
                                        <td style='color:black'>".ucwords($d)."</td>
                                        <td style='color:black'>".ucwords($e)."</td>
                                        <td id='t$a'>".$stat[$h]."</td>
                                   </tr>";
                               }
                            }else{
                                return $qry->error;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
    <div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="donateModalLabel">Be a Donor</h4>
          </div>
          <div class="modal-body">

                <form class="form-donation" id="donor_f">
                        <div class="row">
                            <div class="form-group col-md-12 ">
                                Upload Valid Document  (Image or PDF)<input type="file" class="form-control" required accept="application/pdf,images/*">
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group col-md-12 ">
                                <input type="text" class="form-control php" name="fullname" placeholder="Fullname" d="d" required>
                            </div>

                        </div>


                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control php" name="contact" placeholder="Contact number" d="d" required>
                            </div>

                            <div class="form-group col-md-12">
                                <input type="text" class="form-control php" name="username" placeholder="Username" d="d" required>
                            </div>
                        </div>


                        <div class="row">

                            <div class="form-group col-md-12">
                                <input type="password" class="form-control php" name="password" placeholder="password" d="d" required id="pass">
                            </div> 
                        </div>

                         <div class="row">

                            <div class="form-group col-md-12">
                                <input type="password" class="form-control php" name="repassword" placeholder="Retype Password" d="d" required id="repass">
                            </div> 
                        </div>

                        <div class="row">

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary pull-right btn-round" name="donateNow" id="d_bid">Register</button> 
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
    function acceptz(id){
        if(confirm("Are you sure you want to Accept it?")==false){
            return false;
        }
        $.ajax({
            method:"post",
            data:{id:id,acc:1},
            url:"process/accept_reject.php",
            success:(e)=>{
                if(e==""){
                    document.getElementById('t'+id).innerHTML="<p>Accepted</p>";
                }
            }
        });
    }
    function deletez(id){
        if(confirm("Are you sure you want to Reject it?")==false){
            return false;
        }
        $.ajax({
            method:"post",
            data:{id:id,acc:2},
            url:"process/accept_reject.php",
            success:(e)=>{
                if(e==""){
                    document.getElementById('t'+id).innerHTML="<p style='color:crimson'>Rejected</p>";
                }
            }
        });
    }
    function sizez(){
        contx.style.width=(window.innerWidth-260)+"px";
    }
    
    window.onload=()=>{
        sizez();
    }
</script>


    <script> 
            var aja=new XMLHttpRequest || new webkitXMLHttpRequest || new msXMLHttpRequest || new oXMLHttpRequest || new mozXMLHttpRequest; 
            var bid;
            var fid;
            aja.upload.addEventListener("progress",(e)=>{
               document.getElementById(bid).innerHTML="please Wait.."+parseInt((e.loaded/e.total)*100)+"%";
            },false);
            aja.addEventListener("load",(e)=>{ 
                if(e.target.responseText!="Successfully"){ 
                    alert("Username is Already Taken!");
                }else{
                    alert("Successfully Registered!");
                    document.getElementById(fid).reset(); 
                    $('#donateModal').modal('hide');
                }
                
                document.getElementById(bid).style.pointerEvents="all";
                document.getElementById(bid).innerHTML="Register";
            },false);
            function poost(json){  
                aja.open("POST",json.url);
                aja.send(json.data); 
            } 
            //////
            function serialize_form(id){
                var data=new FormData();
                for(var i=0;i<document.getElementById(id).getElementsByTagName('input').length;i++){  
                    if(document.getElementById(id).getElementsByTagName('input')[i].getAttribute("type")!="file"){
                        data.append(document.getElementById(id).getElementsByTagName('input')[i].getAttribute("name"),document.getElementById(id).getElementsByTagName('input')[i].value);
                    }else{
                        data.append("file",document.getElementById(id).getElementsByTagName('input')[i].files[0]); 
                    }
                }
                return data;
            }
         
            donor_f.addEventListener("submit",(e)=>{
                e.preventDefault();  
                if(confirm("Are you sure want to Register?")==false){
                    return;
                }
                if(pass.value==repass.value){ 
                    bid="d_bid";
                    fid="donor_f";
                    document.getElementById(bid).style.pointerEvents="none";
                    poost({
                        url:"process/donor_reg.php",
                        data:serialize_form("donor_f")
                    });
                     repass.style.borderColor="rgba(0,0,0,0.2)";
                }else{
                    repass.style.borderColor="red";
                }
                
            },false);
        
    </script>