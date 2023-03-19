<?php include'header.php'; ?>
<div class="content-heading">
    <h1 class="title">Beneficiaries</h1>
    <?php include 'content_heading.php'; ?>
</div>
<div style="padding:20px">
                
                <table class="table table-bordered" id="his_t" >
                    <thead style="background-color:dodgerblue;color:white">
                        <tr>
                            <th>Valid Document</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Contact</th> 
                            <th>Address</th> 
                            <th>Barangay</th> 
                            <th style='width:220px'>Status</th>
                        </tr>
                    </thead>
                    <tbody id="tbod">
                        <?php
                            $sql="select * from tbl_beneficiary order by status asc";
                            $qry=$con->prepare($sql);
                            $qry->bind_result($a,$b,$c,$d,$e,$f,$g,$h,$i,$j);
                            if($qry->execute()){
                               while($qry->fetch()){
                                   $stat=array("<a href='#' style='color:green' onclick=\"acceptz('$a')\">Accept</a> / <a href='#' style='color:crimson' onclick=\"deletez('$a')\">Reject</a>",'Accepted',"<p style='color:crimson'>Rejected</p>");
                                   echo"
                                   <tr >
                                        <td><a target='blank' href='$b'>View Valid Document</a></td>
                                        <td style='color:black'>".ucwords($c)."</td>
                                        <td style='color:black'>".ucwords($d)."</td> 
                                        <td style='color:black'>".ucwords($e)."</td> 
                                        <td style='color:black'>".ucwords($f)."</td>
                                        <td style='color:black'>".ucwords($g)."</td>
                                        <td id='t$a'>".$stat[$j]."</td>
                                   </tr>";
                               }
                            }else{
                                return $qry->error;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
           
            
            <button id="menux"> 
                Menu
            </button>
        </div>
    </div>
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
            url:"process/accept_rejectben.php",
            success:(e)=>{ 
                alert("Successfully Accepted!");
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
            url:"process/accept_rejectben.php",
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