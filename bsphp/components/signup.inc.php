<header class="page-header gradient">
      <div class="container pt-5">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5">
          <h2>Create an Account</h2>
             <form  method="post" action="signup.php">
            	<?php include('errors.inc.php'); ?>
  	                <div class="input-group">
  	                    <label>Name:</label>
                        <?php
                          //These cursed lines are to line up the labels using whitespace
                          echo str_repeat("&nbsp;", 28);
                          ?>
                          <br>
  	                    <input 
                            type="text" 
                            name="ho_username" 
                            value="<?php echo $username; ?>"
                        >
  	                </div>
                	<div class="input-group">
  	                     <label>Email:</label>
                         <?php
                          echo str_repeat("&nbsp;", 29); 
                          echo str_repeat("&hairsp;", 2);
                          ?>
  	                     <input 
                           type="email" 
                           name="ho_email" 
                           value="<?php echo $email; ?>"
                        >
  	                </div>
                	<div class="input-group">
  	                     <label>Password:</label>
                         <?php
                          echo str_repeat("&nbsp;", 22); 
                          echo str_repeat("&hairsp;", 1);
                          ?>
  	                    <input 
                          type="password" 
                          name="password_1"
                        >
  	                </div>
                	<div class="input-group">
  	                     <label>Confirm password:</label>
                         <?php
                          echo str_repeat("&nbsp;", 5); 
                          echo str_repeat("&hairsp;", 1);
                          ?>
  	                    <input 
                          type="password" 
                          name="password_2"
                        >
  	                </div>
                    <div class="input-group">
  	                     <label>Phone Number:</label>
                         <?php
                          echo str_repeat("&nbsp;", 9); 
                          echo str_repeat("&hairsp;", 5);
                          ?>
  	                    <input 
                          type="number" 
                          name="ho_phonenumber"
                        >
  	                </div>
                    <div class="input-group">
  	                     <label>Credit Card:</label>
                         <?php
                          echo str_repeat("&nbsp;", 19); 
                          echo str_repeat("&hairsp;", 0);
                          ?>
  	                    <input 
                          type="number" 
                          name="ho_creditcard"
                        >
  	                </div>
                    <div class="input-group">
  	                     <label>Bank Account:</label>
                         <?php
                          echo str_repeat("&nbsp;", 13); 
                          echo str_repeat("&hairsp;", 1);
                          ?>
  	                    <input 
                          type="number" 
                          name="ho_bankaccount"
                        >
                    <div class="input-group">
  	                 <button type="submit" 
					   		             class="btn btn-outline-success" 
							               name="reg_user">Sign Up</button>
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