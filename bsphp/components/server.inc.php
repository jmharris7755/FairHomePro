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
  $sp_phone = mysqli_real_escape_string($db, $_POST['sp_phone']);
  $sp_creditcard = mysqli_real_escape_string($db, $_POST['sp_creditcard']);
  $sp_bankaccount = mysqli_real_escape_string($db, $_POST['sp_bankaccount']);

  if (empty($sp_username)) {array_push($errors, "Business name is required");}
  if (empty($sp_email)) { array_push($errors, "Email is required"); }
  if (empty($sp_password_1)) { array_push($errors, "Password is required"); }
  if ($sp_password_1 != $sp_password_2) {
	array_push($errors, "The two passwords do not match");
}

$user_check_query = "SELECT HO_email
                        FROM homeowners
                        WHERE HO_email = '$sp_email'
                        UNION
                        SELECT SP_email
                        FROM service_pros
                        WHERE SP_email = '$sp_email' ";

                          $result = mysqli_query($db, $user_check_query);
                         $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists

    if ($user['HO_email'] == $sp_email || $user['SP_email'] == $sp_email ) {
      array_push($errors, "email already exists");
    }
  }

  if (count($errors) == 0) {
  	$sp_password_1 = $sp_password_2;//encrypt the password before saving in the database

  	$query = "INSERT INTO service_pros (Business_Name, SP_phone, SP_email, SP_password, SP_creditcard, SP_bankaccount) 
  			  VALUES('$sp_username', $sp_phone, '$sp_email', '$sp_password_1', '$sp_creditcard', '$sp_bankaccount')";
  	mysqli_query($db, $query);
    $_SESSION['sp_username'] = $sp_username;
  	$_SESSION['sp_email'] = $sp_email;
    $_SESSION['sp_phone'] = $sp_phone;
    $_SESSION['password'] = $sp_password_1;
    $_SESSION['sp_password'] = $sp_password_1;
    $_SESSION['sp_creditcard'] = $sp_creditcard;
    $_SESSION['sp_bankaccount'] = $sp_bankaccount;
  	$_SESSION['success'] = "You are now logged in";
    $_SESSION['loggedIn'] = TRUE;
  	header('location: index.php');
  }
}

if (isset ($_POST['file_complaint'])){

$complaint_text = $_POST['complaints_text'];


$contract_ID = $_POST['contract_complaint'];
   $complaint_date = date("Y/m/d");

    $complaintID_max_query = "SELECT MAX(complaint_ID) as m from complaints";
    $complaintID_max_result = mysqli_query($db, $complaintID_max_query);
    $complaintID_max = mysqli_fetch_array($complaintID_max_result);

        if(!$complaintID_max){
      $complaint_ID = 1;
    }
    else{
      //otherwise increment max value by 1
      $complaint_ID = $complaintID_max[0] + 1;
    }


$party_involvement_query = "SELECT *
                            FROM Contract
                            WHERE contract_ID = '$contract_ID'";

$party_involvement_results = mysqli_query($db, $party_involvement_query);
if(mysqli_num_rows($party_involvement_results)){
    while($comp_row = mysqli_fetch_array($party_involvement_results))
        {
            $contract_date = $comp_row['contract_date'];
            $ho_email = $comp_row['HO_email'];
            $sp_email = $comp_row['SP_email'];
        }

}


    $query = "INSERT INTO complaints (complaint_ID, complaint_text, contract_date, complaint_date, contract_ID, HO_email, SP_email)
              VALUES('$complaint_ID', '$complaint_text', '$contract_date', '$complaint_date', '$contract_ID', '$ho_email', '$sp_email')";
    mysqli_query($db, $query);
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
  $user_check_query = "SELECT HO_email
                        FROM homeowners
                        WHERE HO_email = '$email'
                        UNION
                        SELECT SP_email
                        FROM service_pros
                        WHERE SP_email = '$email' ";

  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists

    if ($user['HO_email'] == $email || $user['SP_email'] == $email ) {
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
    $_SESSION['ho_username'] = $ho_username;
    $_SESSION['ho_phone'] = $ho_phonenumber;
    $_SESSION['ho_creditcard'] = $ho_creditcard;
    $_SESSION['ho_bankaccount'] = $ho_bankaccount;
  	$_SESSION['success'] = "You are now logged in";
    $_SESSION['loggedIn'] = TRUE;
  	header('location: add_home.php');
  }
}

