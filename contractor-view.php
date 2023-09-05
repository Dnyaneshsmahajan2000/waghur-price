<?php
include 'header.php';
$database = new Database();
$contractor = $database->select("contractors", "*", ['is_deleted' => 0]);
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col mb-3 text-md-end">
                        <button type="button" onclick="location.href = 'contractor-add.php';"
                            class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn"
                            data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add
                            Contractor</button>
                    </div>
                </div>

            </div>
            <div class="card">

                <div class="card-header bg-primary bg-primary">
                    <h5 class="text-white"> View All Contractors Information</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <!--<input class="form-check-input" type="checkbox" id="checkAll" value="option">-->
                                        </div>
                                    </th>
                                    <th class="sort" data-sort="c_id">Sr. No. &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="name_of_contractor">Name of Contractor
                                        &nbsp;&nbsp;&nbsp;&nbsp; </th>
                                    <th class="sort" data-sort="address_of_contractor">Address of Contractor
                                        &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="contractor_representative"> Name and Mobile Number of
                                        Contractor Representative&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="pwd">PWD-Registration No and Valid Date
                                        Upto&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="pin_cod">PIN Code &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="email">Email-ID &nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="mobile_number">Mobile Number&nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="landline_number">Landline Number &nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="pancard_number">Pan Card Number &nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="gst_number">Good Service Tax Number(GST No) &nbsp;&nbsp;
                                    </th>
                                    <th class="sort" data-sort="bank_name">Bank Name &nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="account_number">Account Number &nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="ifsc_code">IFSC Code &nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="account_number">Account Type &nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="branch_address">Branch Address &nbsp;&nbsp;</th>

                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <tr>
                                    <?php
                                    $count = 1;
                                    foreach ($contractor as $value) {
                                        ?>
                                        <th scope="row">
                                            <div class="form-check">
                                                <!--                                                            <input class="form-check-input" type="checkbox" name="chk_child"
                                                                value="option1">-->
                                            </div>
                                        </th>

                                        <td class="id" style="display:none;">
                                            <a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $count++; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['name_of_contractor']; ?>
                                        </td>

                                        <td class="customer_name">
                                            <?php echo $value['address_of_contractor']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['contractor_representative']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['pwd']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['pin_code']; ?>
                                        </td>

                                        <td class="customer_name">
                                            <?php echo $value['email']; ?>
                                        </td>

                                        <td class="customer_name">
                                            <?php echo $value['mobile_number']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['landline_number']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['pancard_number']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['gst_number']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['bank_name']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['account_number']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['ifsc_code']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['account_type']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['branch_address']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['branch_telephone_number']; ?>
                                        </td>


                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <button class="btn btn-sm btn-success edit-item-btn"
                                                        onClick="location.href = 'contractor-update.php?c_id=<?php echo $value['c_id']; ?>';"
                                                        data-bs-toggle="modal" data-bs-target="#showModal">Edit</button>
                                                </div>
                                                <div class="remove">

                                                    <a href="contractor-delete.php?c_id=<?php echo $value['c_id'] ?>">
                                                        <button class="btn btn-sm btn-danger remove-item-btn"
                                                            onclick='return delete_confirm()' data-bs-toggle="modal"
                                                            data-bs-target="#deleteRecordModal">Delete</button></a>
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
                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
</div>
</div>
</div>

<?php
include 'footer.php';
?>