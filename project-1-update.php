<?php
include 'header.php';

$database = new Database();

if (isset($_GET['p1_id']) && is_numeric($_GET['p1_id'])) {
    $p1_id = $_GET['p1_id'];
    $project_1 = $database->get("project_1", "*", ["p1_id" => $p1_id]);

    if (!$project_1) {
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
                        <h4 class="mb-sm-0">Project &nbsp;&nbsp;|&nbsp;&nbsp; <a href="price-esccalation-view.php">View All Projects</a></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form action="project-1-update-save.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div>
                                <div class="card-header bg-primary bg-primary">
                                    <h5 class="text-white"> Edit Project Information</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="row gy-4">

                                        <!--<div class="row gutters">-->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <!-- <div class="col-xxl-3 col-md-6"> -->
                                            <input type="hidden" name="p1_id"
                                                value="<?php echo $project_1['p1_id']; ?>">
                                            <div>
                                                <label for="placeholderInput" class="form-label"> Name of Work <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name_of_work"
                                                    value="<?php echo $project_1['name_of_work']; ?>"
                                                    placeholder="Enter month-year" required>
                                            </div>
                                        </div>
                                        <!-- <div class="col-xxl-3 col-md-6"> -->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Name of Agency<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name_of_agency"
                                                    name="name_of_agency"
                                                    value="<?php echo $project_1['name_of_agency']; ?>">

                                            </div>
                                        </div>

                                        <!-- <div class="col-xxl-3 col-md-6"> -->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label"> Agreement No. <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="agreement_no"
                                                    name="agreement_no"
                                                    value="<?php echo $project_1['agreement_no']; ?>">

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Sub-Division<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="sub_division"
                                                    name="sub_division"
                                                    value="<?php echo $project_1['sub_division']; ?>">

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Authority<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="authority" name="authority"
                                                    value="<?php echo $project_1['authority']; ?>">

                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="group">Date of receipt of tendor<span
                                                        class="text-danger">*</span></label>
                                                <input type="date" name="dateofreceiptof_tendor"
                                                    id="dateofreceiptof_tendor" class="form-control"
                                                    value="<?php echo $project_1['dateofreceiptof_tendor']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="group">Date of work order<span
                                                        class="text-danger">*</span></label>
                                                <input type="date" name="dateofwork_order" id="dateofwork_order"
                                                    class="form-control"
                                                    value="<?php echo $project_1['dateofwork_order']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="group">Star Rate of Cement Rs.<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" step="0.01" name="sroc" id="sroc"
                                                    class="form-control" placeholder="Enter Star Rate of Cement"
                                                    value="<?php echo $project_1['sroc']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="group">Star Rate of Steel Rs.<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" step="0.01" name="sros" id="sros"
                                                    class="form-control" placeholder="Enter Star Rate Of Steel"
                                                    value="<?php echo $project_1['sros']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="group">Labour<span class="text-danger">*</span></label>
                                                <input type="number" step="0.01" name="labour" id="labour"
                                                    class="form-control" placeholder="Enter Labour value"
                                                    value="<?php echo $project_1['labour']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="group">Material<span class="text-danger">*</span></label>
                                                <input type="number" step="0.01" name="material" id="material"
                                                    class="form-control" placeholder="Enter Material value"
                                                    value="<?php echo $project_1['material']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="group">POL<span class="text-danger">*</span></label>
                                                <input type="number" step="0.01" name="pol" id="pol"
                                                    class="form-control" placeholder="Enter pol value"
                                                    value="<?php echo $project_1['pol']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-sm-4 col-12 ">
                        <button type="submit" class="btn btn-primary">Update</button>&nbsp;&nbsp;
                        <a href="project-1-view.php"><button type="button" class="btn btn-danger text-white">Cancel</button></a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>