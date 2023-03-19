<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Donation Registration Form</title>
  <?php include 'css/css.html'; ?>
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'register.php';
        
    }
}
?>
<body>
  <div class="form">
      
      
        <li class=""><a href="#signup">Sign Up</a></li>
      
      
      

        <div id="signup">   
          <h1>THANK YOU FOR YOUR DONATION</h1>
          
          <form action="index.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' />
            </div>
			
			<div class="field-wrap">
              <label>
                Middle Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='middlename' />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' />
            </div>
			
			<div class="field-wrap">
              <label>
                Code Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='codename' />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='email' />
          </div>
		  
		  <div class="field-wrap">
            <label>
              Contact Number<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name='contactno' />
          </div>
		  
		  <div class="field-wrap">
            <label>
              Birthday <span class="req">*</span>
            </label>
            <input type="date"required autocomplete="off" name='birthdate' />
          </div>
		  
		  <div class="field-wrap">
            <label>
              Donor Date<span class="req">*</span>
            </label>
            <input type="date"required autocomplete="off" name='donordate' />
          </div>
          
          <div class="field-wrap">
            <label>
              Type of Donation<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name='typeofdonor'/>
          </div>
		  
		  <div class="field-wrap">
            <label>
              Address<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name='address'/>
          </div>
          
          <button type="submit" class="button button-block" name="register" />Donate</button>
          
          </form>

        </div>  
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
