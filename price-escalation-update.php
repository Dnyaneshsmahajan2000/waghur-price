<?php
include 'header.php';

$database = new Database();

if (isset($_GET['pe_id']) && is_numeric($_GET['pe_id'])) {
    $pe_id = $_GET['pe_id'];
    $price_escalation = $database->get("price_escalation", "*", ["pe_id" => $pe_id]);

    if (!$price_escalation) {
        echo "Record not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

?>


<div class="vertical-overlay"></div>


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Price Escalation | <a href="price-esccalation-view.php">View price Escalation</a></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form action="price-escalation-update-save.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="row gy-4">
                                        <div>
                                            <div class="card-header bg-primary bg-primary">
                                                <h5 class="text-white"> Edit Price Escalation</h5>
                                            </div>
                                        </div>
                                        <!--<div class="row gutters">-->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <!-- <div class="col-xxl-3 col-md-6"> -->
                                            <input type="hidden" name="pe_id"
                                                value="<?php echo $price_escalation['pe_id']; ?>">
                                            <div>
                                                <label for="placeholderInput" class="form-label"> Name of Work <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name_of_work"
                                                    value="<?php echo $price_escalation['name_of_work']; ?>" placeholder="Enter month-year"
                                                    required>
                                            </div>
                                        </div>
                                        <!-- <div class="col-xxl-3 col-md-6"> -->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Name of Agency<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name_of_agency" name="name_of_agency"
                                                    value="<?php echo $price_escalation['name_of_agency']; ?>">

                                            </div>
                                        </div>

                                        <!-- <div class="col-xxl-3 col-md-6"> -->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label"> Agreement No. <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="agreement_no" name="agreement_no"
                                                    value="<?php echo $price_escalation['agreement_no']; ?>">

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Sub-Division<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="sub_division" name="sub_division"
                                                    value="<?php echo $price_escalation['sub_division']; ?>">

                                            </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Authority<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="authority" name="authority"
                                                    value="<?php echo $price_escalation['authority']; ?>">

                                            </div>
                                            
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Date of receipt of tendor<span class="text-danger">*</span></label>
                                            <input type="date" name="dateofreceiptof_tendor" id="dateofreceiptof_tendor"
                                                class="form-control" 
                                                value="<?php echo $price_escalation['dateofreceiptof_tendor'];?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Date of work order<span class="text-danger">*</span></label>
                                            <input type="date" name="dateofwork_order" id="dateofwork_order"
                                                class="form-control"
                                                value="<?php echo $price_escalation['dateofwork_order'];?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Star Rate of Cement Rs.<span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="sroc" id="sroc" class="form-control"
                                                placeholder="Enter Star Rate of Cement" 
                                                value="<?php echo $price_escalation['sroc'];?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Star Rate of Steel Rs.<span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="sros" id="sros"
                                                class="form-control" placeholder="Enter Star Rate Of Steel" 
                                                value="<?php echo $price_escalation['sros'];?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Labour<span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="labour" id="labour"
                                                class="form-control" placeholder="Enter Labour value" 
                                                value="<?php echo $price_escalation['labour'];?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Material<span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="material" id="material" class="form-control"
                                                placeholder="Enter Material value" 
                                                value="<?php echo $price_escalation['material'];?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">POL<span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="pol" id="pol" class="form-control"
                                                placeholder="Enter pol value" 
                                                value="<?php echo $price_escalation['pol'];?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <!--end col-->
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 mt-4">

                                    <button type="submit" class="btn btn-primary" >Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--</div>-->
                </div>
        </div>
    </div>
</div>

</form>
<!--end row-->

<!--end col-->
</div>
<!--end row-->

</div> <!-- container-fluid -->
</div><!-- End Page-content -->
<?php
include 'footer.php';
?>