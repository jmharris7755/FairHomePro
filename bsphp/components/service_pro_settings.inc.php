
<header class="page-header gradient">
      <div class="container pt-5">
      <div class="row align-items-center justify-content-center">
        <div class ="col-md 6">
        <h2>Current Account Information</h2>
        </div>
        <div class ="col-md 6">
                  <h2>Change Account Information</h2>
      </div>
        <div class="row align-items-center justify-content-center">
          <div class="col-md-4 col-md-offset">
          <span class="text-right">

            <div>
                Business Name: <?php
                $username = $_SESSION['sp_username'];
                print  $username; ?>
            </div>
            <div class="row top-buffer">
                Business Name: <?php
                $username = $_SESSION['sp_username'];
                print  $username; ?>
            </div>
            <div>
                Business Name: <?php
                $username = $_SESSION['sp_username'];
                print  $username; ?>            </div>
            <div>
                Business Name: <?php
                $username = $_SESSION['sp_username'];
                print  $username; ?>
            </div>
            <div>
                Business Name: <?php
                $username = $_SESSION['sp_username'];
                print  $username; ?>
            </div>
            <div>
                Business Name: <?php
                $username = $_SESSION['sp_username'];
                print  $username; ?>
            </div>

          </div>
          </span>
          <div class="col-md-4">
          <span class="text-right">
             <form method="post" action="signup.php">
            	<?php include('errors.inc.php'); ?>
  	                <div>
  	                    Change Name:
                          <br>
  	                </div>
                	<div>
  	                     Change Email:
  	                </div>
                	<div>
  	                     <label>Change Password:</label>
  	                </div>
                	<div>
  	                     <label>Confirm password:</label>
  	                </div>
                    <div>
  	                     <label>Change Phone:</label>
  	                </div>
                    <div>
  	                     <label>Change Credit Card:</label>
  	                </div>
                    <div>
  	                     <label>Change Bank:</label>
             </form>
          </div>
        </div>
        </span>

        <?php // might have to use <div class="input-group"> later // ?>
                    <div class="col-md-4">
                              <span class="text-right">
                         <input 
                            type="text" 
                            name="username" 
                        >
                         <input 
                           type="email" 
                           name="email" 
                        >
                         <input 
                          type="password" 
                          name="password_1"
                        >
                         <input 
                          type="password" 
                          name="password_2"
                        >
                         <input 
                          type="number" 
                          name="phonenumber"
                        >
                         <input 
                          type="number" 
                          name="creditcard"
                        >
                         <input 
                          type="number" 
                          name="bankaccount"
                        >
                        </span>
                    </div>
      </div>
    </header>