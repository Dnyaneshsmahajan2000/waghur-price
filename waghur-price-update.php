<?php
include 'header.php';

$database = new Database();

if (isset($_GET['wp_id']) && is_numeric($_GET['wp_id'])) {
    $wp_id = $_GET['wp_id'];
    $waghur_price = $database->get("waghur_price", "*", ["wp_id" => $wp_id]);

    if (!$waghur_price) {
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
                        <h4 class="mb-sm-0">Add Student | <a href="students.php">View All Students</a></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form action="waghur-price-update-save.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="row gy-4">
                                        <div>
                                            <div class="card-header bg-primary bg-primary">
                                                <h5 class="text-white"> Edit Waghur Price</h5>
                                            </div>
                                        </div>
                                        <!--<div class="row gutters">-->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <!-- <div class="col-xxl-3 col-md-6"> -->
                                            <input type="hidden" name="wp_id"
                                                value="<?php echo $waghur_price['wp_id']; ?>">
                                            <div>
                                                <label for="placeholderInput" class="form-label"> Month <span
                                                        class="text-danger">*</span></label>
                                                <input type="month" class="form-control" name="month"
                                                    value="<?php echo date('Y-m'); ?>" placeholder="Enter month-year"
                                                    required>
                                            </div>
                                        </div>
                                        <!-- <div class="col-xxl-3 col-md-6"> -->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label"> Labour<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="labour" name="labour"
                                                    value="<?php echo $waghur_price['labour']; ?>">

                                            </div>
                                        </div>

                                        <!-- <div class="col-xxl-3 col-md-6"> -->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label"> Material <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="material" name="material"
                                                    value="<?php echo $waghur_price['material']; ?>">

                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">POL<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="pol" name="pol"
                                                    value="<?php echo $waghur_price['pol']; ?>">

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Steel<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="steel" name="steel"
                                                    value="<?php echo $waghur_price['steel']; ?>">

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Cement<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="cement" name="cement"
                                                    value="<?php echo $waghur_price['cement']; ?>">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 mt-4">

                                    <button type="submit" class="btn btn-primary" style="">Update</button>
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