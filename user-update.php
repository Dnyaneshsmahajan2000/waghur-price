<?php
include 'header.php';
$database = new $database();
$id = $_REQUEST['id'];
//var_dump(['user']);
$user = $database->select("users", "*", ['id' => $id])[0];
//print_r($user);
?>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="../assets/js/jquery.validate.min.js" type="text/javascript"></script>
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Update User</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form action="user-update-save.php" method="POST" id="user-update-form">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="row gy-4">

                                        <input type="hidden" class="form-control" id="placeholderInput" name="user_id"
                                            value="<?php echo $user['id']; ?>">

                                        <!--end col-->
                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Name<span
                                                        class="text-danger fs-15 "> *</span></label>
                                                <input type="text" required class="form-control" id="placeholderInput"
                                                    placeholder="Enter Your Name" name="name"
                                                    value="<?php echo $user['name']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Mobile No<span
                                                        class="text-danger fs-15 "> *</span></label>
                                                <input type="number" required class="form-control" id="mobile_no"
                                                    value="<?php echo $user['mobile_no']; ?>" name="mobile_no">
                                            </div>
                                        </div>




    
                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="iconInput" class="form-label">Type<span
                                                        class="text-danger fs-15 "> *</span></label>
                                                <div class="form-icon">
                                                    <select required class="form-control form-select" id="type"
                                                        name="type">
                                                        <option value="" selected="">SELECT TYPE</option>
                                                        <option value="admin" <?php echo ($user['type']) == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                                        <option value="user" <?php echo ($user['type']) == 'user' ? 'selected' : ''; ?>>User</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="placeholderInput" class="form-labe">Permissions:</label>
                                                <input type="permissions" class="form-control" id="permissions"
                                                    name="permissions" value="<?php echo $user['permissions']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-md-4 mb-2">
                                            <div class="mt-4">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end row-->
                                </div>

                            </div>


                        </div>
                    </div>
                    <!--end col-->

                </div>
            </form>
            <!--end row-->
        </div>
        <!--end row-->

    </div> <!-- container-fluid -->
</div><!-- End Page-content -->
<?php
include 'footer.php';
?>
<script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/simplebar/simplebar.min.js"></script>
<script src="../assets/libs/node-waves/waves.min.js"></script>
<script src="../assets/libs/feather-icons/feather.min.js"></script>
<script src="../assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="../assets/js/plugins.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>

<script src="../assets/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- password-addon init -->
<script src="../assets/js/pages/password-addon.init.js"></script>
<style>
    .error {

        color: Red;
    }
</style>

<script>
    $(document).ready(function () {

        $("#user-update-form").validate({
            rules: {
                name: {
                    required: true

                },
                mobile_number: {
                    required: true,
                    maxlength: 10,
                    minlength: 10,
                }
            },
            type: {
                required: true
            },


        },
            // Specify validation error messages
            messages: {
            mobile_number: {
                remote: "Phone number already exists."
            },
            type: {
                remote: "You must define type of employee"
            },
            can_login: {
                remote: "you must specify rights of an emplyee toi maintain security"

            }
        },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function (form) {

                form.submit();
            }
    });

</script>