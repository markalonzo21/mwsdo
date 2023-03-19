<?php require 'authen.php'; ?>
<?php
        include'header.php';
?>
<div class="content-heading">
    <h1 class="title">Users</h1>
    <?php include 'content_heading.php'; ?>
</div>
<div style="padding:10px">
    <button class="btn btn-lg btn-success" data-target='#addModal' data-toggle='modal'>Add User</button>
    <button class="btn btn-lg btn-warning" data-target='#cModal' data-toggle='modal'>Change Password</button>
</div>
<table class="table table-bordered" id="tbod">
    <thead>
        <tr style="background-color:dodgerblue;color:white;text-align:center !important">
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th style="width:200px !important">Contact</th>
            <th style="width:250px !important">Action</th>
        </tr>
    </thead>
    <tbody id="tbod">  
        <?php echo $user->select($con); ?>
    </tbody>
</table>
<button id="menux"> 
    Menu
</button>
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
                                        <button type="submit" class="btn btn-primary pull-right" name="addd" id="d_bid">Change</button> 
                                    </div>

                                </div> 
                        </form>

                  </div>
                </div>
              </div> 
    </div> <!-- /.modal -->
            
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="donateModalLabel">Add New User</h4>
                  </div>
                  <div class="modal-body">

                        <form class="form-donation" id="add_user" action="user.php" method="post">
                            <div class="row">
                                    <div class="form-group col-md-12 "> 
                                        <input class="form-control" required placeholder="First Name" name="fname">
                                    </div>
                            </div>
                             <div class="row">
                                    <div class="form-group col-md-12 "> 
                                        <input class="form-control" required placeholder="Last Name" name="lname">
                                    </div>
                            </div> 
                             <div class="row">
                                    <div class="form-group col-md-12 "> 
                                        <input type='email' class="form-control" required placeholder="Email Adress" name="email">
                                    </div>
                            </div>
                            <div class="row">
                                    <div class="form-group col-md-12 "> 
                                        <input type='text' class="form-control" required placeholder="Contact"
                                        name='contact'>
                                    </div>
                            </div>
                            <div class="row">
                                    <div class="form-group col-md-12 "> 
                                        <input type='text' class="form-control" required placeholder="Username"
                                        name='username'>
                                    </div>
                            </div>
                            <div class="row">
                                    <div class="form-group col-md-12 "> 
                                        <input type='password' class="form-control" required placeholder="password"
                                        name='password' id="pass">
                                    </div>
                            </div>
                            <div class="row">
                                    <div class="form-group col-md-12 "> 
                                        <input type='password' class="form-control" required placeholder="Retype Password"
                                        name='repass' id="repass">
                                    </div>
                            </div>
                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary pull-right" name="addd" id="d_bid">Add</button> 
                                    </div>

                                </div> 
                        </form>

                  </div>
                </div>
              </div> 
    </div> <!-- /.modal -->
            
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="donateModalLabel">Update User</h4>
                  </div>
                  <div class="modal-body">

                        <form class="form-donation" id="update_userz" action="user.php" method="post">
                            <input type='hidden' name="id" id="iddd">
                            <div class="row">
                                    <div class="form-group col-md-12 "> 
                                        First Name
                                        <input class="form-control" required placeholder="First Name" name="fname"
                                               id="f">
                                    </div>
                            </div>
                             <div class="row">
                                    <div class="form-group col-md-12 ">
                                         Lirst Name
                                        <input class="form-control" required placeholder="Last Name" name="lname"
                                               id="l">
                                    </div>
                            </div> 
                             <div class="row">
                                    <div class="form-group col-md-12 ">
                                        Email
                                        <input type='email' class="form-control" required placeholder="Email Adress" name="email" id="e">
                                    </div>
                            </div>
                            <div class="row">
                                    <div class="form-group col-md-12 "> 
                                        Contact
                                        <input type='text' class="form-control" required placeholder="Contact"
                                        name='contact' id='c'>
                                    </div>
                            </div>
                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success pull-right" name="addd" id="d_bid">Update</button> 
                                    </div>

                                </div> 
                        </form>

                  </div>
                </div>
              </div> 
    </div> <!-- /.modal -->
    </div>
    </div>
            
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
    var idz="";
    function updates(id){
        idz=id;
        var cc=document.getElementById('tr'+id);
        f.value     =cc.getElementsByTagName('td')[1].innerHTML;
        l.value     =cc.getElementsByTagName('td')[2].innerHTML;
        e.value     =cc.getElementsByTagName('td')[3].innerHTML;
        c.value     =cc.getElementsByTagName('td')[4].innerHTML;
        $('#updateModal').modal('show');
    }
    function deletes(id){
        if(confirm("Are you sure you want to Delete it?")==false){ 
               return;
        }
        $.ajax({
            method:"POST",
            url:"process/deleteuser.php",
            data:{id:id},
            success:(e)=>{
                alert("Successfully Deleted");
                location.reload();
            }
        });
    }
    function recovers(id){
        if(confirm("Are you sure you want to Recover it?")==false){ 
               return;
            }
         $.ajax({
            method:"POST",
            url:"process/recover.php",
            data:{id:id,recover:'qwe',pass:"recovered"},
            success:(e)=>{
                alert("The Selected Account successfully Recovered \n'\t the new password is \"Recovered\"");
            },
        });
    }
    add_user.addEventListener('submit',(e)=>{
        e.preventDefault();
        if(pass.value==repass.value){
            if(confirm("Are you sure you want to submit it?")==false){ 
               return;
            }
            $.ajax({
                method:"POST",
                url:"process/add_user.php",
                data:$('#add_user').serialize(),
                success:(e)=>{
                    if(e==""){
                        alert("User Successfully Added!");
                        location.reload();
                    }else{
                        alert("Username is Already Taken!");
                    }
                },
            });
        }else{
            alert('Incorrect Retype Password');
            e.preventDefault();
        }
    },false);
    update_userz.addEventListener('submit',(e)=>{
        e.preventDefault();
        iddd.value=idz;
        var data=$('#update_userz').serialize(); 
        $.ajax({
                method:"POST",
                url:"process/update_user.php",
                data:data,
                success:(e)=>{
                    alert(e);
                    if(e==""){
                        alert("User Successfully Updated!");
                        location.reload();
                    }else{
                        alert("Failed to Update!");
                    }
                }
            });
    },false);
    
     cpass_f.addEventListener('submit',(e)=>{
        e.preventDefault();
        if(cpass.value!=crepass.value){
            alert("incorrect Retype Password!");
            return false;
        }
        var data=$('#cpass_f').serialize(); 
        $.ajax({
                method:"POST",
                url:"process/passwordpass.php",
                data:data,
                success:(e)=>{ 
                    if(e==""){
                        alert("User Successfully Updated!");
                        window.location="process/logout.php";
                    }else{
                        alert("Failed to Update Incorrect old!");
                    }
                }
            });
    },false);
</script>