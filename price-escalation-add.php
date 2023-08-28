<?php include 'header.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Price Escalation &nbsp; &nbsp; |&nbsp; &nbsp; <a href="price-escalation-view.php">View All Price Escalation</a></h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item active">Price Escalation</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- end page title -->
            <form action="price-escalation-save.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary bg-primary">
                                <h5 class="text-white">Fills Price Escalation Information</h5>    
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                <div class="col-md-4">
                                    
                                    <div>
                                        <label for="placeholderInput" class="form-label"> Month <span
                                                class="text-danger">*</span></label>
                                        <input type="month" class="form-control" name="month"
                                            value="<?php echo date('M-Y'); ?>" placeholder="Enter month-year" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div>
                                        <label for="placeholderInput" class="form-label"> Labour<span
                                                class="text-danger">*</span></label>

                                        <input type="number" step="0.01" class="form-control" name="labour"
                                            placeholder="Enter lobour value" required>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div>
                                        <label for="placeholderInput" class="form-label"> Material <span
                                                class="text-danger">*</span></label>
                                        <input type="number" step="0.01" class="form-control" name="material"
                                            placeholder="Enter Material value" required>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div>
                                        <label for="placeholderInput" class="form-label">POL<span
                                                class="text-danger">*</span></label>
                                        <input type="number" step="0.01" class="form-control" name="pol"
                                            placeholder="Enter POL value" required>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div>
                                        <label for="placeholderInput" class="form-label">Steel<span
                                                class="text-danger">*</span></label>
                                        <input type="number" step="0.01" class="form-control" name="steel"
                                            placeholder="Enter steel value" required>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div>
                                        <label for="placeholderInput" class="form-label">Cement<span
                                                class="text-danger">*</span></label>
                                        <input type="number" step="0.01" class="form-control" name="cement"
                                            placeholder="Enter cement value" required>
                                    </div>
                                </div>

                            </div>

                            <!--end col-->

                        </div>


                        
                    </div>

                </div>
                <div class="col-md-2">
                            <div class="form-group">
                                <input type="submit" value="submit" name="submit" class="btn btn-primary mb-4">
                            </div>
                        </div>
            </form><!--end row-->
        </div><!--end row-->
    </div> <!-- container-fluid -->
</div><!-- End Page-content -->
<?php
include 'footer.php';
?>