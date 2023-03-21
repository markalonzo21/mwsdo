<?php 
    include'header.php';
    include'link/message.php';
?>
<div class="login-header">
    <img src="assets/images/urbizlogo.png">
    <div class="login-header-title">
        <h3 class="org">MSWDO</h3>
        <h3>Calamity Assistance Request and Monitoring System</h3>
    </div>
</div>

<div class="events-btn">
    <p class="bg-info banner-msg">
        <a href="events.php">Donation Events</a>
    </p>
</div>

    <div class="container">
        <div class="row">

		<form class="form-signin mg-btm center-login form-donation log" id="login_f">
    	<h2 class="heading-desc">Login</h2>
		<div class="main">	

        <div class="row">
            <div class="form-group col-md-12">
                <select type="text" class="form-control login-select php" name="select_login" required id="selectionz">
                    <option value="">Select User Type</option>
                    <option>Beneficiary</option>
                    <option>Donor</option>
                </select>
            </div>

            <div class="form-group col-md-12">
                <input type="text" class="form-control php" name="username" placeholder="Username" d="d" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <span class="glyphicon glyphicon-eye-open" id="show-password"></span>
                <input type="password" class="form-control php" id="password" name="password" placeholder="password" d="d" required>
            </div> 
        </div>

        <button type="button" class="btn btn-primary p-6-12 btn-round" data-toggle="modal" data-target="#donateModal">Be a Donor</button>
        <button type="button" class="btn btn-default btn-round" data-toggle="modal" data-target="#beniModal">Be a Beneficiary</button>
		<span class="clearfix"></span>	
        </div>
		<div class="login-footer">
		<div class="row">
                        <div class="col-xs-6 col-md-6">
                            <div class="left-section">
								<!-- <a href="">Sign up now</a> -->
							</div>
                        </div>
                        <div class="col-xs-6 col-md-6 pull-right">
                            <button type="submit" class="btn btn-large btn-danger pull-right btn-round" name="donateNow">Login</button>
                        </div>
                    </div>
		
		</div>
      </form>

        </div>
    </div>

    <!-- Donate Modal -->
    <div class="modal fade" id="beniModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="donateModalLabel">Be a Benificiary</h4>
          </div>
          <div class="modal-body">

                <form class="form-donation" id="beni_f">
                       <div class="row">
                            <div class="form-group col-md-12 ">
                                Upload Valid ID <input type="file" class="form-control" required accept="application/pdf,image/*" name="file">
                            </div>

                        </div>


                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="fname" placeholder="First name*">
                            </div>

                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="lname" placeholder="Last name*">
                            </div>
                        </div>


                        <div class="row">

                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="contact" placeholder="Contact number">
                            </div>

                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="address" placeholder="Address">
                            </div>

                            <div class="form-group col-md-12">
                                <label class="control-label">Select Barangay</label>
                                <select type="text" class="form-control" name="barangay" id="brgy">
                                    <option value="angatel">Angatel</option>
                                    <option value="balangay">Balangay</option>
                                    <option value="baug">Baug</option>
                                    <option value="bayaoas">Bayaoas</option>
                                    <option value="bituag">Bituag</option>
                                    <option value="camambugan">Camambugan</option>
                                    <option value="dalanguiring">Dalanguiring</option>
                                    <option value="duplac">Duplac</option>
                                    <option value="galarin">Galarin</option>
                                    <option value="gueteb">Gueteb</option>
                                    <option value="malaca">Malaca</option>
                                    <option value="malayo">Malayo</option>
                                    <option value="malibong">Malibong</option>
                                    <option value="pasibi east">Pasibi East</option>
                                    <option value="pasibi west">Pasibi West</option>
                                    <option value="pisuac">Pisuac</option>
                                    <option value="poblacion">Poblacion</option>
                                    <option value="real">real</option>
                                    <option value="salavante">Salavante</option>
                                    <option value="sawat">Sawat</option>
                                </select>
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="Password" id="bpass">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" name="repassword" placeholder="Retype Password" id="brepass">
                            </div>
                        </div> 
 
                        <div class="row">

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary pull-right btn-round" name="donateNow" id="b_iid" >Register</button>
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
            <h4 class="modal-title" id="donateModalLabel">Be a Benificiary</h4>
          </div>
          <div class="modal-body">

                <form class="form-donation" id="volun_f">

                        <h3 class="title-style-1 text-center">Beneficiary Registration<span class="title-under"></span>  </h3>

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
                                Upload Valid Document  (Image or PDF)<input type="file" class="form-control" required accept="images/*">
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 ">
                                <input type="text" class="form-control php" name="fullname" placeholder="Fullname" d="d" required>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 ">
                                <input type="email" class="form-control php" name="email" placeholder="Email Address" d="d" required>
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
    
    

 <div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="donateModalLabel">Login</h4>
          </div>
          <div class="modal-body">

                <form class="form-donation log" id="change_f">
                        <h3 class="title-style-1 text-center">Login<span class="title-under"></span></h3>
                        
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control php" name="oldpassword" placeholder="password" d="d" required>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control php" name="newpassword" placeholder="password" d="d" required>
                            </div> 
                        </div>
                    <div class="row">
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control php" name="retypepassword" placeholder="password" d="d" required>
                            </div> 
                        </div>
                        <div class="row">

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary pull-right" name="donateNow">Register</button> 
                            </div>

                        </div> 
                </form>
            
          </div>
        </div>
      </div>
     
    </div> <!-- /.modal -->
    
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
                                <input type="text" class="form-control php" name="type_of_donation" placeholder="Type of Donation" d="d" required>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control php" name="amount" placeholder="Amount" d="d" required>
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
     
    </div> <!-- /.modal --> 
     <div class="modal fade" id="reqModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="donateModalLabel">Request for Donation</h4>
          </div>
          <div class="modal-body">

                <form class="form-donation" id="req_f">

                        <h3 class="title-style-1 text-center">Request for Donation<span class="title-under"></span>  </h3>
                       

                        <div class="row">
                            <div class="form-group col-md-12">
                                <textarea type="text" class="form-control php" name="desc" placeholder="Description of Request" d="d" required></textarea>
                            </div> 
                        </div>
                        <div class="row">

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary pull-right" name="donateNow">Request Now</button> 
                            </div>

                        </div> 
                </form>
            
          </div>
        </div>
      </div>
     
    </div> <!-- /.modal --> 
    <style>
        .mod{
            width: 900px;
        }
        @media screen and (max-width:900px){
            .mod{
                width: 100%; 
            }
        }
    </style>
 <div class="modal fade " id="historyModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

      <div class="modal-dialog mod">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="donateModalLabel">My Donation History</h4>
          </div>
          <div class="modal-body">
              <h3 class="title-style-1 text-center">My Donation History<span class="title-under"></span></h3>
              <table class="table" id="his_t">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type of Donation</th>
                        <th>Amount</th>
                        <th>Details </th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="tbod">
                   
                </tbody>
              </table>
          </div>
        </div>
      </div>
     
    </div> <!-- /.modal -->
    
    <div class="modal fade " id="reqHistoryModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">
      <div class="modal-dialog mod">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="donateModalLabel">My Request History</h4>
          </div>
          <div class="modal-body">
              <h3 class="title-style-1 text-center">My Request History<span class="title-under"></span></h3>
              <table class="table" id="hist_t11">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Amount Received</th>
                        <th>Remarks</th> 
                        <th>Status </th>
                        
                    </tr>
                </thead>
                <tbody id="tbod1">
                   
                </tbody>
              </table>
          </div>
        </div>
      </div>
     
    </div> <!-- /.modal -->
     <div class="modal fade" id="receiveModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="donateModalLabel">Received Amount</h4>
          </div>
          <div class="modal-body">

                <form class="form-donation" id="receive_f">

                        <h3 class="title-style-1 text-center">Received Amount<span class="title-under"></span>  </h3>
                       

                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control php" name="type_of_donation" placeholder="Input Amount"id="amountz" required>
                            </div> 
                        </div> 
                        <div class="row">

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary pull-right" name="donateNow">Submit</button> 
                            </div>

                        </div> 
                </form>
            
          </div>
        </div>
      </div>
     
    </div> <!-- /.modal --> 
    

 
    <script src="php.js"></script>
    <script>
            var aja=new XMLHttpRequest || new webkitXMLHttpRequest || new msXMLHttpRequest || new oXMLHttpRequest || new mozXMLHttpRequest; 
            var aja1=new XMLHttpRequest || new webkitXMLHttpRequest || new msXMLHttpRequest || new oXMLHttpRequest || new mozXMLHttpRequest; 
            var bid;
            var fid;
            var mod_id;
            var volun_true=false;
            var logged="<?php echo isset($_SESSION['id_123']) ? 1 : 0; ?>";
            aja.upload.addEventListener("progress",(e)=>{
               document.getElementById(bid).innerHTML="please Wait.."+parseInt((e.loaded/e.total)*100)+"%";
            },false); 

            $('#show-password').on('click', (e) => {
                const icon = $("#show-password");
                // toggle icon
                if(icon.hasClass("glyphicon-eye-open")){
                    icon.removeClass("glyphicon-eye-open");
                    icon.addClass("glyphicon-eye-close");
                }else{
                    icon.removeClass("glyphicon-eye-close");
                    icon.addClass("glyphicon-eye-open");
                }

                // toggle type
                var input = $("#password");
                var current_val = input.val();
                if(input.attr("type") === "text"){
                    input.attr("type", "password");
                }else{
                    input.attr("type", "text");
                }
                input.val(current_val);
            })

            aja.addEventListener("load",(e)=>{  
                if(e.target.responseText==""){
                    if(volun_true==false){
                        alert("Successfully Registered! \n Please wait the admin is still verifying your account!");
                    }else{
                        alert("Successfully Registered! \n The Admin is now verifying your data!");
                    }
                    document.getElementById(mod_id).getElementsByClassName("close")[0].click(); 
                    document.getElementById(fid).reset()
                }else{
                    alert("Username is Already Taken!");
                }
                
                document.getElementById(bid).style.pointerEvents="all";
                document.getElementById(bid).innerHTML="Register";
            },false);  
            function logout(){
                $.ajax({
                    url:"panel_proc/logout.php",
                    method:"POST",
                    data:{},
                    success:(e)=>{
                        location.reload();
                    }
                });
            }
            aja1.addEventListener("load",(e)=>{ 
                if(e.target.responseText=="Login Successfully"){
                    $('#loginModal').modal("hide");
                    get_nav();
                    logged=1; 
                    document.getElementsByClassName('log')[0].reset();
                    
                    document.getElementsByClassName('log')[1].reset();
                    req_notify();
                }else{
                    alert("Failed to login!");
                }
                get_nav();
            },false);
            function poost(json){  
                aja.open("POST",json.url);
                aja.send(json.data); 
            }
            function poost1(json, loginType){  
                aja1.open("POST",json.url);

                aja1.onreadystatechange = function () {
                    if(aja1.readyState == 4 && aja1.status === 200){
                        console.log(aja1.responseText);
                        if (aja1.responseText == "Login Successfully") {
                            window.location.href = loginType === 'Donor' ? "donor" : "bene";
                        } else {
                            alert("Invalid login credentials. Please try again.");
                        }
                    }
                }

                aja1.send(json.data); 
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
                    mod_id="donateModal";
                    document.getElementById(bid).style.pointerEvents="none";
                    poost({
                        url:"registration_proc/donor_reg.php",
                        data:serialize_form("donor_f")
                    });
                     repass.style.borderColor="rgba(0,0,0,0.2)";
                }else{
                    repass.style.borderColor="red";
                }
                
            },false);

           beni_f.addEventListener("submit",(e)=>{
                    e.preventDefault();  
                    if(confirm("Are you sure want to Register?")==false){
                        return;
                    }
                    if(bpass.value==brepass.value){ 
                        bid="b_iid";
                        fid="beni_f";
                        mod_id="beniModal";
                        document.getElementById(bid).style.pointerEvents="none";
                        var data = serialize_form("beni_f");
                        data.append("barangay", brgy.value);
                        poost({
                            url:"registration_proc/beni_reg.php",
                            data:data
                        });
                         brepass.style.borderColor="rgba(0,0,0,0.2)";
                    }else{
                        brepass.style.borderColor="red";
                    }

        },false);
        
        login_f.addEventListener("submit",(e)=>{
            var data=serialize_form("login_f");
            data.append("select_login",selectionz.value);
            var url= selectionz.value=="Beneficiary" ? "login_proc/bene.php" : "login_proc/donor.php";
            e.preventDefault();   
                poost1({
                    url:url,
                    data:data
                }, selectionz.value);
           },false);
        
        donates_f.addEventListener("submit",(e)=>{
            e.preventDefault();
            if(confirm("Are you sure you want to submit it?")==false){
                return false;
            }
            $.ajax({
                url:"insert_proc/donate_now.php",
                method:"POST",
                data:$('#donates_f').serializeArray(),
                success:(e)=>{ 
                    if(e==""){
                        alert("Donation Successfully Sent!");
                        document.getElementById('donatesModal').getElementsByClassName("close")[0].click(); 
                        document.getElementById('donates_f').reset();
                    }
                }
            })
        },false);
        
        req_f.addEventListener("submit",(e)=>{
            e.preventDefault();
            if(confirm("Are you sure you want to submit it?")==false){
                return false;
            }
            $.ajax({
                url:"insert_proc/req_now.php",
                method:"POST",
                data:$('#req_f').serializeArray(),
                success:(e)=>{ 
                    if(e==""){
                        alert("Request Successfully Sent!");
                        document.getElementById('reqModal').getElementsByClassName("close")[0].click(); 
                        document.getElementById('req_f').reset();
                        $('#reqModal').hide('modal');
                    }
                }
            })
        },false); 
        
        function get_history(){
             tbod.innerHTML="";
             $.ajax({
                    url:"select_proc/donor_details.php",
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
                        $('#historyModal').modal("show");
                    }
                });
        }
        function get_reqhistory(){
             $.ajax({
                    url:"select_proc/req.php",
                    method:"POST",
                    data:{},
                    success:(e)=>{
                        tbod1.innerHTML="";
                        tbod1.innerHTML=e; 
                        $(document).ready(function(){ 
                        $('#hist_t11').DataTable({
                            responsive:false,
                            sort:false
                        });
                        });
                        $('#reqHistoryModal').modal("show");
                    }
                });
        }
        function readmore(id1,id2){
                    if(document.getElementById(id2).innerHTML=="..Read More"){
                        document.getElementById(id2).innerHTML=" hide";
                        document.getElementById(id1).style.display="inline";
                    }else{
                        document.getElementById(id2).innerHTML="..Read More";
                        document.getElementById(id1).style.display="none";
                    }
        } 
        var iddz="";
        function set_amount(id){ 
            iddz=id;
            $('#receiveModal').modal("show");
        }
        receive_f.addEventListener("submit",(e)=>{
            e.preventDefault();
            $.ajax({
                url:"insert_proc/receive.php",
                method:"post",
                data:{id:iddz,amount:amountz.value},
                success:(e)=>{ 
                    alert("Amount Successfully set!"); 
                    $('#receiveModal').modal("hide");
                    window.location.reload();
                    receive_f.reset();
                }
            })
        },false);
        function req_notify(){
            $.ajax({
                url:"select_proc/req_notif.php",
                method:"post",
                data:{},
                success:(e)=>{ 
                    if(e!=0&&logged==1){ 
                        notif.innerHTML=' ( '+e+' )';
                    }
                    window.setTimeout(()=>{
                        req_notify();
                    },2000);
                }
            });  
        }
        req_notify();
    </script>


<?php include'footer.php'; ?>