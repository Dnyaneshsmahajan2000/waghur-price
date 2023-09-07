<?php

include 'header.php';
?>

<div class="main-content">
<div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Change Password</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item active">Change Password</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            <div class="card-header">
                                    <h5>Change Password</h5>
                                </div>
                
                <div class="card-body">
                    <form method="POST" action="change-password-save.php" id="memberForm">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group has-info">
                                    <label>Current Password <span class="text-danger"><b>*</b></span></label>
                                    <input type="password" name="currentpass" id="currentpass" class="form-control" placeholder="Enter Current Password" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-info">
                                    <label>New Password <span class="text-danger"><b>*</b></span></label>
                                    <input type="password" name="newpass" id="newpass" class="form-control" placeholder="Enter New Password" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-info">
                                    <label>Confirm Password <span class="text-danger"><b>*</b></span></label>
                                    <input type="password" name="confirmpass" id="confirmpass" class="form-control" placeholder="Enter Confirm Password" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group"><br>
                                    <input type="submit" class="btn btn-primary" value="Change">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>



<?php

include 'footer.php';
?>