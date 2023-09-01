<?php include 'header.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Project &nbsp; &nbsp;|&nbsp; &nbsp;<a href="project-1-view.php">View All Projects</a></h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Add Project</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <form action="project-save.php" method="post" class="needs-validation" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary bg-primary">
                                <h5 class="text-white"> Fills Project Information</h5>
                            </div>

                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Name of Work <span class="text-danger">*</span></label>
                                            <input type="text" name="name_of_work" id="name_of_work"
                                                class="form-control" placeholder="Enter Name of Work " required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group"> Name of Agency<span class="text-danger">*</span></label>
                                            <input type="text" name="name_of_agency" id="name_of_agency"
                                                class="form-control" placeholder="Enter Name of Agency" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Agreement No.<span class="text-danger">*</span></label>
                                            <input type="text" name="agreement_no" id="agreement_no"
                                                class="form-control" placeholder="Enter Agreement No." required="">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Sub-Division<span class="text-danger">*</span></label>
                                            <input type="text" name="sub_division" id="sub_division"
                                                class="form-control" placeholder="Enter Sub-Division" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Authority<span class="text-danger">*</span></label>
                                            <input type="text" name="authority" id="authority" class="form-control"
                                                placeholder="Enter Authority" required="">
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Date of receipt of tendor<span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="date_receipt_tendor" id="datereceipt_tendor"
                                                class="form-control" placeholder="Enter Agreement No." required="">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Date of work order<span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="date_work_order" id="date_work_order"
                                                class="form-control" placeholder="Enter Sub-Division" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Star Rate of Cement Rs.<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="star_rate_cement" id="star_rate_cement" class="form-control"
                                                placeholder="Enter Star Rate of Cement" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Star Rate of Steel Rs.<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="star_rate_steel" id="star_rate_steel" class="form-control"
                                                placeholder="Enter Star Rate Of Steel" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Labour<span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="labour" id="labour"
                                                class="form-control" placeholder="Enter Labour value" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Material<span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="material" id="material"
                                                class="form-control" placeholder="Enter Material value" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">POL<span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="pol" id="pol" class="form-control"
                                                placeholder="Enter pol value" required="">
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