//Generate Contract
if (isset($_POST['make_payment'])){
    $type = $_SESSION['type_provided'];
    $pricing = $_SESSION['price_to_pay'];
    $HID = $_SESSION['home_ID_in_use'];
    $pro_email = $_SESSION['pro_email'];
    $ho_email = $_SESSION['ho_email'];

    $contractID_max_query = "SELECT MAX(contract_ID) as m from contract";
    $contractID_max_result = mysqli_query($db, $contractID_max_query);
    $contractID_max = mysqli_fetch_array($contractID_max_result);

        if(!$contractID_max){
      $contract_ID = 1;
    }
    else{
      //otherwise increment max value by 1
      $contract_ID = $contractID_max[0] + 1;
    }

    $transactionID_max_query = "SELECT MAX(transaction_ID) as m from transaction";
    $transactionID_max_result = mysqli_query($db, $transactionID_max_query);
    $transactionID_max = mysqli_fetch_array($transactionID_max_result);

        if(!$transactionID_max){
      $transaction_ID = 1;
    }
    else{
      //otherwise increment max value by 1
      $transaction_ID = $transactionID_max[0] + 1;
    }

    $date = date("Y/m/d");

    $contract_query = "INSERT INTO contract (contract_date, contract_ID, HO_email, price, service_type, SP_email)
                       VALUES('$date','$contract_ID', '$ho_email', '$pricing', '$type', '$pro_email' )";

    mysqli_query($db, $contract_query);

    $transaction_query = "INSERT INTO transaction (transaction_date, contract_ID, HO_email, price, service_type, SP_email, transaction_ID)
                       VALUES('$date','$contract_ID', '$ho_email', '$pricing', '$type', '$pro_email', $transaction_ID )";

    mysqli_query($db, $transaction_query);
    
    header('location: customer_account.php');

    /*
      	$homes_query = "INSERT INTO homes (home_ID, street, city, state, zip, constr_type, floors, h_sq_ft, y_sq_ft) 
  			  VALUES('$home_ID','$street', '$city', '$state', '$zip_code', '$const_type', '$floor_type', '$h_sqft', '$y_sqft')";

    //Also insert into the owns table
    //Query to insert homeowner email and home info into owns table
    $homes_owns_query = "INSERT INTO owns (HO_email, home_ID)
          VALUES('$ho_email', '$home_ID')";

    $homes_plants_query = "INSERT INTO plant_types (street, city, state, zip, plant_type)
          VALUES('$street', '$city', '$state', '$zip_code', '$plant_type')";
  	mysqli_query($db, $homes_query);
    mysqli_query($db, $homes_owns_query);
    mysqli_query($db, $homes_plants_query);
    */
    

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
  if (empty($plant_type)) { array_push($errors, "Plant Type is required"); }
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


    //Get max value of home_ID in homes table

    $homeID_max_query = "SELECT MAX(home_ID) as m from homes";
    $homeID_max_result = mysqli_query($db, $homeID_max_query);
    $homeID_max = mysqli_fetch_array($homeID_max_result);


    //if homeID is empty (i.e. homes table is empty) set home_ID to 1
    if(!$homeID_max){
      $home_ID = 1;
    }
    else{
      //Otherwise increment max value by 1
      $home_ID = $homeID_max[0] + 1;
    }

    //Query to get plant_ID to insert into the has_plant table
    $plant_ID_query = "SELECT plant_ID FROM plant_types WHERE plant_type = '$plant_type'";
    $plant_ID_result = mysqli_query($db, $plant_ID_query);
    $plant_ID_arr = mysqli_fetch_array($plant_ID_result);

    $plant_ID = $plant_ID_arr[0];

    //Query to inset home info into homes table for the homeowner
  	$homes_query = "INSERT INTO homes (home_ID, street, city, state, zip, constr_type, floors, h_sq_ft, y_sq_ft) 
  			  VALUES('$home_ID', '$street', '$city', '$state', '$zip_code', '$const_type', '$floor_type', '$h_sqft', '$y_sqft')";

    //Also insert into the owns table
    //Query to insert homeowner email and home info into owns table
    $homes_owns_query = "INSERT INTO owns (home_ID, HO_email)
          VALUES('$home_ID', '$ho_email')";

    $homes_plants_query = "INSERT INTO has_plant (home_ID, plant_ID)
          VALUES('$home_ID', '$plant_ID')";


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

        $sp_query = "SELECT Business_Name FROM service_pros WHERE SP_email='$ho_email' AND SP_password='$password'";
        $sp_result = mysqli_query($db, $sp_query);
        $sp_rows = mysqli_fetch_all($sp_result, MYSQLI_ASSOC);

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
          $_SESSION['ho_email'] = $ho_email;
          header('location: index.php');        }
        else if($sp_rows){
            //If logging in as a normal user fails attempt to login as a service pro/business
                    if($sp_rows) {
                            $_SESSION['sp_username'] = $username;
  	                        $_SESSION['sp_email'] = $email;
  	                        $_SESSION['success'] = "You are now logged in";
                            $_SESSION['loggedIn'] = TRUE;

                            $query =    "SELECT * FROM service_pros WHERE SP_email = '$ho_email'";

                            $result = mysqli_query($db, $query);
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                $_SESSION['sp_username'] = $row["Business_Name"];
  	                            $_SESSION['sp_email'] = $row["SP_email"];
                                $_SESSION['sp_password'] = $row["SP_password"];
                                $_SESSION['sp_creditcard'] = $row["SP_creditcard"];
                                $_SESSION['sp_bankaccount'] = $row["SP_bankaccount"];
                                $_SESSION['sp_phone'] = $row['SP_phone'];
                            header('location: index.php');
                        }
                    }
                    else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  //Get Account info when Account button is pushed SERVICE PROS
