<?php
include "front_header.php";

$checkout_cart_content = $_SESSION['cart'];

if (empty($_SESSION['user']['id']) || !isset($_SESSION['user'])) {
    echo "<script>";
    echo 'window.location = "http://localhost/admin_panel/front_end/customer_signup.php"';
    echo "</script>";
}

$id = $_SESSION['user']['id'];
$sql = "SELECT * FROM `user_login` WHERE `id`='$id'";
$join = mysqli_query($connect,$sql);
$data = mysqli_fetch_assoc($join);

$details_sql = "SELECT * FROM `user_details` WHERE `m_id`='$id'";
$details_join = mysqli_query($connect,$details_sql);
$details_data = mysqli_fetch_assoc($details_join);


$country_id = $details_data['country'];
$state_id = $details_data['state'];

$country_sql = "SELECT * FROM `countries` WHERE `c_id`='$country_id'";
$country_join = mysqli_query($connect,$country_sql);
$country_data = mysqli_fetch_assoc($country_join);

$state_sql = "SELECT * FROM `states` WHERE `s_id`='$state_id'";
$state_join = mysqli_query($connect,$state_sql);
$state_data = mysqli_fetch_assoc($state_join);

?>

<?php
if (isset($_SESSION['coupon_details'])) { 
    $checkout_coupon_details = $_SESSION['coupon_details'];
    ?>
    <input type="hidden" id="coupon_value_percent" value="<?php echo $_SESSION['coupon_details']['percent']; ?>">
<?php }
?>

<style>
    @media only screen and (max-width: 600px) {
        #billing_cart_container {
            margin: -11px;
        }
    }
</style>

