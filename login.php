<?php
session_start();
require_once 'vendor/autoload.php'; // Load the Medoo library
include './inc/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

    $mobile_no = $_POST['mobile_no'];
    $password = md5($_POST['password']);

    $database = new Database();

    $admin = $database->get("users", "*", ['AND' => ['mobile_no' => $mobile_no, 'password' => $password]]);
    if ($admin) {
        if ($admin['is_deleted'] == 0) { {

                //echo "admin";
                $_SESSION['user'] = $admin;
               
                header("location:home.php");
            }
            exit();
        } else {
            $error_message = 'Invalid mobile number or password';
        }
    } else {
        //echo "user";
        // User credentials are invalid, display error message
        $error_message = 'Invalid mobile number or password';
    }
}
?>

<?php
$company = 'Akashenterprises';
$title = $company;
$logo = "Akashenterprises";
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <title>Welcome to
        <?php echo $title;?>    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="./assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="./assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="./assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="./assets/css/custom.min.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./assets/js/jquery.validate.min.js" type="text/javascript"></script>

</head>
<body>
    <!-- auth-page wrapper -->
    <div
      class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100"
    >
      <div class="bg-overlay"></div>
      <!-- auth-page content -->
      <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="card overflow-hidden m-0">
                <div class="row justify-content-center g-0">
                  <div class="col-lg-6">
                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                      <div class="bg-overlay"></div>
                      <div class="position-relative h-100 d-flex flex-column">
                      <div class="mb-4">
                            <img
                              src="assets/images/logo-no-background.png"
                              alt=""
                              height="25"
                            />
                        </div><div class="mt-auto">
                          <div class="mb-3">
                            <i
                              class="ri-double-quotes-l display-4 text-success"
                            ></i>
                          </div>

                          <div
                            id="qoutescarouselIndicators"
                            class="carousel slide"
                            data-bs-ride="carousel"
                          >
                            <div class="carousel-indicators">
                              <button
                                type="button"
                                data-bs-target="#qoutescarouselIndicators"
                                data-bs-slide-to="0"
                                class="active"
                                aria-current="true"
                                aria-label="Slide 1"
                              ></button>
                              <button
                                type="button"
                                data-bs-target="#qoutescarouselIndicators"
                                data-bs-slide-to="1"
                                aria-label="Slide 2"
                              ></button>
                              <button
                                type="button"
                                data-bs-target="#qoutescarouselIndicators"
                                data-bs-slide-to="2"
                                aria-label="Slide 3"
                              ></button>
                            </div>
                            <div
                              class="carousel-inner text-center text-white-50 pb-5"
                            >
                              <div class="carousel-item active">
                                <p class="fs-15 fst-italic">
                                  " Great! Clean code, clean design, easy for
                                  customization. Thanks very much! "
                                </p>
                              </div>
                              <div class="carousel-item">
                                <p class="fs-15 fst-italic">
                                  " The theme is really great with an amazing
                                  customer support."
                                </p>
                              </div>
                              <div class="carousel-item">
                                <p class="fs-15 fst-italic">
                                  " Great! Clean code, clean design, easy for
                                  customization. Thanks very much! "
                                </p>
                              </div>
                            </div>
                          </div>
                          <!-- end carousel -->
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="p-lg-5 p-4">
                    <div>
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p class="text-muted">Sign in to continue to
                                                <?php echo $company; ?>.
                                            </p>
                                            <?php if (isset($error_message)) { ?>
                                                <p >
                                                    <?php echo $error_message; ?>
                                                </p>
                                            <?php } ?>
                                        </div>


                      <div class="mt-4">
                                            <form class="needs-validation" action="" method="POST"
                                                id="login-form">

                                                <div class="mb-3">
                                                    <label for="useremail" class="form-label">Mobile No <span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" id="mobile_number"
                                                        name="mobile_no" placeholder="Enter mobile number" autofocus=""
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please enter mobile number
                                                    </div>
                                                </div>


                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">Password</label>
                                                    <div class="position-relative auth-pass-inputgroup">
                                                        <input type="password" name="password"
                                                            class="form-control pe-5 password-input"
                                                            onpaste="return false" placeholder="Enter password"
                                                            id="password-input" name="password-input"
                                                            aria-describedby="passwordInput" required>
                                                        <button
                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                            type="button" id="password-addon"><i
                                                                class="ri-eye-fill align-middle"></i></button>
                                                        <div class="invalid-feedback">
                                                            Please enter password
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="mt-4">

                                                    <button class="btn btn-success w-100" type="submit"
                                                        name="login">Sign In</button>

                                                </div>



                                            </form>

                                        </div>

                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- end card -->
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
        <!-- end container -->
      </div>
      <!-- end auth page content -->

      <!-- footer -->
      <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                <?php echo $company; ?>. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                                Softanic Solutions +91 8275331362.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
      <!-- end Footer -->
    </div>
   </body>
<!-- JAVASCRIPT -->
<script src="./assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./assets/libs/simplebar/simplebar.min.js"></script>
<script src="./assets/libs/node-waves/waves.min.js"></script>
<script src="./assets/libs/feather-icons/feather.min.js"></script>
<script src="./assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="./assets/js/plugins.js"></script>

<!-- password-addon init -->
<script src="./assets/js/pages/password-addon.init.js"></script>
<script src="./assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./assets/libs/simplebar/simplebar.min.js"></script>
<script src="./assets/libs/node-waves/waves.min.js"></script>
<script src="./assets/libs/feather-icons/feather.min.js"></script>
<script src="./assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="./assets/js/plugins.js"></script>

<!-- particles js -->
<script src="./assets/libs/particles.js/particles.js"></script>
<!-- particles app js -->
<script src="./assets/js/pages/particles.app.js"></script>
<!-- validation init -->
<script src="./assets/js/pages/form-validation.init.js"></script>
<!-- password create init -->
<script src="./assets/js/pages/passowrd-create.init.js"></script>

</html>