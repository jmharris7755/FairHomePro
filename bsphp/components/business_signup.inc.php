<header class="page-header gradient">
      <div class="container pt-3">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5">
          <h2>Create an Account</h2>
             <form method="post" action="business_signup.php">
            	<?php include('errors.inc.php'); ?>
  	                <div class="input-group">
  	                    <label>Business name:</label> 

                          <?php
                          //These cursed lines are to line up the labels using whitespace
                          echo str_repeat("&nbsp;", 10);
                          ?>
                          <br>
  	                    <input 
                            type="text" 
                            name="sp_username" 
                            value="<?php echo $sp_username; ?>"
                        >
  	                </div>
                	<div class="input-group">
  	                     <label>Email</label>
                          <?php
                          echo str_repeat("&nbsp;", 29); 
                          echo str_repeat("&hairsp;", 2);
                          ?>
  	                     <input 
                           type="text" 
                           name="sp_email" 
                           value="<?php echo $sp_email; ?>"
                        >
  	                </div>
                	<div class="input-group">
  	                     <label>Password</label>
                          <?php
                          echo str_repeat("&nbsp;", 22); 
                          echo str_repeat("&hairsp;", 1);
                          ?>
  	                    <input 
                          type="password" 
                          name="sp_password_1"
                        >
  	                </div>
                	<div class="input-group">
  	                     <label>Confirm password</label>
                          <?php
                          echo str_repeat("&nbsp;", 5); 
                          echo str_repeat("&hairsp;", 1);
                          ?>
  	                    <input 
                          type="password" 
                          name="sp_password_2"
                        >
  	                </div>
                    <div class="input-group">
  	                     <label>Phone Number</label>
                          <?php
                          echo str_repeat("&nbsp;", 9); 
                          echo str_repeat("&hairsp;", 5);
                          ?>
  	                    <input 
                          type="number" 
                          name="sp_phonenumber"
                        >
  	                </div>
                    <div class="input-group">
  	                     <label>Credit Card</label>
                          <?php
                          echo str_repeat("&nbsp;", 19); 
                          echo str_repeat("&hairsp;", 0);
                          ?>
  	                    <input 
                          type="number" 
                          name="sp_creditcard"
                        >
  	                </div>
                    <div class="input-group">
  	                     <label>Bank Account</label>
                          <?php
                          echo str_repeat("&nbsp;", 13); 
                          echo str_repeat("&hairsp;", 1);
                          ?>
  	                    <input 
                          type="number" 
                          name="sp_bankaccount"
                        >
                    <div class="input-group">
  	                 <button type="submit" 
					   		             class="btn btn-outline-success" 
							               name="reg_business">Sign Up</button>
  	                </div>
  	                <p>
  		                Already a member? 
						          <button onclick="window.location.href='signin.php'"
						                  type="button" 
						                  class = "btn btn-outline-warning">
						          Sign In</button>
  	                </p>
             </form>
          </div>
        </div>
      </div>
    </header>