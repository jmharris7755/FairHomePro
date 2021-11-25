<header class="page-header gradient">
    <div class="container pt-3">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5">
                <h2> My Account </h2>
            </div>
            <p></p>
            <div style="width: 500px; float:left; margin:20px">
                <h3> My Information </h3>
                <?php if($_SESSION['c_info_edit'] === TRUE): ?>
                <? //Display if user clicked the edit button ?>
                <form name="acct_info_form"action="customer_account.php" method="POST">
                <table class="table-bordered">
                    <tr> 
                        <th>Name: </th>
                        <td><input type="text" name="ho_username" value ="<?php echo $_SESSION['ho_username']; ?>"/> </td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td><input type="text" name="ho_email" value ="<?php echo $_SESSION['ho_email']; ?>" readonly/> </td>
                    </tr>
                    <tr>
                        <th>Phone: </th>
                        <td><input type="text" name="ho_phone" value ="<?php echo $_SESSION['ho_phone']; ?>"/> </td>
                    </tr>
                    <tr>
                        <th>Credit Card: </th>
                        <td><input type="text" name="ho_creditcard" value ="<?php echo $_SESSION['ho_creditcard']; ?>"/> </td>
                    </tr>
                    <tr>
                        <th>Bank Account: </th>
                        <td><input type="text" name="ho_bankaccount" value ="<?php echo $_SESSION['ho_bankaccount']; ?>"/> </td>
                    </tr>
                </table>
                <button 
						  type="submit" 
						  class = "btn btn-outline-success"
                          name = "update_c_info"
                          >
						  Update Info
                </button>
                <button  onclick = "<?php $_SESSION['c_info_edit'] = FALSE; ?>"
						  type="submit" 
						  class = "btn btn-outline-success"
                          name = "cancel_info_edit"
                          >
						  Cancel
                </button>
                </form> 
                <? //Else display non-editable Table ?> 
                <?php elseif($_SESSION['c_info_edit'] ===FALSE): ?>
                <form action="customer_account.php" method="POST">
                <table class="table-bordered">
                    <tr> 
                        <th>Name: </th>
                        <td><input type="text" name="ho_username" background-color="#FFFFFF" value ="<?php echo $_SESSION['ho_username']; ?>" readonly/> </td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td><input type="text" name="ho_email" value ="<?php echo $_SESSION['ho_email']; ?>" readonly/> </td>
                    </tr>
                    <tr>
                        <th>Phone: </th>
                        <td><input type="text" name="ho_phone" value ="<?php echo $_SESSION['ho_phone']; ?>" readonly/> </td>
                    </tr>
                    <tr>
                        <th>Credit Card: </th>
                        <td><input type="text" name="ho_creditcard" value ="<?php echo $_SESSION['ho_creditcard']; ?>" readonly/> </td>
                    </tr>
                    <tr>
                        <th>Bank Account: </th>
                        <td><input type="text" name="ho_bankaccount" value ="<?php echo $_SESSION['ho_bankaccount']; ?>" readonly/> </td>
                    </tr>
                </table>
                <button  onclick= "<?php $_SESSION['c_info_edit'] = TRUE ?>"
						  type="submit" 
						  class = "btn btn-outline-success"
                          name = "c_info_edit"
                          >
						  Edit Info
                </button>
                </form>
                <?php endif; ?>  
            </div>

            <div style="width: 500px; float:left; margin:20px">
                <h3> My Homes </h3>
                <form action="customer_account.php" method="POST">
                <table class="table-bordered">
                    <tr> 
                        <th>Street: </th>
                        <td><input type="text" name="street" background-color="#FFFFFF" value ="<?php echo $_SESSION['ho_username']; ?>" readonly/> </td>
                    </tr>
                    <tr>
                        <th>City: </th>
                        <td><input type="text" name="city" value ="<?php echo $_SESSION['ho_email']; ?>" readonly/> </td>
                    </tr>
                    <tr>
                        <th>State: </th>
                        <td><input type="text" name="state" value ="<?php echo $_SESSION['ho_phone']; ?>" readonly/> </td>
                    </tr>
                    <tr>
                        <th>Zip Code: </th>
                        <td><input type="text" name="zip_code" value ="<?php echo $_SESSION['ho_creditcard']; ?>" readonly/> </td>
                    </tr>
                    <tr>
                        <th>Construction Type: </th>
                        <td><input type="text" name="constr_type" value ="<?php echo $_SESSION['ho_bankaccount']; ?>" readonly/> </td>
                    </tr>
                    <tr>
                        <th>Flooring: </th>
                        <td><input type="text" name="flooring" value ="<?php echo $_SESSION['ho_bankaccount']; ?>" readonly/> </td>
                    </tr>
                    <tr>
                        <th>Home Sq. Ft.: </th>
                        <td><input type="text" name="h_sq_ft" value ="<?php echo $_SESSION['ho_bankaccount']; ?>" readonly/> </td>
                    </tr>
                    <tr>
                        <th>Yard Sq. Ft.: </th>
                        <td><input type="text" name="y_sq_ft" value ="<?php echo $_SESSION['ho_bankaccount']; ?>" readonly/> </td>
                    </tr>
                </table>
                <button  onclick= "<?php $_SESSION['c_home_edit'] = TRUE ?>"
						  type="button" 
						  class = "btn btn-outline-success"
                          name = "c_info_edit"
                          >
						  Edit Info
                </button>
                </form> 
            </div>
        </div>
    </div>
</header>
          