if (isset($_POST['sp_account'])) {
  $sp_email = $_SESSION['sp_email'];
  $account_query = "SELECT * FROM service_pros WHERE SP_email='$sp_email'";
  $account_results = mysqli_query($db, $account_query);


  if (mysqli_num_rows($account_results)) {
    while($sp_row = mysqli_fetch_array($account_results)){
        $_SESSION['sp_username'] = $sp_row['Business_Name'];
        $_SESSION['sp_email'] = $sp_row['SP_email'];
        $_SESSION['sp_phone'] = $sp_row['SP_phone'];
        $_SESSION['sp_creditcard'] = $sp_row['SP_creditcard'];
        $_SESSION['sp_bankaccount'] = $sp_row['SP_bankaccount'];
        $_SESSION['sp_password'] = $sp_row['SP_password'];
    }
  }
  else {
      array_push($errors, "Error going to account page");
  }
  }

//Get Account info when Account button is pushed
if (isset($_POST['customer_account'])) {
  $ho_email = $SESSION['HO_email'];
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

  if(isset($_POST['transaction_generator']))
  {
  	header('location: transaction.php');
  }

if (isset($_POST['request_bid'])) {          
          $service_select = mysqli_real_escape_string($db, $_POST['service_type']);
          $home = mysqli_real_escape_string($db, $_POST['home_ID']);

          $service_query = "SELECT *
                            FROM services INNER JOIN (
                            SELECT MIN(s_price) AS s_price
                            FROM services
                            WHERE s_type = '$service_select') tb2
                            ON services.s_price = tb2.s_price";


          $bid_request_result = mysqli_query($db, $service_query);
          if(mysqli_num_rows($bid_request_result)) {
            while($service_row = mysqli_fetch_array($bid_request_result)){
                $s_type = $service_row['s_type'];
          }
        }


                echo $s_type;

         }
          

//Get Contract Information
function create_contracts_table(){
    $db = mysqli_connect('localhost', 'root', '', 'fairhomepro');

    if(isset($_SESSION['ho_email']))
    {
    $ho_email = $_SESSION['ho_email'];
    $services_query = "SELECT * 
                       FROM contract 
                       WHERE HO_email = '$ho_email'";
                       }
    
    elseif(isset($_SESSION['sp_email']))
    {
    $sp_email = $_SESSION['sp_email'];
    $services_query = "SELECT * 
                       FROM contract 
                       WHERE SP_email = '$sp_email'";
                       }


    $services_query_results = mysqli_query($db, $services_query);

    
    if (mysqli_num_rows($services_query_results)){
        $field = mysqli_fetch_fields($services_query_results);
        $fields = array();
        $j=0;
        $service_num=1;
        $column_name = "";
    foreach($field as $col){
            //Switch case for adjusting Table Column Names
            switch($col->name){
              case 'contract_ID':
                $column_name = 'Contract ID';
                break;
      
              case 'contract_date':
                $column_name = 'Contract Date';
                break;
      
              case 'service_type':
                $column_name = 'Service Type';
                break;
      
              case 'price':
                $column_name = 'Price';
                break;
      
              case 'SP_email':
                $column_name = 'Service Provider Email';
                break;
      
              case 'HO_email':
                $column_name = 'Homeowner Email';
                break;
      
      
            }
            echo "<th style='text-align: center'>".$column_name."</th>";
      array_push($fields, array(++$j, $col->name));
    }
    echo "</tr>";

    while($sp_row = $services_query_results->fetch_array()){
      echo "<tr>";
      for($i=0 ; $i < sizeof($fields) ; $i++){
        $fieldname = $fields[$i][1];
        $fieldvalue = $sp_row[$fieldname];
        
        echo "<td><input type='text' value='" . $fieldvalue . "'readonly ></td>";
      }
      $service_num++;
      echo "</tr>";
    }
    }
    }



    
//Get specialty information
function sp_create_specialties_table(){
    $sp_email = $_SESSION['sp_email'];
    $db = mysqli_connect('localhost', 'root', '', 'fairhomepro');

    $specialties_query = "SELECT service
                        FROM service_types INNER JOIN specialties ON service_types.service_ID = specialties.service_ID
                        WHERE specialties.SP_email = '$sp_email' ";
    $specialties_query_results = mysqli_query($db, $specialties_query);

    
    if (mysqli_num_rows($specialties_query_results)){
        $field = mysqli_fetch_fields($specialties_query_results);
        $fields = array();
        $j=0;
        $service_num=1;
        $column_name = "";

    foreach($field as $col){
      //Switch case for adjusting Table Column Names
      switch($col->name){
        case 'service':
          $column_name = 'Service';
          break;

      }
      echo "<th style='text-align: center'>".$column_name."</th>";
      array_push($fields, array(++$j, $col->name));
    }
    echo "</tr>";

    while($sp_row = $specialties_query_results->fetch_array()){
      echo "<tr>";
      for($i=0 ; $i < sizeof($fields) ; $i++){
        $fieldname = $fields[$i][1];
        $fieldvalue = $sp_row[$fieldname];
        
        echo "<td><input type='text' value='" . $fieldvalue . "'readonly ></td>";
      }
      $service_num++;
      echo "</tr>";
    }
    }
  }


//Query to update service provider account info
if (isset($_POST['update_sp_info'])){
  $sp_username = mysqli_real_escape_string($db, $_POST['sp_username']);
  $sp_email = mysqli_real_escape_string($db, $_POST['sp_email']);
  $sp_phone = mysqli_real_escape_string($db, $_POST['sp_phone']);
  $sp_creditcard = mysqli_real_escape_string($db, $_POST['sp_creditcard']);
  $sp_bankaccount = mysqli_real_escape_string($db, $_POST['sp_bankaccount']);
  $sp_password = mysqli_real_escape_string($db, $_POST['sp_password']);
    
    
  if (empty($sp_username)) {
     array_push($errors, "Name is required");
  }

  if (empty($sp_phone)) {
     array_push($errors, "Phone Number is required");
  }

  if(count($errors) == 0){

    $update_query = "UPDATE service_pros SET Business_Name ='$sp_username', 
                    SP_phone = '$sp_phone', SP_creditcard='$sp_creditcard', 
                    SP_bankaccount='$sp_bankaccount',
                    SP_password='$sp_password'
                    WHERE SP_email='$sp_email'";

    $update_info_results = mysqli_query($db, $update_query);


    }

  //Get updated info from database
  $updated_sp_info_query = "SELECT * from service_pros WHERE SP_email = '$sp_email'";
  $updated_sp_info_results= mysqli_query($db, $updated_sp_info_query);

  if(mysqli_num_rows($updated_sp_info_results)){
    while($sp_row = mysqli_fetch_array($updated_sp_info_results)){
      $_SESSION['sp_username'] = $sp_row['Business_Name'];
      $_SESSION['sp_email'] = $sp_row['SP_email'];
      $_SESSION['sp_phone'] = $sp_row['SP_phone'];
      $_SESSION['sp_creditcard'] = $sp_row['SP_creditcard'];
      $_SESSION['sp_bankaccount'] = $sp_row['SP_bankaccount'];
      $_SESSION['sp_password'] = $sp_row['SP_password'];
    }
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

// Update services in the services table
if (isset($_POST['edit_service_modal'])){
    $price= mysqli_real_escape_string($db, $_POST['price']);
    $sp_email = $_SESSION['sp_email'];
    $service_type = mysqli_real_escape_string($db, $_POST['service_type']);

        $update_query = "UPDATE services 
                         SET s_price ='$price'
                         WHERE SP_email='$sp_email' AND s_type = '$service_type'";
        $query_results = mysqli_query($db, $update_query);
}


if(isset($_POST['remove_specialty_modal'])){
    $sp_email = $_SESSION['sp_email'];
    $service_ID = mysqli_real_escape_string($db, $_POST['specialty_type']);

    $delete_specialty = "DELETE FROM specialties
                         WHERE Service_ID = '$service_ID' AND SP_email = '$sp_email'";
    mysqli_query($db, $delete_specialty);
}





if (isset($_POST['add_specialty_modal'])){
    $service_ID = mysqli_real_escape_string($db, $_POST['specialty_type']);
    $sp_email = $_SESSION['sp_email'];
    $specialtyID_max_query = "SELECT MAX(specialty_ID) as m from specialties";
    $specialtyID_max_result = mysqli_query($db, $specialtyID_max_query);
    $specialtyID_max = mysqli_fetch_array($specialtyID_max_result);

    if(!$specialtyID_max){
        $specialty_ID = 1;
    }
    else{
        $specialty_ID = $specialtyID_max[0] + 1;
    }


    $copy_check_query = "SELECT SP_email, service_ID
                    FROM specialties
                    WHERE SP_email = '$sp_email' AND service_ID = $service_ID";
    $copy_check_result = mysqli_query($db, $copy_check_query);
    $copy = mysqli_fetch_assoc($copy_check_result);

    if($copy)
    {
        if($copy['SP_email'] === $sp_email AND $copy['service_ID'] === $service_ID)
    {
      array_push($errors, "We are already specialized in that.");
     }
    }

    if(count($errors) == 0)
    {
    $specialty_insert = "INSERT INTO specialties (service_ID, specialty_ID, SP_email)
                        VALUES('$service_ID', '$specialty_ID', '$sp_email')";
    mysqli_query($db, $specialty_insert);
    }

}
    
// Add Services to services table
if (isset($_POST['add_service_modal'])){
// receive all input values from the form
    $price= mysqli_real_escape_string($db, $_POST['price']);
    $service_offering= mysqli_real_escape_string($db, $_POST['service_type']);
    $sp_email = $_SESSION['sp_email'];
    if($service_offering ==""){array_push($errors, "Please pick a service"); }  
    if($price == ""){array_push($errors, "Please add a price"); }

  $service_check_query = "SELECT * FROM services WHERE SP_email='$sp_email' AND s_type='$service_offering'LIMIT 1";
  $service_result = mysqli_query($db, $service_check_query);
  $service = mysqli_fetch_assoc($service_result);

  if($service)
  {
    if ($service['s_type'] === $service_offering && $service['SP_email'] === $sp_email)
    {
      array_push($errors, "Service already exists");
     }
  }
   if (count($errors) == 0)
   {
  	$service_insert_query = "INSERT INTO services (SP_email, s_price, s_type) 
  			  VALUES('$sp_email', '$price', '$service_offering')";

  	mysqli_query($db, $service_insert_query);
   }


}

// Add Home to Homes table from the Account page
if (isset($_POST['add_home_modal'])) {
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
  if (empty($plant_type)) { array_push($errors, "Plant Type is required"); }
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


    //Get max value of home_ID in homes table

    $homeID_max_query = "SELECT MAX(home_ID) as m from homes";
    $homeID_max_result = mysqli_query($db, $homeID_max_query);
    $homeID_max = mysqli_fetch_array($homeID_max_result);


    //if homeID is empty (i.e. homes table is empty) set home_ID to 1
    if(!$homeID_max){
      $home_ID = 1;
    }
    else{
      //Otherwise increment max value by 1
      $home_ID = $homeID_max[0] + 1;
    }

    //Query to get plant_ID to insert into the has_plant table
    $plant_ID_query = "SELECT plant_ID FROM plant_types WHERE plant_type = '$plant_type'";
    $plant_ID_result = mysqli_query($db, $plant_ID_query);
    $plant_ID_arr = mysqli_fetch_array($plant_ID_result);

    $plant_ID = $plant_ID_arr[0];

    //Query to inset home info into homes table for the homeowner
  	$homes_query = "INSERT INTO homes (home_ID, street, city, state, zip, constr_type, floors, h_sq_ft, y_sq_ft) 
  			  VALUES('$home_ID', '$street', '$city', '$state', '$zip_code', '$const_type', '$floor_type', '$h_sqft', '$y_sqft')";

    //Also insert into the owns table
    
    $homes_owns_query = "INSERT INTO owns (home_ID, HO_email)
          VALUES('$home_ID','$ho_email')";
    //Query to insert homeowner email and home info into owns table

    $homes_owns_query = "INSERT INTO owns (home_ID, HO_email)
          VALUES('$home_ID', '$ho_email')";

    $homes_plants_query = "INSERT INTO has_plant (home_ID, plant_ID)
          VALUES('$home_ID', '$plant_ID')";

    mysqli_query($db, $homes_query);

    mysqli_query($db, $homes_owns_query);
    mysqli_query($db, $homes_plants_query);

  	$_SESSION['street'] = $street;
    $_SESSION['city'] = $city;
    $_SESSION['state'] = $state;
    $_SESSION['zip_code'] = $zip_code;
  	$_SESSION['success'] = "Home is registered";
    $_SESSION['loggedIn'] = TRUE;
  	header('location: customer_account.php');
  }
}

//Query to update customer home info
if (isset($_POST['edit_homeBtn'])){
  // receive all input values from the form
  $home_ID = mysqli_real_escape_string($db, $_POST['home_ID']);
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
  if ($state =='NULL') { array_push($errors, "State is required"); }
  if (empty($zip_code)) { array_push($errors, "Zip code is required"); }
  if (empty($const_type)) { array_push($errors, "Construction Type is required"); }
  if (empty($floor_type)) { array_push($errors, "Floor Type is required"); }
  if (empty($h_sqft)) { array_push($errors, "Home size is required"); }
  if (empty($y_sqft)) { array_push($errors, "Yard size is required"); }
  //if (empty($creditcard)) { array_push($errors, "Credit Card is required"); }
  //if (empty($bankaccount)) { array_push($errors, "Bank Account is required"); }

  
  if(count($errors) == 0){
    //Query to update informaion in homes table from edit home page
    $update_home_query = "UPDATE homes SET street='$street', 
                    city = '$city', state='$state', 
                    zip='$zip_code', constr_type = '$const_type', floors='$floor_type',
                    h_sq_ft='$h_sqft', y_sq_ft='$y_sqft'
                    WHERE home_ID='$home_ID' ";


    $update_plants_query="UPDATE plant_types SET plant_type = $plant_type WHERE home_ID = '$home_ID'";

    mysqli_query($db, $update_home_query);
    //mysqli_query($db, $update_owns_query);
    mysqli_query($db, $update_plants_query);

  	$_SESSION['street'] = $street;
    $_SESSION['city'] = $city;
    $_SESSION['state'] = $state;
    $_SESSION['zip_code'] = $zip_code;
  	$_SESSION['success'] = "Home is registered";
    $_SESSION['loggedIn'] = TRUE;
  	header('location: customer_account.php');
  }
}

if(isset($POST['payment_confirm'])){

  $ho_email = $_SESSION['ho_email'];
  $ho_creditcard = mysqli_real_escape_string($db, $_POST['ho_creditcard']);
  $ho_bankaccount = mysqli_real_escape_string($db, $_POST['ho_bankaccount']);

  if (empty($ho_creditcard && $ho_bankaccount)) { array_push($errors, "Credit Card or Bank Account is required"); }

    //Get max value for contract_ID in contract table
    $contractID_max_query = "SELECT MAX(home_ID) as m from homes";
    $contractID_max_result = mysqli_query($db, $contractID_max_query);
    $contractID_max = mysqli_fetch_array($contractID_max_result);

    //if contract_ID is null set to 1
    if(!$contractID_max){
      $contract_ID = 1;
    }
    else{
      //otherwise increment max value by 1
      $contract_ID = $contractID_max[0] + 1;
    }

    //Get max value for transaction_ID in homes table
    $transID_max_query = "SELECT MAX(home_ID) as m from homes";
    $transID_max_result = mysqli_query($db, $transID_max_query);
    $transID_max = mysqli_fetch_array($transID_max_result);

    //if home_ID is null set to 1
    if(!$transID_max){
      $transaction_ID = 1;
    }
    else{
      //otherwise increment max value by 1
      $transaction_ID = $transID_max[0] + 1;
    }
    //Queries to inser values into contract and transaction tables
  $contract_insert_query = "INSERT INTO contract (contract_ID, contract_date, service_type, price, SP_email, HO_email)
                            VALUES('$contract_ID', '$contract_date', '$service_type', '$price', '$sp_email', '$ho_email')";

  $transaction_insert_query = "INSERT INTO transaction (transaction_ID, HO_email, SP_email, service_type, price, contract_ID)
                               VALUES('$transaction_ID', '$ho_email', '$sp_email', '$service_type', '$price', '$contract_ID')";

  //Run the queries
  mysqli_query($db, $contract_insert_query);
  mysqli_query($db, $transaction_insert_query);

}

if(isset($_POST['select_homeBtn'])){
  $ho_email = $_SESSION['ho_email'];
  $street = mysqli_real_escape_string($db, $_POST['street']);

  if (empty($street)) { array_push($errors, "Street is required"); }

  $home_info_query = "SELECT homes.home_ID, street, city, state, zip, constr_type, floors, h_sq_ft, y_sq_ft
                      FROM owns, homes
                      WHERE owns.HO_email = '$ho_email' AND owns.home_ID = homes.home_ID 
                      AND homes.street = '$street'";

  $home_info_data = mysqli_query($db, $home_info_query);

  while($c_row = mysqli_fetch_array($home_info_data)){
        $_SESSION['select_home_ID'] = $c_row['home_ID'];
        $_SESSION['select_street'] = $c_row['street'];
        $_SESSION['select_city'] = $c_row['city'];
        $_SESSION['select_state'] = $c_row['state'];
        $_SESSION['select_zip'] = $c_row['zip'];
        $_SESSION['select_constr_type'] = $c_row['constr_type'];
        $_SESSION['select_floors'] = $c_row['floors'];
        $_SESSION['select_h_sqft'] = $c_row['h_sq_ft'];
        $_SESSION['select_y_sqft'] = $c_row['y_sq_ft'];
  }
    header('location: edit_home.php');
 
}

if(isset($_POST['addAPlantBtn'])){
  $ho_email = $_SESSION['ho_email'];

  $home_ID = mysqli_real_escape_string($db, $_POST['home_ID']);
  $plant_type = mysqli_real_escape_string($db, $_POST['plant_type']);

  if (empty($home_ID)) { array_push($errors, "Home # is required"); }
  if (empty($plant_type)) { array_push($errors, "plant_type is required"); }

  //Query to get plant_ID from the plant_types table
  $plant_ID_query = "SELECT plant_ID FROM plant_types WHERE plant_type = '$plant_type'";
  $plant_ID_result = mysqli_query($db, $plant_ID_query);
  $plant_ID_arr = mysqli_fetch_array($plant_ID_result);
  $plant_ID = $plant_ID_arr[0];

  //Check if homeowner already has the plant type
  $owns_plant_ID_query = "SELECT home_ID, plant_ID FROM has_plant WHERE home_ID = '$home_ID' AND plant_ID = '$plant_ID'";
  $owns_plant_ID_result = mysqli_query($db, $owns_plant_ID_query);
  $owns_plant_ID_array = mysqli_fetch_array($owns_plant_ID_result);
  

  if($plant_ID_arr)
  {
    if ($owns_plant_ID_array['home_ID'] === $home_ID && $owns_plant_ID_array['plant_ID'] === $plant_ID)
    {
      array_push($errors, "Service already exists");
     }
  }
   if (count($errors) == 0)
   {
      $has_plants_query = "INSERT INTO has_plant (home_ID, plant_ID)
      VALUES('$home_ID', '$plant_ID')";

      mysqli_query($db, $has_plants_query);
   }

}

/******************************************************FUNCTIONS**************************************************************************************** 
 *                                                                                                                                                     *
 *                                        This Section contains PHP Functions                                                                          *
 *                                                                                                                                                     *
*********************************************************************************************************************************************************/
//Get Homes information Function
function account_create_homes_table(){
  $ho_email = $_SESSION['ho_email'];
  $db = mysqli_connect('localhost', 'root', '', 'fairhomepro');

  $account_homes_query = "SELECT homes.home_ID, street, city, state, zip FROM homeowners, owns, homes WHERE homeowners.HO_email='$ho_email'
                          AND homeowners.HO_email = owns.HO_email AND homes.home_ID = owns.home_ID";

  $account_homes_results = mysqli_query($db, $account_homes_query);

  if (mysqli_num_rows($account_homes_results)){

    $field = $account_homes_results->fetch_fields();
    $fields = array();
    $j=0;
    $home_num=1;
    $column_name = '';


    //echo "<th>Home</th>";
    foreach($field as $col){
      //Switch case for adjusting Table Column Names
      switch($col->name){
        case 'home_ID':
          $column_name = 'Home';
          break;

        case 'street':
          $column_name = 'Street';
          break;

        case 'city':
          $column_name = 'City';
          break;

        case 'state':
          $column_name = 'State';
          break;

        case 'zip':
          $column_name = 'Zip';
          break;

        case 'constr_type':
          $column_name = 'Contruction Type';
          break;

        case 'floors':
          $column_name = 'Floors';
          break;

        case 'h_sq_ft':
          $column_name = 'Home Sq.Ft.';
          break;

        case 'y_sq_ft':
          $column_name = 'Yard Sq.Ft.';
          break;

      }
      echo "<th style='text-align: center'>".$column_name."</th>";
      array_push($fields, array(++$j, $col->name));
    }
    echo "</tr>";

    while($c_row = $account_homes_results->fetch_array()){
      echo "<tr>";
      echo "<td>$home_num</td>";
      for($i=1 ; $i < sizeof($fields) ; $i++){
        $fieldname = $fields[$i][1];
        $fieldvalue = $c_row[$fieldname];
        
        echo "<td><input type='text' value='" . $fieldvalue . "'readonly ></td>";
      }
      $home_num++;
      echo "</tr>";
    }
  }
}

//Get Service information
function sp_create_services_table(){
  $sp_email = $_SESSION['sp_email'];
  $db = mysqli_connect('localhost', 'root', '', 'fairhomepro');

  $services_query = "SELECT s_type, s_price FROM services WHERE SP_email = '$sp_email'";
  $services_query_results = mysqli_query($db, $services_query);

  
  if (mysqli_num_rows($services_query_results)){
      $field = mysqli_fetch_fields($services_query_results);
      $fields = array();
      $j=0;
      $service_num=1;
      $column_name = '';

        foreach($field as $col){

                //Switch case for adjusting Table Column Names
      switch($col->name){
        case 's_type':
          $column_name = 'Service Type';
          break;

        case 's_price':
          $column_name = 'Service Price';
          break;

      }
      echo "<th style='text-align: center'>".$column_name."</th>";
          array_push($fields, array(++$j, $col->name));
        }
        echo "</tr>";

        while($sp_row = $services_query_results->fetch_array()){
          echo "<tr>";
          for($i=0 ; $i < sizeof($fields) ; $i++){
            $fieldname = $fields[$i][1];
            $fieldvalue = $sp_row[$fieldname];
            
            echo "<td><input type='text' value='" . $fieldvalue . "'readonly ></td>";
          }
          $service_num++;
          echo "</tr>";
        }
  }
}

//Function to create the Plants Table
//GetPlant_types information
function account_create_plants_table(){
  $ho_email = $_SESSION['ho_email'];
  $db = mysqli_connect('localhost', 'root', '', 'fairhomepro');

  $account_homes_query = "SELECT has_plant.home_ID, plant_type FROM owns, homes, has_plant, plant_types 
                          WHERE owns.HO_email='$ho_email'
                          AND homes.home_ID = owns.home_ID AND homes.home_ID = has_plant.home_ID AND plant_types.plant_ID = has_plant.plant_ID
                          AND owns.home_ID = has_plant.home_ID
                          ORDER BY has_plant.home_ID ASC";

  $account_homes_results = mysqli_query($db, $account_homes_query);

  if (mysqli_num_rows($account_homes_results)){

    $field = $account_homes_results->fetch_fields();
    $fields = array();
    $home_info_arr = array();
    $j=0;
    $home_num=1;
    $column_name = '';


    foreach($field as $col){
      //Switch case for adjusting Table Column Names
      switch($col->name){
        case 'home_ID':
          $column_name = 'Home';
          break;

        case 'plant_type':
          $column_name = 'Plant';
          break;

      }
      echo "<th style='text-align: center'>".$column_name."</th>";
      array_push($fields, array(++$j, $col->name));
    }
    echo "</tr>";

    while($c_row = $account_homes_results->fetch_array()){
      echo "<tr>";
      for($i=0 ; $i < sizeof($fields) ; $i++){
        $fieldname = $fields[$i][1];
        $fieldvalue = $c_row[$fieldname];
        
        if($fieldname == "home_ID"){
          if(count($home_info_arr) == 0){
            echo "<td>$home_num</td>";
            //store home ID value in array
            $home_info_arr[$i] = $fieldvalue;
          }
          elseif(in_array($fieldvalue, $home_info_arr, true)){
            --$home_num;
            echo "<td> $home_num</td>";
          }
          else{
            echo "<td>$home_num</td>";
            $home_info_arr[$i] = $fieldvalue;
          }
        }
        else{
          echo "<td><input type='text' value='" . $fieldvalue . "'readonly ></td>";
        }
      }
      $home_num++;
      echo "</tr>";
    }
  }
}

//Function to create a combined view of homes and plant_types
function create_HomesPlants_Table(){
  $ho_email = $_SESSION['ho_email'];
  $db = mysqli_connect('localhost', 'root', '', 'fairhomepro');

  $plant_homes_query = "SELECT homes.home_ID, street, city, state, zip, plant_type FROM homeowners, owns, homes, has_plant, plant_types 
                        WHERE homeowners.HO_email='$ho_email'
                        AND homeowners.HO_email = owns.HO_email AND homes.home_ID = owns.home_ID AND homes.home_ID=has_plant.home_ID
                        AND has_plant.plant_ID = plant_types.plant_ID ORDER BY homes.home_ID ASC";

  $plant_homes_results = mysqli_query($db, $plant_homes_query);

  if (mysqli_num_rows($plant_homes_results)){

    $field = $plant_homes_results->fetch_fields();
    $fields = array();
    $home_info_arr = array();
    $j=0;
    $home_num=1;
    $column_name = '';


    //echo "<th>Home</th>";
    foreach($field as $col){
      //Switch case for adjusting Table Column Names
      switch($col->name){
        case 'home_ID':
          $column_name = 'Home';
          break;

        case 'street':
          $column_name = 'Street';
          break;

        case 'city':
          $column_name = 'City';
          break;

        case 'state':
          $column_name = 'State';
          break;

        case 'zip':
          $column_name = 'Zip';
          break;

        case 'plant_type':
          $column_name = 'Plants';
          break;


      }
      echo "<th style='text-align: center'>".$column_name."</th>";
      array_push($fields, array(++$j, $col->name));
    }

    echo "</tr>";

    while($c_row = $plant_homes_results->fetch_array()){
      echo "<tr>";
      for($i=0 ; $i < sizeof($fields) ; $i++){
        $fieldname = $fields[$i][1];
        $fieldvalue = $c_row[$fieldname];

        if($fieldname == 'home_ID'){

          if(count($home_info_arr) == 0){
            echo "<td>$home_num</td>";
            //store home ID value in array
            $home_info_arr[$i] = $fieldvalue;
          }
          elseif(in_array($fieldvalue, $home_info_arr, true)){
            --$home_num;
            echo "<td> $home_num</td>";
          }
          else{
            echo "<td>$home_num</td>";
            $home_info_arr[$i] = $fieldvalue;
          }
        }
        
        else{
        echo "<td> $fieldvalue </td>";
        }
      }
      $home_num++;
      echo "</tr>";
    }
  }
}
  
  ?>