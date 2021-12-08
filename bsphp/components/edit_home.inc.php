<section class="services gradient">    
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,96L34.3,106.7C68.6,117,137,139,206,122.7C274.3,107,343,53,411,53.3C480,53,549,107,617,117.3C685.7,128,754,96,823,96C891.4,96,960,128,1029,154.7C1097.1,181,1166,203,1234,202.7C1302.9,203,1371,181,1406,170.7L1440,160L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"
        ></path>
      </svg>
      <div class="container">
        <div class="d-flex flex-row">
          <div class="col-lg-5"><img src="img/logo_solitary.png" alt="" />

            <h1>Hello <?php echo $_SESSION['ho_username'];?> </h1>

            <p>
              Edit your home information in form to the right.
            </p>
            <?php
                    //Connect to DB and query user info
                    $db_modal = mysqli_connect('localhost', 'root', '', 'fairhomepro');
                    $ho_email = $_SESSION['ho_email'];
 
                    //Get Cookie for option selected in Edit home drop down
                    $edit_home_select_value = $_COOKIE['edit_home_select'];
                    //echo $edit_home_select_value;
                              
                    if($edit_home_select_value){
                    //Query to get the home information associated with street name in dropdown
                    $home_info_query = "SELECT homes.home_ID, street, city, state, zip, constr_type, floors, h_sq_ft, y_sq_ft, plant_type
                                        FROM owns, homes, plant_types
                                        WHERE owns.HO_email = '$ho_email' AND owns.home_ID = homes.home_ID 
                                        AND homes.home_ID = plant_types.home_ID AND homes.street = '$edit_home_select_value'";
  
                    $home_info_data = mysqli_query($db_modal, $home_info_query);
                    while($c_row = mysqli_fetch_array($home_info_data)){
                        $this_homeID = $c_row['home_ID'];
                        $this_street = $c_row['street'];
                        $this_city = $c_row['city'];
                        $this_state = $c_row['state'];
                        $this_zip = $c_row['zip'];
                        $this_constr_type = $c_row['constr_type'];
                        $this_floors = $c_row['floors'];
                        $this_h_sq_ft = $c_row['h_sq_ft'];
                        $this_y_sq_ft = $c_row['y_sq_ft'];
                        $this_plant_type = $c_row['plant_type'];
                    }
         }
         ?>

          </div>
          <div class = "container pt-3">
            <div class="row align-items-center justify-content-center">
                <div class="col-auto">
                <h2>Edit Home: <?php "echo $edit_home_select_value;" ?></h2>
                    <form  method="post" action="index.php">
            	    <?php include('errors.inc.php'); ?>
                    <div style="input-group" hidden>
  	                    <label>HomeID:</label>
                        <?php
                          //These cursed lines are to line up the labels using whitespace
                          echo str_repeat("&nbsp;", 28);
                          ?>
                          <br>
  	                    <input 
                            type="text" 
                            name="home_ID" 
                            size=30
                            value="<?php echo $this_homeID;?>"
                        >
                    </div>
                    <div style="input-group">
  	                    <label>Street:</label>
                        <?php
                          //These cursed lines are to line up the labels using whitespace
                          echo str_repeat("&nbsp;", 28);
                          ?>
                          <br>
  	                    <input 
                            type="text" 
                            name="street" 
                            size=30
                            value="<?php echo $this_street;?>"
                        >
                    </div>
                    <div style="input-group">
  	                    <label>City:</label>
                        <?php
                          //These cursed lines are to line up the labels using whitespace
                          echo str_repeat("&nbsp;", 28);
                          ?>
                          <br>
  	                    <input 
                            type="text" 
                            name="city" 
                            value="<?php echo $this_city;?>"
                        >
                    </div>
                    <div style="input-group">
  	                    <label>State:</label>
                        <?php
                          //These cursed lines are to line up the labels using whitespace
                          echo str_repeat("&nbsp;", 28);
                          ?>
                          <br>
  	                    <select name="state">
                              <option value="<?php echo $this_state;?>"><?php echo $this_state;?></option>
                              <option value="AK">AK </option>
                              <option value="AZ">AZ </option>
                              <option value="AR">AR </option>
                              <option value="CA">CA </option>
                              <option value="CO">CO </option>
                              <option value="CT">CT </option>
                              <option value="DE">DE </option>
                              <option value="DC">DC </option>
                              <option value="FL">FL </option>
                              <option value="GA">GA </option>
                              <option value="HI">HI </option>
                              <option value="ID">ID </option>
                              <option value="IL">IL </option>
                              <option value="IN">IN </option>
                              <option value="IA">IA </option>
                              <option value="KS">KS </option>
                              <option value="KY">KY </option>
                              <option value="LA">LA </option>
                              <option value="MA">MA </option>
                              <option value="MD">MD </option>
                              <option value="ME">ME </option>
                              <option value="MI">MI </option>
                              <option value="MN">MN </option>
                              <option value="MO">MO </option>
                              <option value="MS">MS </option>
                              <option value="MT">MT </option>
                              <option value="NC">NC </option>
                              <option value="ND">ND </option>
                              <option value="NE">NE </option>
                              <option value="NH">NH </option>
                              <option value="NJ">NJ </option>
                              <option value="NM">NM </option>
                              <option value="NV">NV </option>
                              <option value="NY">NY </option>
                              <option value="OH">OH </option>
                              <option value="OK">OK </option>
                              <option value="OR">OR </option>
                              <option value="PA">PA </option>
                              <option value="PR">PR </option>
                              <option value="RI">RI </option>
                              <option value="SC">SC </option>
                              <option value="SD">SD </option>
                              <option value="TN">TN </option>
                              <option value="TX">TX </option>
                              <option value="UT">UT </option>
                              <option value="VT">VT </option>
                              <option value="VA">VA </option>
                              <option value="WA">WA </option>
                              <option value="WI">WI </option>
                              <option value="WV">WV </option>
                              <option value="WY">WY </option>
                        </select>
                    </div>
                    <div style="input-group">
  	                    <label>Zip Code:</label>
                        <?php
                          //These cursed lines are to line up the labels using whitespace
                          echo str_repeat("&nbsp;", 28);
                          ?>
                          <br>
  	                    <input 
                            type="number" 
                            name="zip_code"
                            value="<?php echo $this_zip;?>" 
                        >
                    </div>
                    <div style="input-group">
  	                    <label>Construction Type:</label>
                        <?php
                          //These cursed lines are to line up the labels using whitespace
                          echo str_repeat("&nbsp;", 28);
                          ?>
                          <br>
  	                    <select name="const_type">
                          <option value="<?php echo $this_constr_type;?>"><?php echo $this_constr_type;?></option>
                          <option value="Wood Frame"> Wood Frame </option>
                          <option value="Timber Frame"> Timber Frame </option>
                          <option value="55+"> 55+ </option>
                          <option value="Concrete Building"> Concrete Building </option>
                          <option value="Custome Home"> Custom Home </option>
                          <option value="Log Home"> Log Home</option>
                          <option value="Modular Building"> Modular Building </option>
                          <option value="Multifamily"> Multifamily </option>
                          <option value="Production Home"> Production Home </option>
                        </select>
                    </div>
                    <div style="input-group">
  	                    <label>Flooring:</label>
                        <?php
                          //These cursed lines are to line up the labels using whitespace
                          echo str_repeat("&nbsp;", 28);
                          ?>
                          <br>
  	                    <select name="floor_type">
                          <option value="<?php echo $this_floors;?>"><?php echo $this_floors;?> </option>
                          <option value="Ceramic"> Ceramic </option>
                          <option value="Hardwood"> Hardwood </option>
                          <option value="Laminate"> Laminate</option>
                          <option value="Marble"> Marble </option>
                          <option value="Porcelain"> Porcelain </option>
                          <option value="Vinyl"> Vinyl </option>
                        </select>
                    </div>
                    <div style="input-group">
  	                    <label>Home sqft:</label>
                        <?php
                          //These cursed lines are to line up the labels using whitespace
                          echo str_repeat("&nbsp;", 28);
                          ?>
                          <br>
  	                    <input 
                            type="number" 
                            name="h_sqft"
                            value="<?php echo $this_h_sq_ft;?>" 
                        >
                    </div>
                    <div style="input-group">
  	                    <label>Yard sqft:</label>
                        <?php
                          //These cursed lines are to line up the labels using whitespace
                          echo str_repeat("&nbsp;", 28);
                          ?>
                          <br>
  	                    <input 
                            type="number" 
                            name="y_sqft"
                            value="<?php echo $this_y_sq_ft;?>" 
                        >
                    </div>
                    <div style="input-group">
  	                    <label>Plant Type:</label>
                        <?php
                          //These cursed lines are to line up the labels using whitespace
                          echo str_repeat("&nbsp;", 28);
                          ?>
                          <br>
  	                    <select name="plant_type">
                          <option value="<?php echo $this_plant_type;?>"><?php echo $this_plant_type;?></option>
                          <option value="Begonias"> Begonias </option>
                          <option value="Fuchsia"> Fuchsia </option>
                          <option value="Geraniums"> Geraniums</option>
                          <option value="Abutilon"> Abutilon </option>
                          <option value="Caladium"> Caladium </option>
                          <option value="Herbs"> Herbs </option>
                          <option value="Herbs"> Rose Bushes </option>
                          <option value="Boxwood and Myrtle"> Boxwood and Myrtle </option>
                        </select>
                    </div>
                    </p>
                    <div class="input-group">
                    <?php
                          //These cursed lines are to line up the labels using whitespace
                          echo str_repeat("&nbsp;", 48);
                          ?>
  	                 <button type="submit" 
					   		 class="btn btn-outline-success" 
							 name="edit_homeBtn">Submit</button>
  	                </div>
                    </form>
                </div>
            </div>
          </div>   
</section>