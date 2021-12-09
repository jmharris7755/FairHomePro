<header class="page-header gradient">
    <div class="container pt-3">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-3">
                <h2> <strong><u>My Account</u></strong> </h2>
            </div>
            <p></p>
            <div class="d-flex mr-auto p-2 flex-column">
                <h3> <strong><u>My Information</u></strong> </h3>
                <?php if($_SESSION['c_info_edit'] === TRUE): ?>
                <? //Display if user clicked the edit button ?>
                <form name="acct_info_form" action="customer_account.php" method="POST">
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
                        <td><input type="text" name="ho_username" value ="<?php echo $_SESSION['ho_username']; ?>" readonly/> </td>
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
            </div>

            <div class="d-flex mr-auto p-2 flex-column">
                <h3> <strong><u>My Homes</u></strong> </h3>
                <form action="customer_account.php" method="POST">
                <div style="overflow:auto">
                <table class="table-bordered">
                    <?php
                        account_create_homes_table();
                     ?>
                </table>
                </div>
                <button	id="addAHomeBtn"  
                        type="button" 
						class = "btn btn-outline-success"
                        >
						Add a Home
                </button>
                <button  id="editAHomeBtn"
						  type="button" 
						  class = "btn btn-outline-success"
                          name = "edit_home"
                          >
						  Edit Homes
                </button>
            </div>

            <div class="d-flex mr-auto p-2 flex-column">
                <h3> <strong><u>My Plants</u></strong> </h3>
                <form action="customer_account.php" method="POST">
                <div style="overflow:auto">
                <table class="table-bordered">
                    <?php
                        account_create_plants_table();
                     ?>
                </table>
                </div>
                <div>
                <button	onclick="window.location.href='edit_plants.php'"
                        name="editPlantsLink"  
                        type="button" 
						class = "btn btn-outline-success"
                        >
						Edit Plants
                </button>
            </div>
            <div class="col-md-3">
            </div>
            <div class="d-flex mr-auto p-2 flex-column">
                </div>
                </div>

            <div class="d-flex mr-auto p-2 flex-column">
                <h3> <strong><u>My Contracts</u></strong> </h3>
                <form action="contracts.php" method="POST">
                <div style="overflow:auto">
                <table class="table-bordered">
                    <?php
                        create_contracts_table();
                     ?>
                </table>
                </div>
                <div>
                <button  onclick= "window.location.href='complaints.php'"
						  type="button" 
						  class = "btn btn-outline-success"
                          name = "file_complaint"
                          >
						  File complaint
                </button>
                </form> 
                </div>
            </div>
            </form> 
            </div>
        </div>
    </div>
</header>
          