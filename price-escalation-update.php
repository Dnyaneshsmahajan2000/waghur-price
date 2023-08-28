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
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Price Escalation &nbsp;&nbsp; |&nbsp;&nbsp; <a href="price-escalation-view.php">View All Price
                                Escalation</a></h4>
                    </div>
                </div>
            </div>
            <form action="price-escalation-update-save.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div>
                                <div class="card-header bg-primary bg-primary">
                                    <h5 class="text-white"> Edit Price Escalation Information</h5>
                                </div>
                        </div>
                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="row gy-4">
                                        
                                        <!--<div class="row gutters">-->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <!-- <div class="col-xxl-3 col-md-6"> -->
                                            <input type="hidden" name="pe_id"
                                                value="<?php echo $price_escalation['pe_id']; ?>">
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
                                                    value="<?php echo $price_escalation['labour']; ?>">

                                            </div>
                                        </div>

                                        <!-- <div class="col-xxl-3 col-md-6"> -->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label"> Material <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="material" name="material"
                                                    value="<?php echo $price_escalation['material']; ?>">

                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">POL<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="pol" name="pol"
                                                    value="<?php echo $price_escalation['pol']; ?>">

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Steel<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="steel" name="steel"
                                                    value="<?php echo $price_escalation['steel']; ?>">

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Cement<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="cement" name="cement"
                                                    value="<?php echo $price_escalation['cement']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4  col-sm-4 col-12 mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>&nbsp;&nbsp;
                            <a href="price-escalation-view.php"><button type="button" class="btn btn-danger text-white">Cancel</button></a>
                        </div>
                    </div>
            </form>
        </div>
    </div> <!-- container-fluid -->
</div><!-- End Page-content -->
<?php
include 'footer.php';
?>