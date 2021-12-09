<section class="services gradient">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,96L34.3,106.7C68.6,117,137,139,206,122.7C274.3,107,343,53,411,53.3C480,53,549,107,617,117.3C685.7,128,754,96,823,96C891.4,96,960,128,1029,154.7C1097.1,181,1166,203,1234,202.7C1302.9,203,1371,181,1406,170.7L1440,160L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"
        ></path>
      </svg>
      <div class="container">
        <div class="col-md-10">
          <div class="col-md-5">
          <div class="d-flex flex-row"><img src="img/revenue_.svg" alt=""  /></div>
            <h1>Welcome to the Services Page of FairHomePro.</h1>

            <p>
              With FariHomePro, saving money on home services is so easy,
              it's like you have your own money tree!
            </p>

            <p>
              Ready to get the lowest price for the home service you need?
              Great! Select the "Select Services" button below to get started!
            </p>
            <?php if(isset($_SESSION['ho_email'])):?>
            <button onclick= "window.location.href='service_management.php'"
            type="button "
            class="btn btn-outline-success mb-3">
              Select Services
            </button>
            <?php else: ?>
            <p>
              To get started, please sign in to or create a Customer Account
              on the Home Page.
            </p>
            <button onclick= "window.location.href='index.php'"
            type="button "
            class="btn btn-outline-success mb-3">
              Home
            </button>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>