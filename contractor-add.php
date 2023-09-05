<?php include 'header.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Contractor &nbsp; &nbsp;|&nbsp; &nbsp;<a href="contractor-view.php">View All
                                Contractors</a></h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Add Contractor</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <form action="contractor-save.php" method="post" class="needs-validation"
                enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary bg-primary">
                                <h5 class="text-white">Contractor Information</h5>
                            </div>

                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Name of Contractor <span class="text-danger">*</span></label>
                                            <input type="text" name="name_of_contractor" id="name_of_contractor"
                                                class="form-control" placeholder="Enter Name of Contractor "
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group"> Address of Contractor<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="address_of_contractor" id="address_of_contractor"
                                                class="form-control" placeholder="Enter Address of Contractor"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contractor_representative">Name and Mobile number of Contractor
                                                Representative<span class="text-danger">*</span></label>
                                            <input type="text" name="contractor_representative"
                                                id="contractor_representative" class="form-control"
                                                placeholder="Enter Name and Mobile Number(e.g., John Doe - 123-456-7890)" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">PWD-Registration No and Valid Date Upto<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="file" accept=".pdf" id="formFile"
                                                name="pwd" value="Upload PDF File">

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">PIN Code<span class="text-danger">*</span></label>
                                            <input type="number" name="pin_code" id="pin_code" class="form-control"
                                                placeholder="Enter PIN Code" required="">
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Email-ID<span class="text-danger">*</span></label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Enter Email-ID" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Mobile Number<span class="text-danger">*</span></label>
                                            <input type="number" name="mobile_number" id="mobile_number"
                                                class="form-control" pattern="[0-9]{10}" placeholder="Enter your 10-digit mobile number" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Landline Number<span class="text-danger">*</span></label>
                                            <input type="number" name="landline_number" id="landline_number"
                                                class="form-control" placeholder="Enter Landline Number" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Pan Card Number<span class="text-danger">*</span></label>
                                            <input class="form-control" type="file" accept=".pdf" id="formFile"
                                                name="pancard_number" value="Upload PDF File" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Good Service Tax Number(GST No) <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="file" accept=".pdf" id="formFile"
                                                name="gst_number" value="Upload PDF File" required>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Bank Name<span class="text-danger">*</span></label>
                                            <input type="text" name="bank_name" id="bank_name" class="form-control"
                                                placeholder="Enter Bank Name" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Account Number<span class="text-danger">*</span></label>
                                            <input type="number" name="account_number" id="account_number"
                                                class="form-control" placeholder="Enter Account Number" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">IFSC Code<span class="text-danger">*</span></label>
                                            <input type="text" name="ifsc_code" id="ifsc_code" class="form-control"
                                                placeholder="Enter IFSC Code" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Account Type<span class="text-danger">*</span></label>
                                            <select class="form-control" id="account_type" name="account_type" required>
                                                <option value="" disabled selected>Please select Account Type</option>
                                                <option value="current">Current</option>
                                                <option value="saving">Saving</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Branch Address<span class="text-danger">*</span></label>
                                            <input type="text" name="branch_address" id="branch_address"
                                                class="form-control" placeholder="Enter Branch Address" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Branch Telephone Number<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="branch_telephone_number"
                                                id="branch_telephone_number" class="form-control"
                                                placeholder="Enter Branch Telephone Number" required="">
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="submit" value="submit" name="submit" class="btn btn-primary mb-4">
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php include 'footer.php'; ?>