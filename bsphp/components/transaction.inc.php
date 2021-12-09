<header class="page-header gradient">
      <div class="container pt-3">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-8">
          <h2>Confirm Payment</h2>
             <form method="post" action="transaction.php">
            	<?php include('errors.inc.php'); ?>
  	                <div class="input-group">
                 Do you wish to use the credit card on file?
                 <input type="checkbox" name="cc_check" value="yes" 
                 <?php
                 if(isset($_POST['cc_check']))
                   echo "checked"; ?> >
                

                 <small> (Check on for yes off for no) </small>
                          </div>
                
                          <?php
                            if(!isset($_POST['cc_check'])) {
                            echo "<div class=\"input-group\">
  	                            <label>Enter your credit card number: </label>";
                          
                          echo str_repeat("&nbsp;", 5); 
                          echo str_repeat("&hairsp;", 1);
                          
  	                echo  "<input 
                          type=\"password\" 
                          name=\"CC_number\"
                        >
  	                </div>";
                            
                            }   
                          ?>
                	
                   
                    <div class="input-group">
  	                 <button type="submit" 
					   		             class="btn btn-outline-success" 
							               name="make_payment">Make payment</button>
  	                </div>
             </form>
          </div>
        </div>
      </div>
    </header>
          