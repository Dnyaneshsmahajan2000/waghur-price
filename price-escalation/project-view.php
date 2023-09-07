<?php
include 'header.php';
$database = new Database();
$project= $database->select("project", "*", ['is_deleted' => 0]);
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col mb-3 text-md-end">
                        <button type="button" onclick="location.href = 'project-add.php';"
                            class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn"
                            data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add
                            Project</button>
                    </div>
                </div>

            </div>
            <div class="card">

                <div class="card-header bg-primary bg-primary">
                    <h5 class="text-white"> View All Projects</h5>
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
                                    <th class="sort" data-sort="p_id">Sr. No. &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="name_of_work">Name of Work &nbsp;&nbsp;&nbsp;&nbsp; </th>
                                    <th class="sort" data-sort="name_of_agency">Name of Agency &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="agreement_no"> Agreement No.
                                        &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="sub_division">Sub-Division &nbsp;&nbsp;&nbsp;&nbsp;
                                    </th>
                                    <th class="sort" data-sort="authority">Authority &nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="date_receipt_tendor">Date of receipt of tendor
                                        &nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="date_work_order">Date of work order &nbsp;&nbsp;
                                    </th>
                                    <th class="sort" data-sort="star_rate_cement">Star Rate of Cement Rs. &nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="star_rate_steel">Star Rate of Steel Rs. &nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="labour">Labour &nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="material">Material &nbsp;&nbsp;</th>
                                    <th class="sort" data-sort="pol">POL &nbsp;&nbsp;</th>

                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <tr>
                                    <?php
                                    $count = 1;
                                    foreach ($project as $value) {
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
                                            <?php echo $value['name_of_work']; ?>
                                        </td>

                                        <td class="customer_name">
                                            <?php echo $value['name_of_agency']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['agreement_no']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['sub_division']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['authority']; ?>
                                        </td>

                                        <td class="customer_name">
                                            <?php echo $value['date_receipt_tender']; ?>
                                        </td>

                                        <td class="customer_name">
                                            <?php echo $value['date_work_order']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['star_rate_cement']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['star_rate_steel']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['labour']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['material']; ?>
                                        </td>
                                        <td class="customer_name">
                                            <?php echo $value['pol']; ?>
                                        </td>


                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <button class="btn btn-sm btn-success edit-item-btn"
                                                        onClick="location.href = 'project-update.php?p_id=<?php echo $value['p_id']; ?>';"
                                                        data-bs-toggle="modal" data-bs-target="#showModal">Edit</button>
                                                </div>
                                                <div class="remove">

                                                <a href="project-delete.php?p_id=<?php echo $value['p_id'] ?>" >
                                                            <button class="btn btn-sm btn-danger remove-item-btn" onclick='return delete_confirm()'
                                                                data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Delete</button></a>
                                                    
                                                                
                                                </div>
                                                <div class="print">
                                                    <button class="btn btn-sm btn-info edit-item-btn"
                                                        onClick="location.href = 'bill.php?p_id=<?php echo $value['p_id']; ?>';"
                                                        data-bs-toggle="modal" data-bs-target="#showModal">Print</button>
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