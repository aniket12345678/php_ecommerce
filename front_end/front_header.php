<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $count = 0;
}
else {
    $cart_count = $_SESSION['cart'];
    $count = count($cart_count);
}


include "../connection.php";

$sql = "SELECT * FROM `categories` WHERE `parent_id`='0'";
$join = mysqli_query($connect,$sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="style.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <!-- Start Header -->
        <header class="header_custom border align-items-center bg-light d-flex fixed-top justify-content-between p-2 px-5 border-start-0 border-end-0 border-top-0">
            <div>
                <img src="../logo.svg" alt="">
            </div>
            <nav class="navbar mx-2">
                <ul class="d-flex align-items-center">
                    <li>
                        <a href="index.php" class="p-4 text-black fw-bold">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="shop.php" class="p-4 text-black fw-bold">
                            Shop
                        </a>
                    </li>
                    <li>
                        <a href="contact_us.php" class="p-4 text-black fw-bold">
                            Contact
                        </a>
                    </li>
                    <li>
                        <a data-bs-toggle="modal" data-bs-target="#guidelines" class="p-4 text-black fw-bold">
                            Customer
                        </a>
                    </li>
                    <li>
                        <a class="btn btn-warning ms-3 text-white fw-bold px-4 py-2" href="customer_signup.php">
                            Sign Up
                        </a>
                    </li>
                </ul>
            </nav>
            <div id="cart_img">
                <a href="cart.php" class="text-black">
                    <div style="position: absolute;height: 28px;width: 28px;top: 6px;right: 45px;" class="fw-bold text-center text-white" id="cart_loader">
                        <img src="cart_loader.png" alt="" style="width: 32px;" class="rotate linear infinite">
                    </div>
                    <div style="position: absolute;background: orange;border-radius: 26px;height: 28px;width: 28px;top: 6px;right: 45px;" class="fw-bold text-center text-white" id="products_count">
                        <?php echo $count; ?>
                    </div>
                    <i class="fa-2x fa fa-shopping-cart" aria-hidden="true"></i>
                </a>
            </div>
            <i class="fas fa-bars mobile-nav-toggle"></i>
        </header>

        <div style="position: fixed;background: #173a56;right: 1px;display:none;z-index: 1;" id="mobile_menu_dropdown">
            <ul class="list-unstyled text-white px-4">
                <li class="mt-3">
                    <a href="index.php" class="text-decoration-none text-white">
                        Home
                    </a>
                </li>
                <li class="mt-3">
                    <a href="shop.php" class="text-decoration-none text-white">
                        Shop
                    </a>
                </li>
                <li class="mt-3">
                    <a href="contact_us.php" class="text-decoration-none text-white">
                        Contact
                    </a>
                </li>
                <li class="mt-3">
                    <a href="customer_signup.php" class="text-decoration-none text-white">
                        Customer
                    </a>
                </li>
                <li class="mt-3">
                    <a href="cart.php" class="text-decoration-none text-white">
                        Cart
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Header -->



        <!-- Modal -->
        <div class="modal fade" id="guidelines" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Customer Guidelines</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            This is some placeholder content to show the scrolling behavior for modals. We use repeated line breaks to demonstrate how content can exceed minimum inner height, thereby showing inner scrolling. When content becomes longer than the prefedined max-height of modal, content will be cropped and scrollable within the modal.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>