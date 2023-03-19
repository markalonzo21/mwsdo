<?php 
    include'../header.php';
    include'nav.php';
?>

<div class="container">
    <div class="row">
        <div class="content-heading">
            <h1 class="title">Dashboard</h1>
            <?php include 'content_heading.php'; ?>
        </div>
        <table class="table" id="his_t">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Ref No.</th>
                    <th>Type of Calamity</th>
                    <th>Proof of Image</th>
                    <th>Description</th>
                    <th>Remarks</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="tbod1">

            </tbody>
        </table>
    </div>
</div>

<!-- MODAL -->

<div class="modal fade" id="reqModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="donateModalLabel">Request for Donation</h4>
            </div>
            <div class="modal-body">
                <form class="form-donation" id="req_f" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <select type="text" class="form-control login-select php" id="type_of_donation" name="type_of_calamity" d="d" required>
                                <option value="">Select Type of Calamity</option>
                                <option value="nd">Natural Disaster</option>
                                <option value="fr">Fire</option>
                                <option value="ac">Accident</option>
                            </select>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 ">
                            Proof of Image<input type="file" class="form-control" required accept=".jpg, .jpeg, .png" name="proofOfImage">
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <textarea type="text" class="form-control php" name="desc" placeholder="Description of Request" d="d" required></textarea>
                        </div> 
                    </div>
                    <div class="row">

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary pull-right btn-round" name="donateNow">Request Now</button> 
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>

</div>

<div class="modal fade" id="cModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="donateModalLabel">Change Password</h4>
    </div>
    <div class="modal-body">

          <form class="form-donation" id="cpass_f" action="user.php" method="post">
               <div class="row">
                      <div class="form-group col-md-12 "> 
                          <input type='password' class="form-control" required placeholder="Old Password"
                          name='oldpassword'>
                      </div>
              </div>
              <div class="row">
                      <div class="form-group col-md-12 "> 
                          <input type='password' class="form-control" required placeholder="New password"
                          name='newpassword' id="cpass">
                      </div>
              </div>
              <div class="row">
                      <div class="form-group col-md-12 "> 
                          <input type='password' class="form-control" required placeholder="Retype Password"
                          name='repass' id="crepass">
                      </div>
              </div>
                  <div class="row">

                      <div class="form-group col-md-12">
                          <button type="submit" class="btn btn-primary pull-right btn-round" name="addd">Change</button> 
                      </div>

                  </div> 
          </form>

    </div>
  </div>
</div> 
</div>

</div>
</div>

<script>
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

    $("#req_f").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: host + "insert_proc/req_now.php",
            type: 'POST',
            data: formData,
            success: function(data) {
                if(data==""){
                    alert("Request Successfully Sent!");
                    document.getElementById('reqModal').getElementsByClassName("close")[0].click(); 
                    document.getElementById('req_f').reset();
                    $('#reqModal').hide('modal');
                }
            },
            error: function(e){
                console.log(e);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    function get_reqhistory(){
        $.ajax({
            url: host + "select_proc/req.php",
            method:"POST",
            data:{},
            success:(e)=>{
                tbod1.innerHTML="";
                tbod1.innerHTML=e; 
                $(document).ready(function(){ 
                $('#his_t').DataTable({
                    responsive:false,
                    sort:false
                });
                });
            }
        });
    }
    get_reqhistory();

    var cath=0;
    cpass_f.addEventListener('submit',(e)=>{
    e.preventDefault();
    if(cpass.value!=crepass.value){
        alert("incorrect Retype Password!");
        return false;
    }
    var urls= cath==1 ? "panel_proc/changepass.php" : "panel_proc/changepass1.php";
    var data=$('#cpass_f').serialize();  
    $.ajax({
        method:"POST",
        url: host + urls,
        data:data,
        success:(e)=>{  
            if(e==""){
                alert("Account Successfully Updated!");
                location.reload();
            }else{
                alert("Failed to Update Incorrect old password!");
            }
        }
        });
    },false);
    function open_pass(req){
        cath=req;
    }
</script>


<?php include'../footer.php'; ?>