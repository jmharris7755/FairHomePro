<header class="page-header gradient">
      <div class="container pt-3">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-8">
          <h2>Please fill out this page and give a detailed description of your grievance and we will get back to you in 1-2 buisiness days</h2>
             <form method="post" action="complaints.php">
            	<?php include('errors.inc.php'); ?>
  	                <div class="input-group">
                <div class="mb-3">
                    <label for="contract_complaint" class="form-label">What contract ID do you want to file a complaint to?</label><br>
                    <select name="contract_complaint" required>
                        <option value="">-- </option>
                    <?php 

                     if (isset($_SESSION['sp_email']))
                    {
                    $sp_email = $_SESSION['sp_email'];
                     $contract_query = "SELECT contract_ID 
                     FROM contract
                     WHERE SP_email = '$sp_email'";
                     $test_query = mysqli_query($db, $contract_query);
                     while($temp = mysqli_fetch_assoc($test_query))
                     {    
                          echo "<option value= \"" . $temp['contract_ID'] . "\">" . $temp['contract_ID'] . "</option>";
                     }
                     }
                    if (isset($_SESSION['ho_email']))
                    {
                    $ho_email = $_SESSION['ho_email'];
                     $contract_query = "SELECT contract_ID 
                     FROM contract
                     WHERE HO_email = '$ho_email'";
                     $test_query = mysqli_query($db, $contract_query);
                     while($temp = mysqli_fetch_assoc($test_query))
                     {    
                          echo "<option value= \"" . $temp['contract_ID'] . "\">" . $temp['contract_ID'] . "</option>";
                     }
                     }
                     ?>
                    </select required>
                </div>
                <label for="complaints_text"> Please describe the issues you are having. </label><br>
                <div>
                <textarea name="complaints_text" rows="4" cols="50" required ></textarea>
                </div>
                </form>

                    <div class="input-group">
  	                 <button type="submit" 
					   		             class="btn btn-outline-success" 
							               name="file_complaint">File complaint</button>
                                           <?php echo str_repeat("&nbsp;", 5); ?>
                    <button onclick="window.location.href='index.php'"
					   		             class="btn btn-outline-warning" 
							               name="home_button">Home</button>
  	                </div>
             </form>
             <?php if (isset($_POST['file_complaint']))
             {
                echo "Thank you for filing a complaint with us!";
             }  
             ?>
          </div>
        </div>
      </div>
    </header>
          