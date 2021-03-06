<footer class="gradient">
      <div class="container-fluid text-center">
        <span
          >Made by Justin Harris and Jeremy Wisecarver</a></span
        >
      </div>
    </footer>

    <!----------------Add A Home Modal Start --------------------------------->
      <div class="modal" tabindex="-1" id="addAHomeModal">
          <div class="modal-dialog">
          <form method="post" action="#" class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title">Add A Home</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                    <label for="street" class="form-label">Street</label>
                    <input type="text" class="form-control" id="street" name="street" placeholder="123 Example Street" required>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Example City"required>
                </div>
                <div class="mb-3">
                    <label for="state" class="form-label">State</label><br>
                    <select name="state">
                        <option value=NULL>-- </option>
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
                    </select required>
                </div>
                <div class="mb-3">
                    <label for="zip_code" class="form-label">Zip Code</label>
                    <input type="number" class="form-control" id="zip_code" name="zip_code" placeholder="99999"required>
                </div>
                <div class="mb-3">
                    <label for="const_type" class="form-label">Construction Type</label><br>
                    <select name="const_type">
                        <option value=NULL>-- </option>
                        <option value="Wood Frame"> Wood Frame </option>
                        <option value="Timber Frame"> Timber Frame </option>
                        <option value="55+"> 55+ </option>
                        <option value="Concrete Building"> Concrete Building </option>
                        <option value="Custome Home"> Custom Home </option>
                        <option value="Log Home"> Log Home</option>
                        <option value="Modular Building"> Modular Building </option>
                        <option value="Multifamily"> Multifamily </option>
                        <option value="Production Home"> Production Home </option>
                    </select required>
                </div>
                <div class="mb-3">
                    <label for="floor_type" class="form-label">Flooring</label><br>
                    <select name="floor_type">
                      <option value=NULL>-- </option>
                      <option value="Ceramic"> Ceramic </option>
                      <option value="Hardwood"> Hardwood </option>
                      <option value="Laminate"> Laminate</option>
                      <option value="Marble"> Marble </option>
                      <option value="Porcelain"> Porcelain </option>
                      <option value="Vinyl"> Vinyl </option>
                    </select required>
                </div>
                <div class="mb-3">
                    <label for="h_sqft class="form-label">Home Sq.Ft.</label>
                    <input type="number" class="form-control" id="h_sqft" name="h_sqft" placeholder="9999"required>
                </div>
                <div class="mb-3">
                    <label for="y_sqft class="form-label">Yard Sq.Ft.</label>
                    <input type="number" class="form-control" id="y_sqft" name="y_sqft" placeholder="9999"required>
                </div>
                <div class="mb-3">
                    <label for="plant_type" class="form-label">Plant Type</label><br>
                    <select name="plant_type">
                    <option value=NULL>-- </option>
                        <option value="Begonias"> Begonias </option>
                        <option value="Fuchsia"> Fuchsia </option>
                        <option value="Geraniums"> Geraniums</option>
                        <option value="Abutilon"> Abutilon </option>
                        <option value="Caladium"> Caladium </option>
                        <option value="Herbs"> Herbs </option>
                        <option value="Herbs"> Rose Bushes </option>
                        <option value="Boxwood and Myrtle"> Boxwood and Myrtle </option>
                    </select required>
                </div>
            </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button name="add_home_modal" type="submit" class="btn btn-primary">Add Home</button>
              </div>
          </form>
          </div>
      </div>
    <!----------------A A Home Modal End --------------------------------->



    <!----------------Add A Service Modal Start --------------------------------->
      <div class="modal" tabindex="-1" id="addAServiceModal">
          <div class="modal-dialog">
          <form method="post" action="#" class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title">Add A Service</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step=0.01 class="form-control" id="price" name="price" placeholder="Example Price 2.50" required>
                </div>
                <div class="mb-3">
                    <label for="service_type" class="form-label">Service offered</label><br>
                    <select name="service_type" required>
                        <option value="">-- </option>
                    <?php $db_modal = mysqli_connect('localhost', 'root', '', 'fairhomepro');
                     $services_query = "SELECT service FROM service_types";
                     $test_query = mysqli_query($db_modal, $services_query);
                     while($temp = mysqli_fetch_assoc($test_query))
                     {    
                          echo "<option value= \"" . $temp['service'] . "\">" . $temp['service'] . "</option>";
                     }
                     ?>
                    </select required>
                </div>
            </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button name="add_service_modal" type="submit" class="btn btn-primary">Add Service</button>
              </div>
          </form>
          </div>
      </div>
    <!----------------A Service Modal End --------------------------------->





    <!----------------Add A specialty Modal Start --------------------------------->
      <div class="modal" tabindex="-1" id="addASpecialtyModal">
          <div class="modal-dialog">
          <form method="post" action="#" class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title">Add A Specialty</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                    <label for="specialty_type" class="form-label">Specialty offered</label><br>
                    <select name="specialty_type" required>
                        <option value="">-- </option>
                    <?php $db_modal = mysqli_connect('localhost', 'root', '', 'fairhomepro');
                     $specialties_query = "SELECT service_ID, service FROM service_types";
                     $test_query = mysqli_query($db_modal, $specialties_query);
                     while($temp = mysqli_fetch_assoc($test_query))
                     {    
                          echo "<option value= \"" . $temp['service_ID'] . "\">" . $temp['service'] . "</option>";
                     }
                     ?>
                    </select required>
                </div>
            </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button name="add_specialty_modal" type="submit" class="btn btn-primary">Add specialty</button>
              </div>
          </form>
          </div>
      </div>
    <!----------------A Specialty Modal End --------------------------------->








    <!----------------Edit A specialty Modal Start --------------------------------->
      <div class="modal" tabindex="-1" id="editASpecialtyModal">
          <div class="modal-dialog">
          <form method="post" action="#" class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title">Edit A Specialty</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                    <label for="specialty_type" class="form-label">Specialty offered</label><br>
                    <select name="specialty_type" required>
                        <option value="">-- </option>
                    <?php 
                    $sp_email = $_SESSION['sp_email'];
                    $db_modal = mysqli_connect('localhost', 'root', '', 'fairhomepro');
                     $specialties_query = "SELECT specialties.service_ID, service FROM service_types INNER JOIN specialties 
                                            ON specialties.service_ID = service_types.service_ID
                                            WHERE specialties.SP_email = '$sp_email'";
                     $test_query = mysqli_query($db_modal, $specialties_query);
                     while($temp = mysqli_fetch_assoc($test_query))
                     {    
                          echo "<option value= \"" . $temp['service_ID'] . "\">" . $temp['service'] . "</option>";
                     }
                     ?>
                    </select required>
                </div>
            </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button name="remove_specialty_modal" type="submit" class="btn btn-primary">Remove Specialty</button>
              </div>
          </form>
          </div>
      </div>
    <!----------------Edit A Specialty Modal End --------------------------------->









    <!----------------Test --------------------------------->

                        <?php 
                        /*
                        $db_modal = mysqli_connect('localhost', 'root', '', 'fairhomepro');
                        $services_query = "SELECT service FROM service_types";
                        $test_query = mysqli_query($db_modal, $services_query);
                        $temp = mysql_fetch_assoc($test_query);
                        echo "<option value =\"" . $temp['service'] . "\"> yeet </option>";     
                        echo "</select required>";
                        */
                        ?>

   <!----------------Test End --------------------------------->


    <!----------------Edit a Service Modal Start --------------------------------->
      <div class="modal" tabindex="-1" id="EditAServiceModal">
          <div class="modal-dialog">
          <form method="post" action="#" class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title">Edit A Service</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step=0.01 class="form-control" id="price" name="price" placeholder="Example Price 2.50" required>
                </div>
                <div class="mb-3">
                    <label for="service_type" class="form-label">Service offered</label><br>
                    <select name="service_type" required>
                    <option value="">-- </option>
                    <?php

                    //Display services provided from the service_types table

                    $db_modal = mysqli_connect('localhost', 'root', '', 'fairhomepro');
                    $sp_email = $_SESSION['sp_email'];
                     $services_query = "SELECT service FROM service_types
                                        WHERE service IN (SELECT s_type AS Service
                                                          FROM services
                                                          WHERE SP_email = '$sp_email')";
                     $test_query = mysqli_query($db_modal, $services_query);

                     //Loops through all possible services

                     while($temp = mysqli_fetch_assoc($test_query))
                     {    
                          echo "<option value= \"" . $temp['service'] . "\">" . $temp['service'] . "</option>";
                     }
                     ?>
                    </select required>
                </div>
            </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button name="edit_service_modal" type="submit" class="btn btn-primary">Edit Service</button>
              </div>
          </form>
          </div>
      </div>
    <!----------------Edit a Service Modal End --------------------------------->

        <!----------------Edit A Home Modal Start --------------------------------->
        <div class="modal" tabindex="-1" id="editAHomeModal">
          <div class="modal-dialog">
          <form method="post" action="#" class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title">Edit Home</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                    <label for="home_select" class="form-label">Select A Home</label><br>
                    <select id="editHomeSelect" name ="street"required>
                        <option value="">-- </option>
                    <?php 
                     $db_modal = mysqli_connect('localhost', 'root', '', 'fairhomepro');
                     $ho_email = $_SESSION['ho_email'];
                     $homes_query = "SELECT homes.home_ID, street FROM homeowners, owns, homes WHERE homeowners.HO_email='$ho_email'
                     AND homeowners.HO_email = owns.HO_email AND homes.home_ID = owns.home_ID";

                     $pick_home_query = mysqli_query($db_modal, $homes_query);
                     
                     while($temp = mysqli_fetch_assoc($pick_home_query))
                     {    
                        
                          echo "<option value= \"" . $temp['street'] . "\">" . $temp['street'] . "</option>";
                     }
                     ?>
                    </select required> 
                </div>                       
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button name="select_homeBtn" type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
          </div>
      </div>
    <!----------------Edit A Home Modal End --------------------------------->


      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> 
    <script src="js/bootstrap.min.js"></script>
    <script src="js/styles.js"></script>
  </body>
</html>