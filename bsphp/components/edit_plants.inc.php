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
              On this page you can add and remove plants from your homes.
            </p>
            <div class="d-flex mr-auto p-2 flex-column">
                <h3> <strong><u>My Homes and Plants</u></strong> </h3>
                <table class='table-bordered'>
                    <?php 
                        //Create the homes-plant_types combined table
                        create_HomesPlants_Table();
                    ?>
                </table>
            </div>
            <div>
            </p>
            <h3> <strong><u>Add A Plant</u></strong> </h3>
            </div>
                <form name="addPlantForm" method="POST">
                <div style="input-group">
  	                    <label>Home #:</label>
                          <br>
  	                    <select name="home_ID" required>
                          <option value="">-- </option>
                            <?php 
                                $ho_email = $_SESSION['ho_email'];
                                $i = 1;
                                $db_home_ID = mysqli_connect('localhost', 'root', '', 'fairhomepro');
                                $home_ID_query = "SELECT owns.home_ID FROM homes, owns WHERE owns.HO_email = '$ho_email' 
                                                AND homes.home_ID = owns.home_ID";
                                $test_query = mysqli_query($db_home_ID, $home_ID_query);
                                while($temp = mysqli_fetch_assoc($test_query))
                                {    
                                      echo "<option value= \"" . $temp['home_ID'] . "\">" . $i . "</option>";
                                      $i++;
                                }
                            ?>
                        </select required>
                    </div>
                    <div style="input-group">
  	                    <label>Plant Type:</label>
                          <br>
  	                    <select name="plant_type" required>
                          <option value="">-- </option>
                            <?php $db_modal = mysqli_connect('localhost', 'root', '', 'fairhomepro');
                                $plants_query = "SELECT plant_type FROM plant_types";
                                $test_query = mysqli_query($db_modal, $plants_query);
                                while($temp = mysqli_fetch_assoc($test_query))
                                {    
                                      echo "<option value= \"" . $temp['plant_type'] . "\">" . $temp['plant_type'] . "</option>";
                                }
                            ?>
                        </select required>
                    </div>
                    <div> 
                    </p>
                      <button  name="addAPlantBtn"  
                              type="submit" 
                              class = "btn btn-outline-success"
                              >
                              Add A Plant
                      </button>
                      <button onclick="window.location.href='customer_account.php'" 
                              name="myAccount"  
                              type="button" 
                              class = "btn btn-outline-warning"
                              >
                              My Account
                      </button>
                    </div>    
                </form>     
           </div>
        </div>
    </div>   
</section>