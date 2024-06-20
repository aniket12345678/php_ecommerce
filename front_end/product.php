<?php
include "front_header.php";

$product_id = $_GET['id'];

$fetch_single_product_sql = "SELECT * FROM `products` WHERE `p_id`='$product_id'";
$fetch_single_product_join = mysqli_query($connect,$fetch_single_product_sql);
$fetch_single_product_data = mysqli_fetch_assoc($fetch_single_product_join);

?>

<div id="main_hero" class="container content_heading" style="margin-bottom: 7%;">
    <h1 class="text-center fw-bold" style="margin-top: 13%;">Product</h1>
    <div class="row mt-5">
        <div class="col-md-6 prdt_imgholder">
            <div class="border text-center py-5 px-5">
                <img src="../product_images/<?php echo $fetch_single_product_data['p_img']; ?>" alt="">
            </div>
        </div>
        <div class="col-md-6">
            <form id="add_to_cart_form">
                <div id="anchor_cart"></div>
                <input type="hidden" name="actionname" value="add_to_cart">
                <div class="product_name fs-2">
                    <?php echo $fetch_single_product_data['product']; ?>
                </div>
                <div class="prdt_code d-flex mt-3">
                    <div>
                        CODE : &nbsp;
                    </div>
                    <div>
                        <?php echo $fetch_single_product_data['product_code']; ?>
                    </div>
                </div>
                <div class="mt-3 prdt_price">
                    <div class="d-flex">
                        <div>
                            MRP price: &nbsp;
                        </div>
                        <div>
                            <s>
                                &#8377;<?php echo 2*$fetch_single_product_data['price']; ?>
                            </s>
                        </div>
                    </div>
                    <div class="mt-4 d-flex">
                        <div>
                            PRO price: &nbsp;
                        </div>
                        <div>
                            &#8377;<?php echo $fetch_single_product_data['price']; ?>
                        </div>
                    </div>
                </div>
                <div class="fw-bold mt-2" style="color: forestgreen;">
                    Use <a href="coupons.php" target="_blank">COUPONS</a> for Additional Discounts
                </div>
                
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div>
                        <?php
                            if ($fetch_single_product_data['in_stock']!=0) {
                                $class = "btn-outline-success";
                            }
                            else {
                                $class = "btn-outline-danger";
                            }
                        ?>
                        <button type="button" class="btn <?php echo $class; ?>">
                            In Stock
                        </button>
                    </div>
                    <div class="fw-bolder fs-5">
                        Available: <span style="font-family: 'LibreBaskerville-Bold';"><?php echo $fetch_single_product_data['in_stock']; ?></span>
                    </div>
                    <div>
                        <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#inquiryModal">
                            Enquiry
                        </button>
                    </div>
                </div>
                <div class="mt-3">
                    <p>
                        <span class="fw-bold text-decoration-underline">Shipping Orders Worldwide.</span> Multiple currecies accepted Taxes & Import charges may be applicable at the receiving country
                    </p>
                </div>
                <div class="d-flex prdt_price">
                    <div class="fw-bold">
                        Delievery time: &nbsp;
                    </div>
                    <div>
                        <?php echo $fetch_single_product_data['estimated_time']; ?>
                    </div>
                </div>
                <div class="mt-4">
                    <input type="hidden" name="product_id" id="" value="<?php echo $fetch_single_product_data['p_id']; ?>">
                    <input type="hidden" name="product_name" id="" value="<?php echo $fetch_single_product_data['product']; ?>">
                    <input type="hidden" name="product_img" id="" value="<?php echo $fetch_single_product_data['p_img']; ?>">
                    <input type="hidden" name="product_price" id="" value="<?php echo $fetch_single_product_data['price']; ?>">
                    <button type="button" id="add_to_cart" class="btn btn-warning text-white">
                        Add to cart
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>




<!-- Inquiry Modal -->
<div class="modal fade" id="inquiryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Enquiry box</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="inquiry_form">
                    <input type="hidden" name="actionname" value="product_inquiry">
                    <div class="row g-3">
                        <div class="col">
                            <input type="text" class="form-control" id="inquiry_name" name="myinquiry_name" placeholder="Name" aria-label="First name">
                            <div id="err_inquiry_name"></div>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" id="inquiry_number" name="myinquiry_number" placeholder="Contact" aria-label="Last name">
                            <div id="err_inquiry_contact"></div>
                        </div>
                    </div>
                    <div class="row g-3 mt-2">
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="inquiry_email" name="myinquiry_email" placeholder="E-mail" aria-label="First name">
                            <div id="err_inquiry_email"></div>
                        </div>
                    </div>
                    <div class="form-floating mt-4">
                        <textarea class="form-control" placeholder="Leave a comment here" name="myinquiry_message" id="inquiry_message" style="height: 150px">I am interested in this product - <?php echo $fetch_single_product_data['product'] ?> (<?php echo $fetch_single_product_data['product_code'] ?>). Please let me know when it is available.</textarea>
                        <label for="inquiry_message">Comments</label>
                        <div id="err_inquiry_message"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <span id="inquiry_success"></span><button type="button" class="btn btn-success" id="inquiry_button">Send Inquiry</button>
            </div>
        </div>
    </div>
</div>

<?php
include "front_footer.php";
?>