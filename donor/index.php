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
                    <!-- <th>Type of Donation</th> -->
                    <th>Donation</th>
                    <th>Details </th>
                    <th>Status</th>
                    <th>Proof of Payment</th>
                </tr>
            </thead>
            <tbody id="tbod">

            </tbody>
        </table>
    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="donatesModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="donateModalLabel">Send Donation</h4>
            </div>
            <div class="modal-body">
                <form class="form-donation" id="donates_f">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <select type="text" class="form-control login-select php" id="type_of_donation" name="type_of_donation" d="d" required>
                                <option value="">Select Type of Donation</option>
                                <option value="cash">Cash</option>
                                <option value="relief">Relief</option>
                            </select>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control php" name="amount" id="amount" placeholder="Amount" d="d">
                            <div class="relief-input" id="relief-input" style="display:none;">
                                <input type="text" class="form-control php" name="relief" id="relief" placeholder="Relief" d="d">
                                <span class="help-block">Comma separated list</span>
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <textarea type="text" class="form-control php" name="detail" placeholder="Details" d="d" required></textarea>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary pull-right btn-round" name="donateNow">Donate Now</button> 
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="qrdonatesModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="donateModalLabel">Send Donation</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-info" role="alert">Scan using your Gcash app</div>
                <form class="qrform-donation" id="qrdonates_f">
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" class="thumbnail">
                                <img src="../assets/images/qr_img.jpg" alt="">
                            </a>
                        </div> 
                    </div>
                    <input type="hidden" name="row_id" id="row_id">
                    <div class="row">
                        <div class="form-group col-md-12">
                            Proof of Payment (upload screen shot here)
                            <input type="file" class="form-control" name="qr" required accept=".jpg, .jpeg, .png">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary pull-right" name="donateNow">Donate Now</button> 
                        </div>
                    </div> 
                </form>
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
                          <button type="submit" class="btn btn-primary pull-right" name="addd">Change</button> 
                      </div>

                  </div> 
          </form>

    </div>
  </div>
</div> 
</div> <!-- /.modal -->
</div>
</div>


<script>
    const amountField = document.getElementById('amount');
    const reliefField = document.getElementById('relief');
    const reliefDiv = document.getElementById('relief-input');

    document.getElementById('type_of_donation').addEventListener('change', function () {
        let selectedVal = this.value;
        const amountField = document.getElementById('amount');
        const reliefField = document.getElementById('relief-input');

        if(selectedVal === 'relief'){
            amountField.value = '';
            amountField.style.display = 'none';
            reliefDiv.style.display = 'block';
        }else{
            reliefField.value = '';
            amountField.style.display = 'block';
            reliefDiv.style.display = 'none';
        }

    });
    
    var row_id="";
    function set_id(id){
        $('input[name="row_id"]').val(id);
    }
    $("#qrdonates_f").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: host + "insert_proc/proof_of_payment.php",
            type: 'POST',
            data: formData,
            success: function(data){
                if(data==""){
                    alert("Donation Successfully Sent!");
                    document.getElementById('qrdonatesModal').getElementsByClassName("close")[0].click(); 
                    document.getElementById('qrdonates_f').reset();
                    $('#qrdonatesModal').hide('modal');
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    donates_f.addEventListener("submit",(e)=>{
        e.preventDefault();
        console.log($('#donates_f').serializeArray());
        console.log(amountField.value);
        
        if((amountField.value == '' && amountField.style.display === 'block') || 
            (reliefField.value == '' && reliefField.style.display === 'block')){
            let field = amountField.style.display === 'block' ? 'Amount' : 'Relief';
            alert(field + ' Field required!');
            return false;
        }
        else{
            if(confirm("Are you sure you want to submit it?")==false){
                return false;
            }
            $.ajax({
                url: host + "/insert_proc/donate_now.php",
                method:"POST",
                data:$('#donates_f').serializeArray(),
                success:(e)=>{ 
                    if(e==""){
                        alert("Donation Successfully Sent!");
                        get_history();
                        document.getElementById('donatesModal').getElementsByClassName("close")[0].click(); 
                        document.getElementById('donates_f').reset();
                    }
                },
                error: (e) => {
                    console.log(e);
                }
            })
        }
    },false);

    function get_history(){
        console.log('get history!');
        tbod.innerHTML="";
        $.ajax({
            url: host + "/select_proc/donor_details.php",
            method:"POST",
            data:{},
            success:(e)=>{ 
                tbod.innerHTML=e; 
                $(document).ready(function(){
                $('#his_t').DataTable({
                    responsive:false,
                    sort:false
                });
                });
            }
        });
    }
    get_history();

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