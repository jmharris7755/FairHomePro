<header class="page-header gradient">
      <div class="container pt-3">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5">

          <?php if(isset($_SESSION['loggedIn']) AND isset($_SESSION['ho_email'])): ?>
          <? //Display if user is logged in ?>

          <h2>Welcome <?php echo $_SESSION['ho_email']; ?> </h2>

          <p>
            Please select the service you wish to have done:
          </p>

                <div class="mb-3">
                    <label for="service_type" class="form-label">Service offered</label><br>
                    <select name="service_type" required>
                        <option value="">-- </option>
                    <?php $db_modal = mysqli_connect('localhost', 'root', '', 'fairhomepro');
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
                    <label for="service_type" class="form-label">Home to apply service</label><br>
                    <select name="service_type" required>
                        <option value="">-- </option>
                    <?php $home_db = mysqli_connect('localhost', 'root', '', 'fairhomepro');
                     $home_query = "SELECT homes.street
                                        FROM homes INNER JOIN owns
                                        ON 
                                        WHERE $_SESSION['ho_email'] = owns.HO_email"
                     $home_test_query = mysqli_query($home_db, $home_query);
                     while($home_temp = mysqli_fetch_assoc($home_test_query))
                     {    
                          echo "<option value= \"" . $home_temp['street'] . "\">" . $home_temp['street'] . "</option>";
                     }
                     ?>
                    </select required>
                </div>

                
          <button onclick="window.location.href='services.php'"
              type="button" 
              class="btn btn-outline-info btn-lg">
            Services
          </button>

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