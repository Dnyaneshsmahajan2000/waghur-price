<?php include 'header.php'; 

$database = new Database();

if (isset($_GET['t_id']) && is_numeric($_GET['t_id'])) {
    $t_id = $_GET['t_id'];
    $tender = $database->get("tenders", "*", ["t_id" => $t_id]);

    if (!$tender) {
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

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Tender &nbsp; &nbsp;|&nbsp; &nbsp;<a href="project-1-view.php">View All Tenders</a></h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Add Tender</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <form action="tender-update-save.php" method="post" class="needs-validation" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary bg-primary">
                                <h5 class="text-white">Tender Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                <input type="hidden" name="t_id"
                                                value="<?php echo $tender['t_id']; ?>">
                                    
                                    <div class="col-lg-6 md-4">
                                        <div class="form-group">
                                            <label> Name of Work <span class="text-danger">*</span></label>
                                            <input type="text" name="name_of_work" id="name_of_work"
                                                class="form-control" placeholder="Enter Name of Work " required="" value="<?php echo $tender['name_of_work']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 md-4">
                                        <div class="form-group">
                                            <label for="group"> Name of Contractor<span class="text-danger">*</span></label>
                                            <input type="text" name="name_of_contractor" id="name_of_contractor"
                                                class="form-control" placeholder="Enter Name of Contractor" required=""value="<?php echo $tender['name_of_contractor']; ?>">
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-6 md-4">
                                        <div class="form-group">
                                            <label for="group">Tender Amount<span class="text-danger">*</span></label>
                                            <input type="number" name="tender_amount" id="tender_amount"
                                                class="form-control" placeholder="Enter Tender Amount" required="" value="<?php echo $tender['tender_amount']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 md-4">
                                        <div class="form-group">
                                            <label for="group">Accepted Tender Rate (Low/High)<span class="text-danger">*</span></label>
                                            <input type="text" name="tender_rate" id="tender_rate"
                                                class="form-control" placeholder="Enter Accepted Tender Rate" required="" value="<?php echo $tender['tender_rate']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 md-4">
                                        <div class="form-group">
                                            <label for="group">Tender Updated Price<span class="text-danger">*</span></label>
                                            <input type="number" name="tender_updated_price" id="tender_updated_price" class="form-control"
                                                placeholder="Enter Tender Updated Price" required="" value="<?php echo $tender['tender_updated_price']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 md-4">
                                        <div class="form-group">
                                            <label for="group">Type of Tender/Tender NO./Proceedings Order No.<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="type_of_tender" id="type_of_tender"
                                                class="form-control" placeholder="Enter Agreement No." required="" value="<?php echo $tender['type_of_tender']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 md-4">
                                        <div class="form-group">
                                            <label for="group">Tender Code<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="tender_code" id="tender_code"
                                                class="form-control" placeholder="Enter Tender Code" required="" value="<?php echo $tender['tender_code']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 md-4">
                                        <div class="form-group">
                                            <label for="group">As Per Tender Updated Price Proposal<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="tender_price_proposal" id="tender_price_proposal" class="form-control"
                                                placeholder="Enter As Per Tender Updated Price Proposal" required="" value="<?php echo $tender['tender_price_proposal']; ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    
                                    <center><label> Expenditure incurred on the Tender</label></center>
                                    <div class="col-lg-6 md-4">
                                        <div class="form-group">
                                            <label for="group">At Work<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="at_work" id="at_work" class="form-control"
                                                placeholder="Enter At Work" required="" value="<?php echo $tender['at_work']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 md-4">
                                        <div class="form-group">
                                            <label for="group">Price Increase <span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="price_increase" id="price_increase"
                                                class="form-control" placeholder="Enter Price Increase" required="" value="<?php echo $tender['price_increase']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 md-4">
                                        <div class="form-group">
                                            <label for="group"> Goods And Service Tax <span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="goods_service_tax" id="goods_service_tax"
                                                class="form-control" placeholder="Enter Goods And Service Tax" required="" value="<?php echo $tender['goods_service_tax']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 md-4">
                                        <div class="form-group">
                                            <label for="group"> Total<span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="total" id="total" class="form-control"
                                                placeholder="Enter total" required="" value="<?php echo $tender['total']; ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-lg-6 md-4">
                                        <div class="form-group">
                                            <label for="group"> Grace Period<span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="grace_period" id="grace_period" class="form-control"
                                                placeholder="Enter Grace Period" required="" value="<?php echo $tender['grace_period']; ?>">
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