<header class="page-header gradient">
      <div class="container pt-3">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5">
             <form method="post" action="service_management.php">        

          <?php if(isset($_SESSION['loggedIn']) AND isset($_SESSION['ho_email'])): ?>
          <? //Display if user is logged in ?>

          <h2>Welcome <?php echo $_SESSION['ho_email']; ?> </h2>


          <p>
            Please select the service you wish to have done:
          </p>

                <div class="mb-3">
                    <label for="service_type" class="form-label">Service offered</label><br>
                    <select name="service_type" required>
                   <?php if(isset($_POST['service_type']))
                        {
                          echo "<option value= \"" . $_POST['service_type'] . "\">" . $_POST['service_type'] . "</option>";
                        } ?>
                        <option value="">-- </option>
                        <?php
                    $db_modal = mysqli_connect('localhost', 'root', '', 'fairhomepro');
                     $services_query = "SELECT service FROM service_types";
                     $test_query = mysqli_query($db_modal, $services_query);

                     while($temp = mysqli_fetch_assoc($test_query))
                     {    
                          echo "<option value= \"" . $temp['service'] . "\">" . $temp['service'] . "</option>";
                     }
                     ?>
                    </select required>
                </div>
                
                <div class="mb-3">
                    <label for="home_ID" class="form-label">Home to apply service</label><br>
                    <select name="home_ID" required>
                    <?php
                        if(isset($_POST['home_ID']))
                        {
                          $post_ID = $_POST['home_ID'];
                          $post_query = "SELECT home_ID, street, city, zip, state FROM homes
                          WHERE home_ID = '$post_ID'";
                     $post_test_query = mysqli_query($db_modal, $post_query);
                        while($home_temp = mysqli_fetch_assoc($post_test_query)){
                          echo "<option value= \"" . $home_temp['home_ID'] ."\">" . $home_temp['street'] .  " " . $home_temp['city'] . " "  . $home_temp['zip'] . " "  . $home_temp['state'] . "</option>";
                          }
                        }

                     $ho_email = $_SESSION['ho_email'];
                     $home_query = "SELECT homes.street, homes.city, homes.zip, homes.state, homes.home_ID FROM owns INNER JOIN homes ON owns.home_ID = homes.home_ID
                                    WHERE owns.HO_email = '$ho_email'";

                     $home_test_query = mysqli_query($db_modal, $home_query);
 
                     echo "<option value=\"\"> -- </option>";
                     while($home_temp = mysqli_fetch_assoc($home_test_query))
                     {    
                          echo "<option value= \"" . $home_temp['home_ID'] ."\">" . $home_temp['street'] .  " " . $home_temp['city'] . " "  . $home_temp['zip'] . " "  . $home_temp['state'] . "</option>";
                     }
                    ?>
                    </select required>
                </div>
                       
          <button 
                         type="submit" 
						  class = "btn btn-outline-success"
                          name = "request_bid" >
            Request bid
          </button>

          <?php if (isset($_POST['request_bid'])) {  
          $_SESSION['request_check'] = true;
          $service_select = mysqli_real_escape_string($db, $_POST['service_type']);
          $home = mysqli_real_escape_string($db, $_POST['home_ID']);

          $service_query = "SELECT *
                            FROM services  INNER JOIN (
                            SELECT MIN(s_price) AS s_price
                            FROM services
                            WHERE s_type = '$service_select') tb2
                            ON services.s_price = tb2.s_price LIMIT 1";


          $bid_request_result = mysqli_query($db, $service_query);
          if(mysqli_num_rows($bid_request_result)) {
            while($service_row = mysqli_fetch_array($bid_request_result)){
                 $_SESSION['type_provided'] = $service_row['s_type'];
                 $_SESSION['price_to_pay'] = $service_row['s_price'];
                 $_SESSION['pro_email'] = $service_row['SP_email'];
                 $_SESSION['home_ID_in_use'] = $home;
                 $type_provided = $_SESSION['type_provided'];
                 $price_to_pay = $_SESSION['price_to_pay'];
                echo "<div> Do you want " .  $_SESSION['type_provided'] . " for $" . $_SESSION['price_to_pay'] . " on home ID " . $_SESSION['home_ID_in_use']  .  " </div> ";
                echo    "<button 
                         type=\"submit\" 
						  class = \"btn btn-outline-success\"
                          name = \"transaction_generator\" >
                             Yes
                             </button>";

                echo    "
                        <button 
                         type=\"submit\" 
						  class = \"btn btn-outline-success\"
                          name = \"cancel\" >
                             No
                             </button>";

                             if(isset($_POST['cancel']))
                             {
                                  header('Location: '.$_SERVER['PHP_SELF']);
                                die;
                             }
          }


/*
if (isset($_POST['customer_account'])) {

  $account_query = "SELECT * FROM homeowners WHERE HO_email='$ho_email'";
  $account_results = mysqli_query($db, $account_query);


  if (mysqli_num_rows($account_results)) {
    while($c_row = mysqli_fetch_array($account_results)){
        $_SESSION['ho_username'] = $c_row['HO_name'];
        $_SESSION['ho_email'] = $c_row['HO_email'];
        $_SESSION['ho_phone'] = $c_row['HO_phone'];
        $_SESSION['ho_creditcard'] = $c_row['HO_creditcard'];
        $_SESSION['ho_bankaccount'] = $c_row['HO_bankaccount'];
    }
  }
*/

        }
       }
        ?>


           
           

          <p>
              Link to check existing orders / account
              Not yet working
          </p>

          <button onclick="window.location.href='customer_account.php'
                          <?php $_SESSION['c_info_edit'] = FALSE; ?>
                          <?php $_SESSION['c_home_edit'] = FALSE; ?>"
              type="button" 
              class="btn btn-outline-warning btn-lg"
              name=customer_account
              >
            Account
          </button>

        <?php elseif(isset($_SESSION['sp_email']) AND isset($_SESSION['sp_username'])): ?>
        <h2>Welcome <?php echo $_SESSION['sp_username']; ?> </h2>
          <button onclick="window.location.href='contracts.php'"
              type="button" 
              class="btn btn-outline-info btn-lg">
            Contracts
          </button>
                    <button onclick="window.location.href='service_pro_settings.php'
                          <?php $_SESSION['sp_info_edit'] = FALSE; ?>
                          <?php $_SESSION['sp_service_edit'] = FALSE; ?>"
              type="button" 
              class="btn btn-outline-warning btn-lg"
              name=sp_account
              >
            Account
          </button>

       <?php endif; ?>         
        </div>
          <div class="col-md-5">
          
          <img
            src="img/email_campaign_monochromatic.svg"
            alt="Header image"
          />
          </div>
          </div>
          </form>
          </div>
        </div>
      </div>


      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,128L48,117.3C96,107,192,85,288,80C384,75,480,85,576,112C672,139,768,181,864,181.3C960,181,1056,139,1152,122.7C1248,107,1344,117,1392,122.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>
    </header>