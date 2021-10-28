<?php include('server.inc.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="signup-style.css">
</head>
<body>
  <div class="header">
  	<h2>Sign In</h2>
  </div>
	 
  <form method="post" action="signin.php">
  	<?php include('errors.inc.php'); ?>
  	<div class="input-group">
  		<label>Email</label>
  		<input type="text" name="email" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Sign-in</button>
  	</div>
  	<p>
  		Not yet a member? <a href="signup.php">Sign up</a>
  	</p>
  </form>
</body>
</html>