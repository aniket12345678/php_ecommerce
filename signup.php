<?php
include "connection.php";

$countries_sql = "SELECT * FROM `countries`";
$countries_join = mysqli_query($connect,$countries_sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div id="anchor_test"></div>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="mb-3 text-center">
                            <!-- <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                            </a> -->
                            <h3>Sign Up</h3>
                        </div>
                        <form id="signup_form">
                            <input type="hidden" name="actionname" value="sign_up">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="myUsername" id="floatingText" placeholder="jhondoe">
                                <label for="floatingText">Username</label>
                                <div id="name_error"></div>
                            </div>
    
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="myPhonenumber" id="floatingNumber" placeholder="name@example.com">
                                <label for="floatingNumber">Phone number</label>
                                <div id="number_error"></div>
                            </div>
    
                            <div class="mb-3">
                                <select name="myCountry" id="country_select" class="bg-white form-control form-select" style="padding: 13px;">
                                    <option value="Select_country">Select Country</option>
                                    <?php
                                        while ($countries_list = mysqli_fetch_assoc($countries_join)) { 
                                            echo "<option value=".$countries_list['c_id'].">".$countries_list['country']."</option>";
                                        }
                                    ?>
                                </select>
                                <div id="country_error"></div>
                            </div>
    
                            <div class="mb-3">
                                <select name="myState" id="state_select"  class="bg-white form-control form-select" style="padding: 13px;">
                                    <option value="Select_State">Select State</option>
                                </select>
                                <div id="state_error"></div>
                            </div>
    
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="myEmail" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                                <div id="email_error"></div>
                            </div>
    
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" name="myPassword" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                                <div id="password_error"></div>
                            </div>
    
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Agree to all terms</label>
                                </div>
                                <!-- <a href="">Forgot Password</a> -->
                            </div>
                        </form>

                        <div id="success_msg"></div>
                        <button type="button" class="btn btn-primary py-3 w-100 mb-4" id="signup_button">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a href="signin.php">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>