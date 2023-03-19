<?php include'header.php'; ?>
<div class="content-heading">
    <h1 class="title">Requests</h1>
    <?php include 'content_heading.php'; ?>
</div>
            <div style="padding:10px">
            
            <table class="table" id="tbod">
             <thead>
                    <tr style="background-color:dodgerblue;color:white">
                        
                        <th>Full Name</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Type of Calamity</th>
                        <th>Proof of Image</th>
                        <th>Decription of Request</th>
                        <th>Remarks</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="tbod"> 
                    
                         <?php 
                            $req=new Request();
                            echo $req->select(null,$con);
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
                    <h4 class="modal-title" id="donateModalLabel">Accept Request</h4>
                  </div>
                  <div class="modal-body">

                        <form class="form-donation" id="acc_f">
                                <div class="row">
                                    <div class="form-group col-md-12 "> 
                                        <textarea id="remarkac" class="form-control" required placeholder="Remarks"></textarea>
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
                    <h4 class="modal-title" id="donateModalLabel">Reject Request</h4>
                  </div>
                  <div class="modal-body">

                        <form class="form-donation" id="re_f">
                                <div class="row">
                                    <div class="form-group col-md-12 "> 
                                        <textarea class="form-control" required placeholder="Remarks" id="remarkre"></textarea>
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
    <?php include'broadcast.php'; ?>
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
    var ben_id="";
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
            data:{id:iid,acc:1,remark:remarkac.value,ben_id},
            url:"process/accept_rejectreq.php",
            success:(e)=>{
                alert("Request Successfully Accpepted!");
                $("#remarksModal").modal("hide");
                acc_f.reset();
               location.reload();   
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
            data:{id:iid,acc:2,remark:remarkre.value,ben_id},
            url:"process/accept_rejectreq.php",
            success:(e)=>{
                alert("Request Successfully Rejected!");
                $("#rejectModal").modal("hide");
                re_f.reset();
                location.reload();  
            }
        }); 
    });
    function acceptz(id,benid){ 
        iid=id;
        ben_id=benid;
        $('#remarksModal').modal("show");   
    }
    function deletez(id,benid){ 
        iid=id;
        ben_id=benid;
        $('#rejectModal').modal("show");   
    }
</script>