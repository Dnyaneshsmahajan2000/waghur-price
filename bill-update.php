<?php
include 'header.php';

$database = new Database();

if (isset($_GET['bill_id']) && is_numeric($_GET['bill_id'])) {
    $bill_id = $_GET['bill_id'];
    $bill = $database->get("bills", "*", ["bill_id" => $bill_id]);

    if (!$bill) {
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
                        <h4 class="mb-sm-0"> Bill &nbsp;&nbsp;|&nbsp;&nbsp; <a href="bill-view.php"> view All Bills</a></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Edit Bill</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <form action="bill-update-save.php" method="post" class="needs-validation" enctype="multipart/form-data">
                <!-- start page title -->
                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-header bg-primary bg-primary">
                                <h5 class="text-white">Edit Bill Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">

                                    <?php
                                    $database = new Database();

                                    $bill = $database->select("bills", "*");

                                    ?>


                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="Name of work">Name of Work </label>
                                            <select class="form-control" id="type" name="name_of_work" required>
                                                <?php
                                                foreach ($bill as $value) {
                                                    ?>
                                                    <option value="<?php echo $value['name_of_work'] ?>"><?php echo $value['name_of_work'] ?></option>
                                                    <?php
                                                }
                                                ?>

                                            </select>
                                            <input type="hidden" name="bill_id"
                                                value="<?php echo $value['bill_id']; ?>">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Date Of Measurement <span class="text-danger">*</span></label>
                                            <input type="date" name="dateof_measurement" id="dateof_measurement"
                                                class="form-control" value="<?php echo $value['dateof_measurement']; ?>"
                                                placeholder="Enter Date of Measurement" required="">
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="total amount">Total Amount<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="total_amount" id="total_amount"
                                                class="form-control" value="<?php echo $value['total_amount']; ?>"
                                                placeholder="Enter Total Amount" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Quntity of Cement<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="quantity_cement" id="quantity_cement"
                                                class="form-control" value="<?php echo $value['quantity_cement']; ?>"
                                                placeholder="Enter Quantity of Cement"
                                                placeholder="Enter quantity of cement" required="">
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="quantity cement">Quntity of Steel<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="quantity_steel" id="quantity_steel"
                                                class="form-control" value="<?php echo $value['quantity_steel']; ?>"
                                                placeholder="Enter Quantity of Steelt"
                                                placeholder=" Enter Quantity of Steel" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="submit" value="Update" name="submit" class="btn btn-primary"> &nbsp;
                                <a href="bill-view.php"><button type="button" class="btn btn-danger text-white">Cancel</button></a>
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