<div id="main_hero" class="container content_heading" style="margin-bottom: 15%;">
    <h1 class="text-center fw-bold mb-5" style="margin-top: 13%;">Checkout</h1>
    <div id="anchor_checkout_container"></div>
    <div class="row g-5" id="billing_cart_container">

        <div class="col-md-7">
            <h4 class="fw-bold fs-2 mb-3">Billing Address</h4>
            <div class="row">
                <div class="col-md-6">
                    <label for="checkout_name">Name</label>
                    <input type="text" name="" id="checkout_name" class="form-control" value="<?php echo $details_data['name'] ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="checkout_customer_code">Customer Code</label>
                    <input type="text" name="" id="checkout_customer_code" class="form-control" readonly>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="checkout_phone">Phone</label>
                    <input type="number" name="" id="checkout_phone" class="form-control"  value="<?php echo $details_data['phone'] ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="checkout_email">E-mail address</label>
                    <input type="email" name="" id="checkout_email" class="form-control" value="<?php echo $data['email']; ?>" readonly>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-5">
                    <label for="">Country</label>
                    <input type="text" class="form-control" name="" id="" value="<?php echo $country_data['country'] ?>" readonly>
                </div>
                <div class="col-md-4">
                    <label for="">State</label>
                    <input type="text" class="form-control" name="" id="" value="<?php echo ucfirst(strtolower($state_data['state'])) ?>" readonly>
                </div>
                <div class="col-md-3">
                    <label for="checkout_name">Pin code</label>
                    <input type="text" name="" id="checkout_name" class="form-control"  value="<?php echo $details_data['pin'] ?>" readonly>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="">Shipping Address</label>
                    <textarea name="" id="" cols="30" rows="4" class="form-control" readonly></textarea>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <h4 class="fw-bold fs-2 mb-3">Cart</h4>
            <div class="row px-3 py-3" style="background: #d3cfcf8c;border-radius: 20px;">
                <?php
                $store_checkout_price = array();
                $store_checkout_quantity = array();
                foreach ($checkout_cart_content as $key => $value) { 
                    $individual_amount = $value['p_price']*$value['p_quantity'];
                    $store_checkout_price[] = $individual_amount;
                    $store_checkout_quantity[] = $value['p_quantity'];
                    ?>
                    <div class="col-md-12 d-flex justify-content-between align-items-baseline mt-2">
                        <div style="width: 100px;">
                            <div>
                                <img src="../product_images/<?php echo $value['p_img']; ?>" alt="" style="width: 70px;height:70px;" class="img-thumbnail">
                            </div>
                            <h6 class="fw-bold">
                                <?php echo $value['p_name']; ?>
                            </h6>
                        </div>
                        <div>
                            X
                        </div>
                        <div style="font-family: 'LibreBaskerville-Bold';">
                            <?php echo $value['p_quantity']; ?>
                        </div>
                        <div>
                            =
                        </div>
                        <div class="fw-bold" style="color: green;font-family: 'LibreBaskerville-Bold';">
                            &#8377;<?php echo $individual_amount; ?>
                        </div>
                    </div>
                    <hr>
                <?php }
                ?>
                <?php
                if (isset($_SESSION['coupon_details'])) { ?>
                    <div class="d-flex justify-content-between mt-2 mb-3">
                        <div class="fw-bold">Coupon(<?php echo $checkout_coupon_details['coupon_code'] ?>)</div>
                        <div class="">-</div>
                        <div class="fw-bold" style="color: #900;font-family: 'LibreBaskerville-Bold';">&#8377;<?php echo array_sum($store_checkout_price)*($checkout_coupon_details['percent']/100); ?></div>
                    </div>
                    <hr>
                <?php }
                ?>
                <div class="d-flex justify-content-between mb-3">
                    <div style="visibility: hidden;">
                        Net Amount
                    </div>
                    <div style="font-family: 'LibreBaskerville-Bold';">
                        <?php echo array_sum($store_checkout_quantity); ?>
                    </div>
                    <div class="fw-bold" style="color: green;font-family: 'LibreBaskerville-Bold';">
                        <?php
                        if (isset($_SESSION['coupon_details'])) {
                            $checkout_net_total = array_sum($store_checkout_price)*(1.1 - ($checkout_coupon_details['percent']/100));
                        } else {
                            $checkout_net_total = array_sum($store_checkout_price)*1.1;
                        }
                        
                        ?>
                        &#8377;<?php echo $checkout_net_total; ?>
                    </div>
                </div>
                <input type="hidden" id="net_total_price" value="<?php echo $checkout_net_total; ?>">
                
            </div>
            <?php
            if (!isset($_SESSION['coupon_details'])) { ?>
                <div class="row mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="ask_coupon">
                        <label class="form-check-label" for="ask_coupon">
                            Have a coupon?
                        </label>
                    </div>
                </div>
                <div id="cou_button_container">
                    <div class="d-flex justify-content-between mt-3">
                        <input type="text" name="" id="cart_coupon_field" class="form-control-sm" placeholder="Coupon Code">
                        <button type="button" class="btn btn-warning text-white fw-bold" id="apply_cart_coupon_code_button">
                            Apply Coupon code
                        </button>
                    </div>
                </div>
            <?php }
            ?>
            
            <div class="row mt-3">
                <div class="col-md-12">
                    <button type="button" id="payment_method_button" class="btn btn-outline-success fw-bold border-2" style="border-radius: 26px;">Payment method</button>
                </div>
            </div>
            <div class="row mt-4 py-2 px-3" id="list_pay_options" style="display: none;background: #8080801a;">
                <div class="form-check mt-1">
                    <input class="form-check-input checkout_pay_radio" type="radio" name="flexRadioDefault" id="cod_pay">
                    <label class="form-check-label fw-bold" for="cod_pay">
                        Cash on Delievery.
                    </label>

                    <p class="mt-2 py-2 px-3" id="cod_pay_msg" style="background: pink;display: none;">
                        Pay with cash upon Delievery.
                    </p>
                </div>
                <div class="form-check mt-3">
                    <input class="form-check-input checkout_pay_radio" type="radio" name="flexRadioDefault" id="razorpay_pay">
                    <label class="form-check-label" for="razorpay_pay">
                        <img src="front_img/png-clipart-india-payment-gateway-razorpay-startup-company-india-company-text-removebg-preview.png" alt="" style="width: 99px;"> <span class="fw-bold">Gateway (Debit card, Credit card, Net banking).</span>
                    </label>
                    <p class="mt-2 py-2 px-3" id="razorpay_pay_msg" style="background: pink;display: none;">
                        Pay with your Debit Card, Credit Card, Net Banking or Razorpay Wallet.
                    </p>
                </div>
                <div class="form-check mt-3">
                    <input class="form-check-input checkout_pay_radio" type="radio" name="flexRadioDefault" id="paypal_pay">
                    <label class="form-check-label" for="paypal_pay">
                        <img src="front_img/Paypal-logo.png" alt="" style="width: 99px;"> <span class="fw-bold">Gateway (Debit card, Credit card, Net banking).</span>
                    </label>
                    <p class="mt-2 py-2 px-3" id="paypal_pay_msg" style="background: pink;display: none;">
                        Pay with your Debit Card, Credit Card, Net Banking or Paypal Wallet..
                    </p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="form-check">
                    <input class="form-check-input terms_and_conditions" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        I abide by and agree to te Terms & Conditions as stated on the website.
                    </label>
                </div>
            </div>
            <div class="row mt-4">
                <button type="button" class="btn btn-success" id="make_payment_button" disabled>
                    Make Payment
                </button>
            </div>
        </div>

    </div>
</div>

<?php
include "front_footer.php";
?>