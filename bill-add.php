<?php include 'header.php';
$database = new Database();
$bill = $database->select("project", "*");
?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Bill&nbsp; &nbsp;|&nbsp; &nbsp;<a href="bill-view.php">View All Bills</a></h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Add Bill</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <form action="bill-save.php" method="post" class="needs-validation" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary bg-primary">
                                <h5 class="text-white">Bill Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Name of work">Name of Work </label>
                                            <select class="form-control" id="type" name="name_of_work" required>
                                                <option value="" disabled selected>Please select Project</option>
                                                <?php
                                                foreach ($bill as $value) {
                                                    ?>
                                                    <option value="<?php echo $value['name_of_work'] ?>"><?php echo $value['name_of_work'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Date Of Measurement <span class="text-danger">*</span></label>
                                            <input type="date" name="date_measurement" id="date_measurement"
                                                class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="total amount">Total Amount<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="total_amount" id="total_amount"
                                                class="form-control" placeholder="Enter Total Amount" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Quntity of Cement<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="quantity_cement" id="quantity_cement"
                                                class="form-control" placeholder="Enter quantity of cement" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="quantity cement">Quntity of Steel<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="quantity_steel" id="quantity_steel"
                                                class="form-control" placeholder=" Enter Quantity of Steel" required="">
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
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>