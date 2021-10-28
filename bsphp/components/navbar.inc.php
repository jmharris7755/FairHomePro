<?php include('server.inc.php') ?>

<?php

$_SESSION['email'] = $email;
$_SESSION['loggedIn'] = true;
?>

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
            <?php if($_SESSION['loggedIn']): ?>
                <span>Welcome <?php echo $_SESSION['email']; ?></span>
            <?php endif; ?>
            <?php if($_SESSION['loggedIn']): ?>
            <button onclick = "$_SESSION['loggedIn'] = false;" >Log Out</button>
            <?php else: ?>
            <button>Log In</button>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>