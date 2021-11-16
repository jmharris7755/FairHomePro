<?php
session_start();

// initializing variables
$username = "";
$sp_username = "";
$sp_email = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'fairhomepro');

// REGISTER BUSINESS
if(isset($_POST['reg_business' ])) {

  $sp_username = mysqli_real_escape_string($db, $_POST['sp_username']);
  $sp_email = mysqli_real_escape_string($db, $_POST['sp_email']);
  $sp_password_1 = mysqli_real_escape_string($db, $_POST['sp_password_1']);
  $sp_password_2 = mysqli_real_escape_string($db, $_POST['sp_password_2']);
  $sp_phonenumber = mysqli_real_escape_string($db, $_POST['sp_phonenumber']);
  $sp_creditcard = mysqli_real_escape_string($db, $_POST['sp_creditcard']);
  $sp_bankaccount = mysqli_real_escape_string($db, $_POST['sp_bankaccount']);

  if (empty($sp_username)) {array_push($errors, "Business name is required");}
  if (empty($sp_email)) { array_push($errors, "Email is required"); }
  if (empty($sp_password_1)) { array_push($errors, "Password is required"); }
  if ($sp_password_1 != $sp_password_2) {
	array_push($errors, "The two passwords do not match");
}

  if (count($errors) == 0) {
  	$password = $password_1;//encrypt the password before saving in the database

  	$query = "INSERT INTO service_providers (business_name, sp_email, sp_password, sp_phone, sp_creditcard, sp_bankaccount) 
  			  VALUES('$sp_username', '$sp_email', '$sp_password', '$sp_phonenumber', '$sp_creditcard', '$sp_bankaccount')";
  	mysqli_query($db, $query);
    $_SESSION['sp_username'] = $sp_username;
  	$_SESSION['sp_email'] = $sp_email;
  	$_SESSION['success'] = "You are now logged in";
    $_SESSION['loggedIn'] = TRUE;
  	header('location: index.php');
  }
}

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);
  $creditcard = mysqli_real_escape_string($db, $_POST['creditcard']);
  $bankaccount = mysqli_real_escape_string($db, $_POST['bankaccount']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if (empty($phonenumber)) { array_push($errors, "Phone Number is required"); }
  //if (empty($creditcard)) { array_push($errors, "Credit Card is required"); }
  //if (empty($bankaccount)) { array_push($errors, "Bank Account is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM homeowners WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password_1;//encrypt the password before saving in the database

  	$query = "INSERT INTO homeowners (name, email, password, phone, creditcard, bankaccount) 
  			  VALUES('$username', '$email', '$password', '$phonenumber', '$creditcard', '$bankaccount')";
  	mysqli_query($db, $query);
  	$_SESSION['email'] = $email;
    $_SESSION['c_name'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    $_SESSION['loggedIn'] = TRUE;
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = $password;
        $query = "SELECT name FROM homeowners WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results)) {
          $_SESSION['email'] = $email;
          $_SESSION['success'] = "You are now logged in";
          $_SESSION['loggedIn'] = TRUE;
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  
  ?>