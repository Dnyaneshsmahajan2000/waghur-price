<?php
include 'header.php';

$db = new Database();

$users = $db->select('users', "*");
?>

<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="assets/js/plugins.js"></script>

<!-- Sweet Alerts js -->
<script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="assets/js/pages/sweetalerts.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

<style>
    .edit {
        text-align: center;
    }
</style>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Users</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">

                                <li class="breadcrumb-item active">
                                    <a href='user-add.php' class=" btn btn-sm btn-primary text-white">
                                        <i class="ri-add-line align-bottom me-1"></i> Add New User
                                    </a>
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->




            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped align-middle table-nowrap" id="customerTable">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Name</th>
                                            <th>Mobile No</th>
                                            <th>Type</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $c = 1;
                                        foreach ($users as $user) {
                                            $class = $user['is_deleted'] == 1 ? 'bg-danger' : 'bg-soft-success';

                                            echo "<tr class='$class'>";
                                            echo '<th>' . $c++ . '</th>';
                                            ?>

                                            <td class="customer_name">
                                                <?php echo $user['name'] ?>
                                            </td>
                                            <td class="mobile">
                                                <?php echo $user['mobile_no']; ?>
                                            </td>

                                            <td class="gender">
                                                <?php echo $user['type']; ?>
                                            </td>

                                            <td>
                                                <div class="d-flex gap-2">

                                                    <div class="edit">
                                                        <a class="btn btn-sm btn-primary edit-item-btn"
                                                            href='user-update.php?id=<?php echo $user['id']; ?>'>Edit</a>
                                                        <a class="btn btn-sm btn-success edit-item-btn"
                                                            href='reset-password.php?id=<?php echo $user['id']; ?>'>Reset
                                                            Password</a>
                                                            <?php
                                                    if ($user['is_deleted'] == "0") {
                                                        echo
                                                        "<a href=user-blocked.php?user_id=" . $user['id'] . " class='btn btn-sm btn-danger remove-item-btn'>Block</a>";
                                                    } else {
                                                        echo
                                                        "<a href=user-blocked.php?user_id=" . $user['id'] . " class='btn btn-sm btn-danger'>Unblock</a>";
                                                    }
                                                    ?>
                                                    
                                                        </div>
                                                </div>
                                </div>
                                </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            </table>
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#121331,secondary:#08a88a"
                                        style="width:75px;height:75px"></lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find
                                        any orders for you search.</p>
                                </div>
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

<?php
include 'footer.php';
?>