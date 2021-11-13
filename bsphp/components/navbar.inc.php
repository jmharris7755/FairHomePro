<?php //This section is for the Navigation bar at the top of the page ?>

<?php include('server.inc.php') ?>


<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="" /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-end"
          id="navbarNav"
        >
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active"  href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.php">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="gallery.php">Gallery</a>
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li clas = "nav-item"> 
              <a clas = "nav-link" >
            <?php if(isset($_SESSION['loggedIn'])): ?>
                Welcome <?php echo $_SESSION['email']; ?>
            <?php endif; ?>
            <?php if(isset($_SESSION['loggedIn'])): ?>
             <button onclick="window.location.href='logout.php'"
                type="button" 
                class="btn btn-outline-warning btn-sm"> Logout
            </button>
            <?php else: ?>
            <button onclick="window.location.href='signin.php'"
                type="button"
                class="btn btn-outline-success btn-sm"> Sign In
              </button>
            <?php endif; ?>
            </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>