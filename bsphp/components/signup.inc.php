<header class="page-header gradient">
      <div class="container pt-3">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5">
             <form method="post" action="signup.php">
            	<?php include('errors.inc.php'); ?>
  	                <div class="input-group">
  	                    <label>Name:</label> <br>
  	                    <input 
                            type="text" 
                            name="username" 
                            value="<?php echo $username; ?>"
                        >
  	                </div>
                	<div class="input-group">
  	                     <label>Email</label>
  	                     <input 
                           type="email" 
                           name="email" 
                           value="<?php echo $email; ?>"
                        >
  	                </div>
                	<div class="input-group">
  	                     <label>Password</label>
  	                    <input 
                          type="password" 
                          name="password_1"
                        >
  	                </div>
                	<div class="input-group">
  	                     <label>Confirm password</label>
  	                    <input 
                          type="password" 
                          name="password_2"
                        >
  	                </div>
                    <div class="input-group">
  	                     <label>Phone Number</label>
  	                    <input 
                          type="number" 
                          name="phonenumber"
                        >
  	                </div>
                    <div class="input-group">
  	                     <label>Credit Card</label>
  	                    <input 
                          type="number" 
                          name="creditcard"
                        >
  	                </div>
                    <div class="input-group">
  	                     <label>Bank Account</label>
  	                    <input 
                          type="number" 
                          name="bankaccount"
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