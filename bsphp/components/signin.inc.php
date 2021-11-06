<header class="page-header gradient">
      <div class="container pt-3">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5">
		  <h2>Sign In</h2>
             <form method="post" action="signup.php">
            	<?php include('errors.inc.php'); ?>
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
                          name="password"
                        >
  	                </div>
  	                <div class="input-group">
  	                 <button onclick="window.location.href='index.php'"
					   		type="submit" 
					   		class="btn btn-outline-warning"
							name = "login_user" 
							 >Sign In</button>
  	                </div>
  	                <p>
  		                Not a member yet? 
						  <button onclick="window.location.href='signup.php'"
						  type="button" 
						  class = "btn btn-outline-success">
						  Sign Up</button>
  	                </p>
             </form>
          </div>
        </div>
      </div>
    </header>