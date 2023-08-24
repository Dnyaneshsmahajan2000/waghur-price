<?php
include 'header.php';

?>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->

            <!-- end page title -->



            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">View All Students</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" onclick="location.href = 'student-admission.php';"
                                                    class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn"
                                                    data-bs-target="#showModal"><i
                                                    class="ri-add-line align-bottom me-1"></i> Add</button>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control search" placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                // $students = $db->select('admission', "*");
                                // $c = 1;
                                ?>
                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" style="width: 50px;">
                                                    <div class="form-check">
<!--                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">-->
                                                    </div>
                                                </th>
                                                <th class="sort" data-sort="student_id">Sr. No.
                                                    &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                <th class="sort" data-sort="student_name">Student Name</th>
                                                <th class="sort" data-sort="class_id">Class Id&nbsp;&nbsp;&nbsp;&nbsp;
                                                </th>
                                                <th class="sort" data-sort="division_id">Division
                                                    Id&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                <th class="sort" data-sort="gr-no">Gr-No&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                <th class="sort" data-sort="gender">Gender&nbsp;&nbsp;</th>
                                                <th class="sort" data-sort="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            <tr>
                                                <?php
                                                $count = 1;
                                                foreach ($admission as $value) {
                                                    $class = $database->get("class", "*", ['class_id' => $value['class_id']]);
                                                    $division = $database->get("divisions", "*", ['division_id' => $value['division_id']]);
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
                                                        <?php echo $value['last_name'] . " " . $value['first_name'] . " " . $value['middle_name']; ?>
                                                    </td>

                                                    <td class="customer_name">
                                                        <?php echo $class['name']; ?>
                                                    </td>
                                                    <td class="customer_name">
                                                        <?php echo $division['division']; ?>
                                                    </td>
                                                    <td class="customer_name">
                                                        <?php echo $value['gr_no']; ?>
                                                    </td>
                                                    <td class="customer_name">
                                                        <?php echo $value['gender']; ?>
                                                    </td>


                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <div class="edit">
                                                                <button class="btn btn-sm btn-success edit-item-btn"
                                                                        onClick="location.href = 'student-update.php?gr_id=<?php echo $value['gr_id']; ?>';"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#showModal">Edit</button>
                                                            </div>
                                                            <div class="remove">
                                                                <button class="btn btn-sm btn-danger remove-item-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteRecordModal"
                                                                        onClick="location.href = 'student-delete.php?gr_id=<?php echo $value['gr_id']; ?>';">Delete</button>
                                                            </div>
                                                            <div class="remove">
                                                                <button class="btn btn-sm btn-primary remove-item-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteRecordModal"
                                                                        onClick="location.href = 'student-view.php?gr_id=<?php echo $value['gr_id']; ?>';">View</button>
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