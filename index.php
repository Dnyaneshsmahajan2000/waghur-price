<?php
include 'header.php';
$username = $user['name'];
$currentMonth = date("F");
$currentYear = date("Y");
$session_type = $user['type'];
$total_users = $database->count('users', ['is_deleted' => 0]);
function get_time_greeting() {
    $current_time = date('H');
    $greeting = "";

    if ($current_time >= 00 && $current_time < 12) {
        $greeting = "Good morning!";
    } elseif ($current_time >= 12 && $current_time < 17) {
        $greeting = "Good afternoon!";
    } elseif ($current_time >= 17 && $current_time < 00) {
        $greeting = "Good evening!";
      } 

    return $greeting;
}

$message = get_time_greeting();

?>
<!-- Vertical Overlay-->
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
                        <h4 class="mb-sm-0">Home</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Home</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col">

                    <div class="h-100">
                        <div class="row mb-3 pb-1">
                            <div class="col-12">
                                <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                    <div class="flex-grow-1">
                                        <h4 class="fs-16 mb-1"> <?php  echo   $message." ".$_SESSION['user_login']['name'];?></h4>
                                    </div>
                                   
                                </div><!-- end card header -->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row">
                    <?php 
                    if($user['type']=='Admin'){
                    ?>
                        <div class="col-xl-4 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Users</p>
                                            </div>
                                          
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4" > <?php  echo $total_users;?> </h4>
                                                <a href="users.php" class="text-decoration-underline" >View Users</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-warning rounded fs-3">
                                                    <i class="bx bx-user-circle text-warning"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            
                            
                            <div class="col-xl-4 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> My Expense</p>
                                            </div>
                                              </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">₹<span class="counter-value" data-target="<?php //echo $totalExpense; ?>"></span> </h4>
                                                <a href="expense-report.php" class="text-decoration-underline">Expense</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-danger rounded fs-3">
                                                    <i class="bx bx-wallet text-danger"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                            <div class="col-xl-4 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> My Income</p>
                                            </div>
                                              </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">₹<span class="counter-value" data-target="<?php //echo $totalIncome; ?>"></span> </h4>
                                                <a href="income-report.php" class="text-decoration-underline">Income</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-success rounded fs-3">
                                                    <i class="bx bx-wallet text-success"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div>
                        <div class="col-xl-4 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> My Balance</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">₹<span class="counter-value" data-target="<?php //echo $total_balance; ?>"></span></h4>
                                                <a href="balance-view.php" class="text-decoration-underline">Balance</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-primary rounded fs-3">
                                                    <i class="bx bx-wallet text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                            <?php }else{
                               ?>
                            <div class="col-xl-4 col-md-4">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> My Expense</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">₹<span class="counter-value" data-target="<?php //echo $totalExpense; ?>"></span> </h4>
                                                <a href="expense-report.php" class="text-decoration-underline">Expense</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-danger rounded fs-3">
                                                    <i class="bx bx-wallet text-danger"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                            <div class="col-xl-4 col-md-4">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> My Income</p>
                                            </div>
                                              </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">₹<span class="counter-value" data-target="<?php //echo $totalIncome; ?>"></span> </h4>
                                                <a href="income-report.php" class="text-decoration-underline">Income</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-success rounded fs-3">
                                                    <i class="bx bx-wallet text-success"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        
                        <div class="col-xl-4 col-md-4">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> My Balance</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">₹<span class="counter-value" data-target="<?php // echo $total_balance; ?>"></span></h4>
                                                <a href="balance-view.php" class="text-decoration-underline">Balance</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-primary rounded fs-3">
                                                    <i class="bx bx-wallet text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                               
                            <?php   }?>

                            
                            <!-- end col -->
                        </div> <!-- end row-->


                
            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    

</div>
<!-- END layout-wrapper -->



<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->


    <?php
    include './footer.php';
    ?>
        