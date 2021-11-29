<header class="page-header gradient">
      <div class="container pt-3">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5">

            <? //Display if user is not logged in ?>
            <?php if(!isset($_SESSION['loggedIn'])): ?>

            <h2>Get the best price for the services you need</h2>

            <p>
              To get started, create an account. After collecting 
              some information, we'll match the services you need
              with the businesses in your area!
              Satisfaction gauranteed!
            </p>


            <button onclick="window.location.href='signup.php'"
                type="button" 
                class="btn btn-outline-success btn-lg">
              Sign-Up
            </button>

            <p>

            </p>


            <?php
            echo nl2br("\n");
             ?>


            <p> 
            Are you a business owner? Sign up here!
            </p>

            <button onclick="window.location.href='business_signup.php'"
                type="button" 
                class="btn btn-outline-success btn-lg">
              Sign-Up
            </button>

            <p>
                Already a member? Just sign-in!
            </p>

            <button onclick="window.location.href='signin.php'"
                type="button" 
                class="btn btn-outline-warning btn-lg">
              Sign-In
            </button>

          </div>
          <div class="col-md-5">
            <img
              src="img/email_campaign_monochromatic.svg"
              alt="Header image"
            />
          </div>

          <?php endif; ?>

          <?php if(isset($_SESSION['loggedIn']) AND isset($_SESSION['ho_email'])): ?>
          <? //Display if user is logged in ?>

          <h2>Welcome <?php echo $_SESSION['ho_email']; ?> </h2>

          <p>
            To get started, click on the "Services" button to tell
            us what you're looking for!
          </p>

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
          <button onclick="window.location.href='business_services.php'"
              type="button" 
              class="btn btn-outline-info btn-lg">
            Services
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