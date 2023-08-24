<?php
include 'header.php';


?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
        <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add User</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                              <li class="breadcrumb-item active">Add User</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            
        <form action="user-save.php" method="post" class="needs-validation" enctype="multipart/form-data">
                <!-- start page title -->
                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-header">
                                <h5>user Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                    
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Name <span class="text-danger"></span></label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Enter Your Name" required="">
                                        </div>
                                    </div>
                                    
                                    

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Mobile No</label>
                                            <input type="text" name="mobile_no" id="mobile_no" class="form-control"
                                                placeholder="Entre Mobile No" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Password</label>
                                            <input type="text" name="password" id="password" class="form-control"
                                                placeholder="Entre Password" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="type">Type:</label>
                                                <select class="form-control" id="type" name="type" required>
                                                    <option value="" disabled selected>Please select Type</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="User">User</option>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Permissions</label>
                                            <input type="text" name="permissions" id="permissions" class="form-control"
                                                placeholder="permissions" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="submit" value="submit" name="submit" class="btn btn-primary mb-4">
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row gy-3-->
                </div> <!-- container-fluid -->
            </form>
        </div><!-- End Page-content -->
    </div>
</div>
<?php
include 'footer.php';
?>
