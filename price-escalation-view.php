<?php
include 'header.php';
$database = new Database();
$price_escalation = $database->select("price_escalation", "*", ['is_deleted' => 0]);
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="col mb-3 text-md-end"> 
                        <button type="button" onclick="location.href = 'price-escalation-add.php';"
                            class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn"
                            data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add Prices Escalation
                        </button>
                    </div>
                    <div class="card">
                        <div class="card-header bg-primary bg-primary">
                            <h5 class="text-white">View All Prices Escalation</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <!--                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">-->
                                                </div>
                                            </th>
                                            <th class="sort" data-sort="pe_id">Sr. No.&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            <th class="sort" data-sort="month">Month-(1)</th>
                                            <th class="sort" data-sort="labour">Labour-(2)&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            <th class="sort" data-sort="material">Material-(3)&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            <th class="sort" data-sort="pol">POL-(4)&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            <th class="sort" data-sort="steel">Steel-(5)&nbsp;&nbsp;</th>
                                            <th class="sort" data-sort="cement">Cement-(6)&nbsp;&nbsp;</th>

                                            <th class="sort" data-sort="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        <tr>
                                            <?php
                                            $count = 1;
                                            foreach ($price_escalation as $value) {
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
                                                    
                                                    <?php echo date("M-y", strtotime($value['month'])) ?>
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
                                                <td class="customer_name">
                                                    <?php echo $value['steel']; ?>
                                                </td>
                                                <td class="customer_name">
                                                    <?php echo $value['cement']; ?>
                                                </td>


                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn"
                                                                onClick="location.href ='price-escalation-update.php?pe_id=<?php echo $value['pe_id']; ?>';"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#showModal">Edit</button>
                                                        </div>
                                                        <div class="remove">
                                                        <a href="price-escalation-delete.php?pe_id=<?php echo $value['pe_id'] ?>" >
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