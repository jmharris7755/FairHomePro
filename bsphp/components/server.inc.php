<?php
if(!isset($_SESSION)){

  session_start();
}

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
  $ho_username = mysqli_real_escape_string($db, $_POST['ho_username']);
  $ho_email = mysqli_real_escape_string($db, $_POST['ho_email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $ho_phonenumber = mysqli_real_escape_string($db, $_POST['ho_phonenumber']);
  $ho_creditcard = mysqli_real_escape_string($db, $_POST['ho_creditcard']);
  $ho_bankaccount = mysqli_real_escape_string($db, $_POST['ho_bankaccount']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($ho_username)) { array_push($errors, "Name is required"); }
  if (empty($ho_email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if (empty($ho_phonenumber)) { array_push($errors, "Phone Number is required"); }
  //if (empty($creditcard)) { array_push($errors, "Credit Card is required"); }
  //if (empty($bankaccount)) { array_push($errors, "Bank Account is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM homeowners WHERE HO_email='$ho_email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists

    if ($user['HO_email'] === $ho_email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password_1;//encrypt the password before saving in the database

    //Query to insert homeowner information into homeowners table
  	$homeowner_query = "INSERT INTO homeowners (HO_name, HO_email, password, HO_phone, HO_creditcard, HO_bankaccount) 
  			  VALUES('$ho_username', '$ho_email', '$password', '$ho_phonenumber', '$ho_creditcard', '$ho_bankaccount')";

    //Query to insert homeowner email info homes table
    //$owner_owns_query = "INSERT INTO owns (ho_email)
      //    VALUES('$email')";
  	mysqli_query($db, $homeowner_query);
    //mysqli_query($db, $owner_owns_query);
  	$_SESSION['ho_email'] = $ho_email;
    $_SESSION['c_name'] = $ho_username;
  	$_SESSION['success'] = "You are now logged in";
    $_SESSION['loggedIn'] = TRUE;
  	header('location: add_home.php');
  }
}

// Add Home to Homes table after registering and fililng out home form
if (isset($_POST['reg_home'])) {
  // receive all input values from the form
  $street = mysqli_real_escape_string($db, $_POST['street']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $zip_code = mysqli_real_escape_string($db, $_POST['zip_code']);
  $const_type = mysqli_real_escape_string($db, $_POST['const_type']);
  $floor_type = mysqli_real_escape_string($db, $_POST['floor_type']);
  $h_sqft = mysqli_real_escape_string($db, $_POST['h_sqft']);
  $y_sqft = mysqli_real_escape_string($db, $_POST['y_sqft']);
  $plant_type = mysqli_real_escape_string($db, $_POST['plant_type']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($street)) { array_push($errors, "Street is required"); }
  if (empty($city)) { array_push($errors, "City is required"); }
  if (empty($state)) { array_push($errors, "State is required"); }
  if (empty($zip_code)) { array_push($errors, "Zip code is required"); }
  if (empty($const_type)) { array_push($errors, "Construction Type is required"); }
  if (empty($floor_type)) { array_push($errors, "Floor Type is required"); }
  if (empty($h_sqft)) { array_push($errors, "Home size is required"); }
  if (empty($y_sqft)) { array_push($errors, "Yard size is required"); }
  //if (empty($creditcard)) { array_push($errors, "Credit Card is required"); }
  //if (empty($bankaccount)) { array_push($errors, "Bank Account is required"); }

  // first check the database to make sure 
  // a home does not already exist with the same Address
  $home_check_query = "SELECT * FROM homes WHERE street='$street' AND city='$city' AND state='$state' AND zip='$zip_code' LIMIT 1";
  $home_result = mysqli_query($db, $home_check_query);
  $home = mysqli_fetch_assoc($home_result);
  
  if ($home) { // if home exists

    if ($home['street'] === $street && $home['city'] === $city && $home['state'] === $state && $home['zip'] === $zip_code) {
      array_push($errors, "home already exists");
    }
  }

  // Finally, register home if there are no errors in the form
  if (count($errors) == 0) {

    //get email of current user logged in / signed up
    //use to add info to owns table
    $ho_email = $_SESSION['ho_email'];

    //Query to inset home info into homes table for the homeowner
  	$homes_query = "INSERT INTO homes (street, city, state, zip, constr_type, floors, h_sq_ft, y_sq_ft) 
  			  VALUES('$street', '$city', '$state', '$zip_code', '$const_type', '$floor_type', '$h_sqft', '$y_sqft')";

    //Also insert into the owns table
    //Query to insert homeowner email and home info into owns table
    $homes_owns_query = "INSERT INTO owns (HO_email, street, city, state, zip)
          VALUES('$ho_email', '$street', '$city', '$state', '$zip_code')";

    $homes_plants_query = "INSERT INTO plant_types (street, city, state, zip, plant_type)
          VALUES('$street', '$city', '$state', '$zip_code', '$plant_type')";
  	mysqli_query($db, $homes_query);
    mysqli_query($db, $homes_owns_query);
    mysqli_query($db, $homes_plants_query);

  	$_SESSION['street'] = $street;
    $_SESSION['city'] = $city;
    $_SESSION['state'] = $state;
    $_SESSION['zip_code'] = $zip_code;
  	$_SESSION['success'] = "Home is registered";
    $_SESSION['loggedIn'] = TRUE;
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $ho_email = mysqli_real_escape_string($db, $_POST['ho_email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($ho_email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = $password;
        $login_query = "SELECT * FROM homeowners WHERE HO_email='$ho_email' AND password='$password'";
        $login_results = mysqli_query($db, $login_query);

        if (mysqli_num_rows($login_results)) {
          while($c_row = mysqli_fetch_array($login_results)){
              $_SESSION['ho_username'] = $c_row['HO_name'];
              $_SESSION['ho_email'] = $c_row['HO_email'];
              $_SESSION['ho_phone'] = $c_row['HO_phone'];
              $_SESSION['ho_creditcard'] = $c_row['HO_creditcard'];
              $_SESSION['ho_bankaccount'] = $c_row['HO_bankaccount'];
          }
          $_SESSION['success'] = "You are now logged in";
          $_SESSION['loggedIn'] = TRUE;
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }

//Get Account info when Account button is pushed
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
  else {
      array_push($errors, "Error going to account page");
  }
}

  //Query to update customer account info
  if (isset($_POST['update_c_info'])){
    $ho_username = mysqli_real_escape_string($db, $_POST['ho_username']);
    $ho_email = mysqli_real_escape_string($db, $_POST['ho_email']);
    $ho_phonenumber = mysqli_real_escape_string($db, $_POST['ho_phone']);
    $ho_creditcard = mysqli_real_escape_string($db, $_POST['ho_creditcard']);
    $ho_bankaccount = mysqli_real_escape_string($db, $_POST['ho_bankaccount']);
    
    
    if (empty($ho_username)) {
      array_push($errors, "Name is required");
    }

    if (empty($ho_phonenumber)) {
      array_push($errors, "Phone Number is required");
    }

    if(count($errors) == 0){

      $update_query = "UPDATE homeowners SET HO_name='$ho_username', 
                      HO_phone = '$ho_phonenumber', HO_creditcard='$ho_creditcard', 
                      HO_bankaccount='$ho_bankaccount'
                      WHERE HO_email='$ho_email'";

      $update_info_results = mysqli_query($db, $update_query);


    }

    //Get updated info from database
    $updated_c_info_query = "SELECT * from homeowners WHERE HO_email = '$ho_email'";
    $updated_c_info_results= mysqli_query($db, $updated_c_info_query);

    if(mysqli_num_rows($updated_c_info_results)){
      while($c_row = mysqli_fetch_array($updated_c_info_results)){
        $_SESSION['ho_username'] = $c_row['HO_name'];
        $_SESSION['ho_email'] = $c_row['HO_email'];
        $_SESSION['ho_phone'] = $c_row['HO_phone'];
        $_SESSION['ho_creditcard'] = $c_row['HO_creditcard'];
        $_SESSION['ho_bankaccount'] = $c_row['HO_bankaccount'];
      }
    }
  }
  
  ?>