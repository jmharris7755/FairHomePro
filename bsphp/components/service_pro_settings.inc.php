<header class="page-header gradient">
    <div class="container pt-3">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-3">
                <h2> <strong><u>My Account</u></strong> </h2>
            </div>
            <p></p>
            <div class="d-flex mr-auto p-2 flex-column">
                <h3> <strong><u>My Information</u></strong> </h3>
                <?php if($_SESSION['sp_info_edit'] === TRUE): ?>
                <? //Display if user clicked the edit button ?>
                <form name="acct_info_form"action="service_pro_settings.php" method="POST">
                <table class="table-bordered">
                    <tr> 
                        <th>Business Name: </th>
                        <td><input type="text" name="sp_username" value ="<?php echo $_SESSION['sp_username']; ?>"/> </td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td><input type="text" name="sp_email" value ="<?php echo $_SESSION['sp_email']; ?>" readonly/> </td>
                    </tr>
                    <tr>
                        <th>Phone: </th>
                        <td><input type="text" name="sp_phone" value ="<?php echo $_SESSION['sp_phone']; ?>"/> </td>
                    </tr>
                    <tr>
                        <th>Credit Card: </th>
                        <td><input type="text" name="sp_creditcard" value ="<?php echo $_SESSION['sp_creditcard']; ?>"/> </td>
                    </tr>
                    <tr>
                        <th>Bank Account: </th>
                        <td><input type="text" name="sp_bankaccount" value ="<?php echo $_SESSION['sp_bankaccount']; ?>"/> </td>
                    </tr>
                </table>
                <button 
						  type="submit" 
						  class = "btn btn-outline-success"
                          name = "update_sp_info"
                          >
						  Update Info
                </button>
                <button  onclick = "<?php $_SESSION['sp_info_edit'] = FALSE; ?>"
						  type="submit" 
						  class = "btn btn-outline-success"
                          name = "cancel_info_edit"
                          >
						  Cancel
                </button>
                </form> 
                <? //Else display non-editable Table ?> 
                <?php elseif($_SESSION['sp_info_edit'] ===FALSE): ?>
                <form action="service_pro_settings.php" method="POST">
                <table class="table-bordered">
                    <tr> 
                        <th>Business Name: </th>
                        <td><input type="text" name="sp_username" value ="<?php echo $_SESSION['sp_username']; ?>" readonly/> </td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td><input type="text" name="sp_email" value ="<?php echo $_SESSION['sp_email']; ?>" readonly/> </td>
                    </tr>
                    <tr>
                        <th>Phone: </th>
                        <td><input type="text" name="sp_phone" value ="<?php echo $_SESSION['sp_phone']; ?>" readonly/> </td>
                    </tr>
                    <tr>
                        <th>Credit Card: </th>
                        <td><input type="text" name="sp_creditcard" value ="<?php echo $_SESSION['sp_creditcard']; ?>" readonly/> </td>
                    </tr>
                    <tr>
                        <th>Bank Account: </th>
                        <td><input type="text" name="sp_bankaccount" value ="<?php echo $_SESSION['sp_bankaccount']; ?>" readonly/> </td>
                    </tr>
                </table>
                <button  onclick= "<?php $_SESSION['sp_info_edit'] = TRUE ?>"
						  type="submit" 
						  class = "btn btn-outline-success"
                          name = "sp_info_edit"
                          >
						  Edit Info
                </button>
                </form>
                <?php endif; ?>  
            </div>

            <div class="d-flex mr-auto p-2 flex-column">
                <h3> <strong><u>My Services</u></strong> </h3>
                <form action="service_pro_settings.php" method="POST">
                <div style="overflow:auto">
                <table class="table-bordered">
                    <?php
                        sp_create_services_table();
                     ?>
                </table>
                </div>
                <button	id="addAServiceBtn"  
                        type="button" 
						class = "btn btn-outline-success"
                        >
						Add a service
                </button>
                <button  onclick= "window.location.href='add_service.php'"
						  type="button" 
						  class = "btn btn-outline-success"
                          name = "edit_home"
                          >
						  Edit Homes
                </button>
                </form> 
            </div>
        </div>
    </div>
</header>
          