<?php
include 'header.php';
$database = new Database();
$tender = $database->select("tenders", "*", ['is_deleted' => 0]);
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="col mb-3 text-md-end"> 
                        <button type="button" onclick="location.href = 'tender-add.php';"
                            class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn"
                            data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add Tender</button>
                    </div>
                    <div class="card">
                        <div class="card-header bg-primary bg-primary">
                            <h5 class="text-white">View All Tenders</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <!--   <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">-->
                                                </div>
                                            </th>
                                            <th class="sort" data-sort="pe_id">Sr. No.&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            <th class="sort" data-sort="month">Name of Work</th>
                                            <th class="sort" data-sort="labour">Name of Contractor&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            <th class="sort" data-sort="material">Tender Amount&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            <th class="sort" data-sort="pol">Accepted Tender Rate (Low/High)&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            <th class="sort" data-sort="steel">Tender Updated Price&nbsp;&nbsp;</th>
                                            <th class="sort" data-sort="cement">Type of Tender/Tender NO./Proceedings Order No.&nbsp;&nbsp;</th>
                                            <th class="sort" data-sort="pol">Tender Code&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            <th class="sort" data-sort="steel">As Per Tender Updated Price Proposal&nbsp;&nbsp;</th>
                                            <th class="sort" data-sort="cement">At Work&nbsp;&nbsp;</th>
                                            <th class="sort" data-sort="cement">Price Increase&nbsp;&nbsp;</th>
                                            <th class="sort" data-sort="cement">Goods And Service Tax&nbsp;&nbsp;</th>
                                            <th class="sort" data-sort="cement">Total&nbsp;&nbsp;</th>
                                            <th class="sort" data-sort="cement">Grace Period&nbsp;&nbsp;</th>


                                            <th class="sort" data-sort="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        <tr>
                                            <?php
                                            $count = 1;
                                            foreach ($tender as $value) {
                                                ?>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <!--                                                            <input class="form-check-input" type="checkbox" name="chk_child"
                                                                value="option1">-->
                                                    </div>
                                                </th>

                                                <td class="id" style="display:none;"><a href="javascript:void(0);"
                                                        class="fw-medium link-primary">#VZ2101</a></td>
                                                <td class="customer_name">
                                                    <?php echo $count++; ?>
                                                </td>
                                        
                                                <td class="customer_name">
                                                    <?php echo $value['name_of_work']; ?>
                                                </td>
                                                <td class="customer_name">
                                                    <?php echo $value['name_of_contractor']; ?>
                                                </td>
                                                <td class="customer_name">
                                                    <?php echo $value['tender_amount']; ?>
                                                </td>
                                                <td class="customer_name">
                                                    <?php echo $value['tender_rate']; ?>
                                                </td>
                                                <td class="customer_name">
                                                    <?php echo $value['tender_updated_price']; ?>
                                                </td>
                                                <td class="customer_name">
                                                    <?php echo $value['type_of_tender']; ?>
                                                </td>
                                                <td class="customer_name">
                                                    <?php echo $value['tender_code']; ?>
                                                </td>
                                                <td class="customer_name">
                                                    <?php echo $value['tender_price_proposal']; ?>
                                                </td>
                                                <td class="customer_name">
                                                    <?php echo $value['at_work']; ?>
                                                </td>
                                                <td class="customer_name">
                                                    <?php echo $value['price_increase']; ?>
                                                </td>
                                                <td class="customer_name">
                                                    <?php echo $value['goods_service_tax']; ?>
                                                </td>
                                                <td class="customer_name">
                                                    <?php echo $value['total']; ?>
                                                </td>
                                                <td class="customer_name">
                                                    <?php echo $value['grace_period']; ?>
                                                </td>


                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn"
                                                                onClick="location.href ='tender-update.php?t_id=<?php echo $value['t_id']; ?>';"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#showModal">Edit</button>
                                                        </div>
                                                        <div class="remove">
                                                        <a href="tender-delete.php?t_id=<?php echo $value['t_id'] ?>" >
                                                            <button class="btn btn-sm btn-danger remove-item-btn" onclick='return delete_confirm()'
                                                                data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Delete</button></a>
                                                        </div>


                                                    </div>
                                                </td>

                                            </tr>
                                            <?php
                                            }
                                            ?>

                                    </tbody>
                                </table>
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                            colors="primary:#121331,secondary:#08a88a"
                                            style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ Orders We did not
                                            find any orders for you search.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev disabled" href="#">
                                        Previous
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="#">
                                        Next
                                    </a>
                                </div>
                            </div>

                        </div><!-- end card -->
                    </div><!-- end col -->
                </div><!-- end col -->
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>