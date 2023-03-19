<?php 
    include'../header.php';
    include'nav.php';
?>

<div class="container">
    <div class="row">
        <div class="content-heading">
            <h1 class="title">Profile</h1>
            <?php include 'content_heading.php'; ?>
        </div>
        <div class="edit-profile pull-right">
        <button type="button" class="btn btn-primary btn-sm btn-round" data-toggle="modal" data-target="#editModal">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Profile</button>
        </div>
        <table class="table" id="his_t">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Full name</th>
                    <th>Contact number</th>
                    <th>Document</th>
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
            <h3 class="title-style-1 text-center">Donate now<span class="title-under"></span>  </h3>
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
                          <button type="submit" class="btn btn-primary pull-right btn-round" name="addd">Change</button> 
                      </div>

                  </div> 
          </form>

    </div>
  </div>
</div> 
</div> <!-- /.modal -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="donateModalLabel">Edit Profile</h4>
    </div>
    <div class="modal-body">

          <form class="form-donation" id="editprofile_f" method="post">
               <div class="row">
                      <div class="form-group col-md-12 "> 
                          <input type='text' class="form-control" required placeholder="Contact number" value="<?php echo $contact; ?>" name='contact'>
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
</div> <!-- /.modal -->
</div>
</div>

<script>
    function get_profile(){
        console.log('get profile!');
        tbod.innerHTML="";
        $.ajax({
            url: host + "select_proc/donor.php",
            method:"POST",
            data:{},
            success:(e)=>{ 
                console.log('data:', e);
                tbod.innerHTML=e; 
                $(document).ready(function(){
                $('#his_t').DataTable({
                    responsive:false,
                    sort:false
                });
                });
            },
            error: (e)=>{
                console.log('Error: ',e);
            }
        });
    }
    get_profile();

    editprofile_f.addEventListener('submit', (e) => {
        e.preventDefault();
        $.ajax({
            url: host + 'panel_proc/edit_donor_profile.php',
            method: "POST",
            data: $("#editprofile_f").serialize(),
            success: (e) => {
                console.log(e);
                alert('Successfully updated!');
                location.reload();
            }
        })
    })
</script>


<?php include'../footer.php'; ?>