<?php
include 'header.php';
//$class = $db->select("class", "*", ['deleted' => 0]);
//$student_id = $_REQUEST['student_id'];
//$category = $db->select("category", "*");
//$division = $db->select("divisions", "*");
?>



<div class="vertical-overlay"></div>


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Student | <a href="students.php">View All Students</a></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form action="student-admission-save.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="row gy-4">
                                        <div>
                                            <div class="card-header bg-primary bg-primary">
                                                <h5 class="text-white">Students Information</h5>
                                            </div> 
                                        </div>
                                        <!--<div class="row gutters">-->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <!-- <div class="col-xxl-3 col-md-6"> -->
                                            <div>
                                                <label for="placeholderInput" class="form-label"> Last Name<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="last_name"
                                                       placeholder="Enter Last name" required>
                                            </div>
                                        </div>
                                        <!-- <div class="col-xxl-3 col-md-6"> -->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label"> First Name<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="first_name"
                                                       placeholder="Enter First name" required>
                                            </div>
                                        </div>

                                        <!-- <div class="col-xxl-3 col-md-6"> -->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label"> Middle Name<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="middle_name"
                                                       placeholder="Enter Middle name" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row gutters mt-3">
                                     <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <label for="exampleFormControlTextarea5" class="form-label">Gender<span class="text-danger">*</span></label>
                                            <select class="form-select" aria-label="Default select example" name="gender" required>
                                            <option value="" selected disabled>Select your Gender</option>
                                            <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Birth-Date<span
                                                        class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="dob" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Birth Place<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="birth_place"
                                                       placeholder="Enter Birth Place" >
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="row gutters mt-3">

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Aadhar No<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="aadhar_no" pattern="[0-9]{12}"
                                                       placeholder="Enter Aadhar No" >
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Nationality<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control form-select " name="nationality"
                                                        required>
                                                    <option value="" selected disabled>select Nationality</option>
                                                    <option value="indian">Indian</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Religion<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control form-select" name="religion" required>
                                                    <option value=""selected  disabled>Select Religion</option>
                                                    <option value="hindu">Hindu</option>
                                                    <option value="muslim">Muslim</option>
                                                    <option value="sikh">Sikh</option>
                                                    <option value="christian">Christian</option>
                                                    <option value="other">OTHER</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gutters mt-3">

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Caste<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="caste" required
                                                       placeholder="Enter Caste">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Category<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control form-select" name="category" required>
                                                    <option value=""selected disabled>Please select Category</option>
                                                    <option value="sc">SC</option>
                                                    <option value="st">ST</option>
                                                    <option value="b.c">B.C</option>
                                                    <option value="sbc">SBC</option>
                                                    <option value="nt">NT</option>
                                                    <option value="vjnt">VJNT</option>
                                                    <option value="obc">OBC</option>
                                                    <option value="open">OPEN</option>
                                                    <option value="other">OTHER</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">
                                                    Address<span class="text-danger">*</span></label>
                                                </label>
                                                <input type="text" class="form-control" name="address"
                                                       placeholder="Enter  Address" required>
                                            </div>
                                        </div>
                                        <div class="row gutters mt-3">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div>
                                                    <label for="placeholderInput" class="form-label">Correspondence
                                                        Address</label>
                                                    <input type="text" class="form-control"
                                                           name="correspondence_address"
                                                           placeholder="Enter Coresspondence Address">
                                                </div><!-- comment --><br>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div>

                                                    <label for="placeholderInput" class="form-label">Mobile No<span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" class="form-control"
                                                           name="student_mobile_no" pattern="[789][0-9]{9}" placeholder="Enter Mobile No">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div>

                                                    <label for="placeholderInput" class="form-label">Emergency
                                                        Mobile No<span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                           name="emergency_mobile_no"
                                                           placeholder="Enter Emergeny Mobile No">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gutters mt-3">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div>

                                                    <label for="placeholderInput" class="form-label">Name of Person
                                                        to be contacted<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                           name="name_of_person_to_contact" placeholder="Enter Name">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <label for="placeholderInput" class="form-label">Is Handicap<span
                                                        class="text-danger">*</span>
                                                </label>
                                                <select class="form-control form-select" id="is_handicap"
                                                        name="is_handicap" required>
                                                    <option value="is_handicap" selected disabled>Is handicap</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <label for="placeholderInput" class="form-label">Is Orphan<span
                                                        class="text-danger">*</span>
                                                </label>
                                                <select class="form-control form-select" id="is_orphan"
                                                        name="is_orphan" required>
                                                    <option value="is_orphan"selected disabled>Is Orphan</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row gutters mt-3">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <label for="placeholderInput" class="form-label">Blood Group<span
                                                        class="text-danger">*</span>
                                                </label>
                                                <select class="form-control form-select" id="blood_group"
                                                        name="blood_group" >
                                                    <option value="">Select Blood Group</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div>
                                                    <label for="placeholderInput" class="form-label">Student's photo
                                                    </label>
                                                    <input type="file" class="form-control" name="photo"
                                                           placeholder="Upload Student Photo">
                                                </div><br>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="card-header bg-primary bg-primary">
                                                <h5 class="text-white">Family Information</h5>
                                            </div> <br>
                                        </div>
                                        <div>
                                            <h5 class="text-primary">Father/Guardian:</h5>
                                        </div><br>
                                        <div class="row gutters mt-3">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div>
                                                    <label for="placeholderInput" class="form-label">Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="father_name"
                                                            placeholder="Enter Name">
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div>
                                                    <label for="placeholderInput" class="form-label">Age
                                                    </label>
                                                    <input type="number" class="form-control" name="father_age"
                                                           placeholder="Enter Age">
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div>

                                                    <label for="placeholderInput"
                                                           class="form-label">Nationality</label>
                                                    <select class="form-control form-select"
                                                            name="father_nationality" >
                                                        <option value="">Select Nationality</option>
                                                        <option value="indian">Indian</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gutters mt-3">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div>
                                                    <label for="placeholderInput"
                                                           class="form-label">Qualification</label>
                                                    <input type="text" class="form-control"
                                                           name="father_qualification"
                                                           placeholder="Enter Qualification">
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div>
                                                    <label for="placeholderInput"
                                                           class="form-label">Profession</label>
                                                    <input type="text" class="form-control" name="father_profession"
                                                           placeholder="Enter Profession">
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div>
                                                    <label for="placeholderInput" class="form-label">Office
                                                        Address</label>
                                                    <input type="text" class="form-control"
                                                           name="father_office_address"
                                                           placeholder="Enter Office Address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gutters mt-3">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div>
                                                    <label for="placeholderInput"
                                                           class="form-label">Designation</label>
                                                    <input type="text" class="form-control"
                                                           name="father_designation" placeholder="Enter Designation">
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div>
                                                    <label for="placeholderInput" class="form-label">Annual
                                                        Income</label>
                                                    <input type="number" class="form-control" name="father_income"
                                                           placeholder="Enter Annual Income">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div>
                                                    <label for="placeholderInput"
                                                           class="form-label">Mobile_No</label>
                                                    <input type="number" class="form-control"
                                                           name="father_mobile_no" patter="[0-9]{10}" placeholder="Enter Mobile No"
                                                           >
]                                                </div><br>
                                            </div><!-- comment -->
                                            <div>
                                                <div class="card-header bg-primary bg-primary">
                                                    <h5 class="text-white">Family Information</h5>
                                                </div> <br>
                                            </div>
                                            <div>
                                                <h5 class="text-primary">Mother/Guardian:</h5>
                                            </div><br>
                                            <div class="row gutters mt-3">
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div>
                                                        <label for="placeholderInput" class="form-label">Name<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="mother_name"
                                                                placeholder="Enter Name">
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div>
                                                        <label for="placeholderInput" class="form-label">Age
                                                        </label>
                                                        <input type="number" class="form-control" name="mother_age"
                                                               placeholder="Enter Age">
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div>

                                                        <label for="placeholderInput"
                                                               class="form-label">Nationality</label>
                                                        <select class="form-control form-select"
                                                                name="mother_nationality" >
                                                            <option value="">Select Nationality</option>
                                                            <option value="indian">Indian</option>
                                                            <option value="other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gutters mt-3">
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div>
                                                        <label for="placeholderInput"
                                                               class="form-label">Qualification</label>
                                                        <input type="text" class="form-control"
                                                               name="mother_qualification"
                                                               placeholder="Enter Qualification">
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div>
                                                        <label for="placeholderInput"
                                                               class="form-label">Profession</label>
                                                        <input type="text" class="form-control"
                                                               name="mother_profession" placeholder="Enter Profession">
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div>
                                                        <label for="placeholderInput" class="form-label">Office
                                                            Address</label>
                                                        <input type="text" class="form-control"
                                                               name="mother_office_address"
                                                               placeholder="Enter Office address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gutters mt-3">
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div>
                                                        <label for="placeholderInput"
                                                               class="form-label">Designation</label>
                                                        <input type="text" class="form-control"
                                                               name="mother_designation"
                                                               placeholder="Enter Designation">
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div>
                                                        <label for="placeholderInput" class="form-label">Anuual
                                                            Income</label>
                                                        <input type="number" class="form-control"
                                                               name="mother_income" placeholder="Enter Annual Income">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div>
                                                        <label for="placeholderInput"
                                                               class="form-label">Mobile_No</label>
                                                        <input type="number" class="form-control"
                                                               name="mother_mobile_no" pattern="[0-9]{10}" placeholder="Enter Mobile no">

                                                    </div>
                                                </div><!-- comment -->
                                            </div>
                                            <div>
                                                <div class="card-header bg-primary bg-primary mt-3">
                                                    <h5 class="text-white">School Information</h5>
                                                </div> <br>
                                            </div>


                                            <div class="row gutters mt-3">

                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div>

                                                        <label for="placeholderInput" class="form-label">Previous
                                                            School(if any) attended</label>
                                                        <input type="text" class="form-control"
                                                               name="previous_school"
                                                               placeholder="Enter Previous School">
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div>
                                                        <label for="placeholderInput" class="form-label">School
                                                            UDIES No</label>
                                                        <input type="text" class="form-control"
                                                               name="school_udies_no"
                                                               placeholder="Enter School UDIES No">
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div>
                                                        <label for="placeholderInput" class="form-label">Student
                                                            Id</label>
                                                        <input type="text" class="form-control" name="student_id"
                                                               placeholder="Enter Student Id">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gutters mt-3">


                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div>
                                                        <label for="placeholderInput" class="form-label">Last
                                                            Leaving Certificate
                                                        </label>
                                                        <input type="file" class="form-control"
                                                               name="last_leaving_certificate"
                                                               placeholder="Upload Last Leaving Certificate">
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div>
                                                        <label for="placeholderInput" class="form-label">Gr
                                                            No

                                                        </label>
                                                        <input type="text" class="form-control" name="gr_no"
                                                               placeholder="Enter Gr No">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div>
                                                        <label for="placeholderInput" class="form-label">Admission
                                                            Type</label>
                                                        <select class="form-control form-select"
                                                                name="admission_type" required>
                                                            <option value="admission-type" selected disabled>Admission type
                                                            </option>
                                                            <option value="regular">Regular admission
                                                            </option>
                                                            <option value="early">Early admission</option>
                                                            <option value="rolling">Rolling admission
                                                            </option>
                                                            <option value="open">Open admission</option>
                                                            <option value="transfer">Transfer admission
                                                            </option>
                                                            <option value="international">International
                                                                admission</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div>
                                                        <label for="placeholderInput" class="form-label">Admission
                                                            Date

                                                        </label>
                                                        <input type="date" class="form-control" name="admission_date"
                                                               placeholder="Enter Admission Date">
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 mt-4">

                                                    <button type="submit" class="btn btn-primary"
                                                            style="">Submit</button>
                                                </div>

                                            </div>



                                        </div>
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                        </div>

                        </form>
                        <!--end row-->

                        <!--end col-->
                    </div>
                    <!--end row-->

                </div> <!-- container-fluid -->
        </div><!-- End Page-content -->
        <script>
            $(document).ready(function () {
                $("#cat_id").on('change', function () {
                    $("#class_id").load("getclasses.php", {cat_id: $(this).val(), format: 'option'});

                });
                $("#class_id").on('change', function () {
                    $("#division_id").load("getDivisions.php", {class_id: $(this).val(), format: 'option'});

                });
                $("#division_id").on('change', function () {
                    var cat_id = $("#cat_id").val();
                    var class_id = $("#class_id").val();
                    var division_id = $("#division_id").val();
                    //            $("#student_id").load("getstudents.php", {division_id: division_id, class_id: class_id});
                });
            });
        </script>


        <!--
        <script>
            $(document).ready(function () {
        //        $("#class_id").change(function () {
        //            var class_id = $(this).val();
        
                $("#cat_id").change(function () {
                    var cat_id = $(this).val();
        
                    $(".class").hide();
                    $(".division").hide();
        //            $("first_name").$("middle_name").$("last_name") hide();
        
                    $(".student").hide();
        //            $(".class-" + class_id).show();
                    $(".cat_id-" + cat_id).show();
        
        //            $(".student").hide();
        //            $(".division-" + division_id).show();
        
        
                });
        
        
               });
        </script>-->

        <?php
        include 'footer.php';
        ?>