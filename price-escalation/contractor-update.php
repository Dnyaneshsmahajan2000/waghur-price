<?php include 'header.php';

if (isset($_GET['c_id']) && is_numeric($_GET['c_id'])) {
    $c_id = $_GET['c_id'];
    $contractor = $database->get("contractors", "*", ["c_id" => $c_id]);

    if (!$contractor) {
        echo "Record not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Contractor &nbsp; &nbsp;|&nbsp; &nbsp;<a href="contractor-view.php">View
                                All
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
            <form action="contractor-update-save.php" method="post" class="needs-validation"
                enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary bg-primary">
                                <h5 class="text-white">Contractor Information</h5>
                            </div>

                            <div class="card-body">
                                <div class="row gy-3">
                                    <input type="hidden" name="contractor_id"
                                        value="<?php echo $contractor['c_id']; ?>">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Name of Contractor (English) <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name_of_contractor_english"
                                                id="name_of_contractor_english" class="form-control"
                                                placeholder="Enter Name of Contractor in English" required=""
                                                value="<?php echo $contractor['name_of_contractor_english']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Name of Contractor (Marathi) <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name_of_contractor_marathi"
                                                id="name_of_contractor_marathi" class="form-control"
                                                placeholder="Enter Name of Contractor in Marathi" required=""
                                                value="<?php echo $contractor['name_of_contractor_marathi']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Address of Contractor (English) <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="address_of_contractor_english"
                                                id="address_of_contractor_english" class="form-control"
                                                placeholder="Enter Address of Contractor in English" required=""
                                                value="<?php echo $contractor['address_of_contractor_english']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Address of Contractor (Marathi) <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="address_of_contractor_marathi"
                                                id="address_of_contractor_marathi" class="form-control"
                                                placeholder="Enter Address of Contractor in Marathi"
                                                oninput="validateMarathiInput(this)" required=""
                                                value="<?php echo $contractor['address_of_contractor_marathi']; ?>">
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contractor_representative_name">Name of Contractor
                                                Representative<span class="text-danger">*</span></label>
                                            <input type="text" name="contractor_representative_name"
                                                id="contractor_representative_name" class="form-control"
                                                placeholder="Enter Name of Contractor Representative" required
                                                value="<?php echo $contractor['contractor_representative_name']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contractor_representative_mobile">Mobile Number of Contractor
                                                Representative<span class="text-danger">*</span></label>
                                            <input type="text" name="contractor_representative_mobile"
                                                id="contractor_representative_mobile" class="form-control"
                                                placeholder="Enter Mobile Number of Contractor Representative" required
                                                value="<?php echo $contractor['contractor_representative_mobile']; ?>">
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pwd_registration_no">PWD Registration No <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="pwd_registration_no" id="pwd_registration_no"
                                                class="form-control" placeholder="Enter PWD Registration No" required=""
                                                value="<?php echo $contractor['pwd_registration_no']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pwd_valid_date">PWD Valid Date Upto <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="pwd_valid_date" id="pwd_valid_date" class="form-control"
                                                required="" value="<?php echo $contractor['pwd_valid_date']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pwd_document">Upload PWD Document <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="file" accept=".pdf" id="pwd_document"
                                                name="pwd_document" value="Upload PDF File"> <input class="form-control"
                                                type="hidden" accept=".pdf" id="pwd_document" name="pwd_document"
                                                value="<?php echo $contractor['pwd_document']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">PIN Code<span class="text-danger">*</span></label>
                                            <input type="number" name="pin_code" id="pin_code" class="form-control"
                                                placeholder="Enter PIN Code" required=""
                                                value="<?php echo $contractor['pin_code']; ?>">
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Email-ID<span class="text-danger">*</span></label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Enter Email-ID" required=""
                                                value="<?php echo $contractor['email']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Mobile Number<span class="text-danger">*</span></label>
                                            <input type="number" name="mobile_number" id="mobile_number"
                                                class="form-control" pattern="[0-9]{10}"
                                                placeholder="Enter your 10-digit mobile number" required=""
                                                value="<?php echo $contractor['mobile_number']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Alternate Number 1</label>
                                            <input type="number" name="alternate_number_1" id="alternate_number_1"
                                                class="form-control" pattern="[0-9]{10}"
                                                placeholder="Enter alternate mobile number 1"
                                                value="<?php echo $contractor['alternate_number_1']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Alternate Number 2</label>
                                            <input type="number" name="alternate_number_2" id="alternate_number_2"
                                                class="form-control" pattern="[0-9]{10}"
                                                placeholder="Enter alternate mobile number 2"
                                                value="<?php echo $contractor['alternate_number_2']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Landline Number<span class="text-danger">*</span></label>
                                            <input type="number" name="landline_number" id="landline_number"
                                                class="form-control" placeholder="Enter Landline Number" required=""
                                                value="<?php echo $contractor['landline_number']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Alternate Landline Number</label>
                                            <input type="number" name="alternate_landline_number"
                                                id="alternate_landline_number" class="form-control"
                                                placeholder="Enter Alternate Landline Number"
                                                value="<?php echo $contractor['alternate_landline_number']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pancard_number">Pan Card Number<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="pancard_number" id="pancard_number"
                                                class="form-control" placeholder="Enter Pan Card Number" required
                                                value="<?php echo $contractor['pancard_number']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pancard_document">Upload Pan Card Document<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="file" accept=".pdf" id="pancard_document"
                                                name="pancard_document" > <input class="form-control"
                                                type="hidden" accept=".pdf" id="pancard_document" name="pancard_document"
                                               
                                                value="<?php echo $contractor['pancard_document']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gst_number">Good Service Tax Number (GST No)<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="gst_number" id="gst_number" class="form-control"
                                                placeholder="Enter GST No" required
                                                value="<?php echo $contractor['gst_number']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gst_document">Upload GST Document<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="file" accept=".pdf" id="gst_document"
                                                name="gst_document">
                                            <input class="form-control" type="hidden" accept=".pdf"
                                                id="gst_document" name="gst_document"
                                                value="<?php echo $contractor['gst_document']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Bank Name<span class="text-danger">*</span></label>
                                            <input type="text" name="bank_name" id="bank_name" class="form-control"
                                                placeholder="Enter Bank Name" required=""
                                                value="<?php echo $contractor['bank_name']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Account Number<span class="text-danger">*</span></label>
                                            <input type="number" name="account_number" id="account_number"
                                                class="form-control" placeholder="Enter Account Number" required=""
                                                value="<?php echo $contractor['account_number']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">IFSC Code<span class="text-danger">*</span></label>
                                            <input type="text" name="ifsc_code" id="ifsc_code" class="form-control"
                                                placeholder="Enter IFSC Code" required=""
                                                value="<?php echo $contractor['ifsc_code']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Account Type<span class="text-danger">*</span></label>
                                            <select class="form-control" id="account_type" name="account_type" required
                                                value="<?php echo $contractor['account_type']; ?>">

                                                <option value="current">Current</option>
                                                <option value="saving">Saving</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Branch Address<span class="text-danger">*</span></label>
                                            <input type="text" name="branch_address" id="branch_address"
                                                class="form-control" placeholder="Enter Branch Address" required=""
                                                value="<?php echo $contractor['branch_address']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Branch Telephone Number<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="branch_telephone_number"
                                                id="branch_telephone_number" class="form-control"
                                                placeholder="Enter Branch Telephone Number" required=""
                                                value="<?php echo $contractor['branch_telephone_number']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="submit" value="submit" name="submit" class="btn btn-primary mb-4">&nbsp;&nbsp;&nbsp;
                                <a href="contractor-view.php"><button type="button" class="btn btn-danger mb-4 text-white">Cancel</button></a>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php include 'footer.php'; ?>