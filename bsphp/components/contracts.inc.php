
<header class="page-header gradient">
    <div class="container pt-3">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-3">
                <h2> <strong><u>My Account</u></strong> </h2>
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
    </div>
</header>