<?php include 'header.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Tender &nbsp; &nbsp;|&nbsp; &nbsp;<a href="tender-view.php">View All
                                Tenders</a></h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Add Tender</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <form action="tender-save.php" method="post" class="needs-validation" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary bg-primary">
                                <h5 class="text-white">Tender Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date">Date<span class="text-danger">*</span></label>
                                            <input type="date" name="date" id="date"
                                                class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Name of Work <span class="text-danger">*</span></label>
                                            <input type="text" name="name_of_work" id="name_of_work"
                                                class="form-control" placeholder="Enter Name of Work " required="">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Name of Contractor<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name_of_contractor" id="name_of_contractor"
                                                class="form-control" placeholder="Enter Name of Contractor" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Amount Estimated<span class="text-danger">*</span></label>
                                            <input type="number" name="amount_estimated" id="amount_estimated"
                                                class="form-control" placeholder="Enter Amount Estimated" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Above or Bellow <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="above_or_bellow" id="above_or_bellow" class="form-control"
                                                placeholder="Enter Accepted Tender Rate" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Accepted Tender Value<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="tender_value" id="tender_value" class="form-control"
                                                placeholder="Enter Accepted Tender Value" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Outward No (Authority of contact)<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="outward_no" id="outward_no"
                                                class="form-control" placeholder="Enter Outward No (Authority of contact)"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Agreement No.<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="agreement_no" id="agreement_no"
                                                class="form-control" placeholder="Enter Agreement No." required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Date of Commencement (Work Order PDF)<span
                                                    class="text-danger">*</span></label>
                                            <input type="file" name="date_of_commencement"
                                                id="date_of_commencement" class="form-control"
                                                placeholder="Enter Date of Commencement" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Date of Completion<span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="date_of_completion"
                                                id="date_of_completion" class="form-control"
                                                placeholder="Enter Date of Completion" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Date of Actual Completion<span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="date_actual_completion"
                                                id="date_actual_completion" class="form-control"
                                                placeholder="Enter Date of Actual Completion" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Remark<span class="text-danger">*</span></label>
                                            <input type="text" name="remark" id="remark"
                                                class="form-control" placeholder="Enter Remark" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Tender<span class="text-danger">*</span></label>
                                            <input type="file" accept=".pdf" name="tender" id="tender" class="form-control"
                                                 required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="group">Tender Code<span class="text-danger">*</span></label>
                                            <input type="text" name="tender_code" id="tender_code" class="form-control"
                                                placeholder="Enter Tender Code" required="">
                                        </div>
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