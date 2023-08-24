<?php
include 'header.php';
//$class = $db->select("class", "*", ['deleted' => 0]);
//$student_id = $_REQUEST['student_id'];
//$category = $db->select("category", "*");
//$division = $db->select("divisions", "*");
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
            <form action="student-admission-save.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="row gy-4">
                                        <div>
                                            <div class="card-header bg-primary bg-primary">
                                                <h5 class="text-white">Waghur Price</h5>
                                            </div> 
                                        </div>
                                        <!--<div class="row gutters">-->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <!-- <div class="col-xxl-3 col-md-6"> -->
                                            <div>
                                                <label for="placeholderInput" class="form-label"> Month <span
                                                        class="text-danger">*</span></label>
                                                <input type="month" class="form-control" name="month"
                                                       placeholder="Enter month" required>
                                            </div>
                                        </div>
                                        <!-- <div class="col-xxl-3 col-md-6"> -->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label"> Labour<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="labour"
                                                       placeholder="Enter lobour value" required>
                                            </div>
                                        </div>

                                        <!-- <div class="col-xxl-3 col-md-6"> -->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label"> Material <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="material"
                                                       placeholder="Enter Material value" required>
                                            </div>
                                        </div>
                                 
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">POL<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="pol" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Steel<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="steel" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Cement<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="cement" required>
                                            </div>
                                        </div>
                                       
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 mt-4">

<button type="submit" class="btn btn-primary"
        style="">Submit</button>
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