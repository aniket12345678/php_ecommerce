<?php
include "front_header.php";
$fetch_coupons_sql = "SELECT * FROM `coupons`";
$fetch_coupons_join = mysqli_query($connect,$fetch_coupons_sql);
?>

<style>
    @media only screen and (max-width: 600px) {
        #billing_cart_container {
            margin: -11px;
        }
    }
</style>

<div id="main_hero" class="container content_heading" style="margin-bottom: 7%;">
    <h1 class="text-center fw-bold" style="margin-top: 13%;">Coupons</h1>

    <div class="row mt-5 g-5" id="billing_cart_container">
        <?php
        while ($coupons_data = mysqli_fetch_assoc($fetch_coupons_join)) { ?>
            <div class="col-md-3 text-center">
                <div>
                    <img src="../coupon_img/<?php echo $coupons_data['c_img']; ?>" alt="" style="width: 242px;height: 162px;">
                </div>
                <div class="mt-3">
                    <span class="coupon_code" style="border: 1px solid orange;padding: 3px 16px;">
                        <?php echo $coupons_data['coupon_code']; ?>
                    </span>
                    <span class="coupon_code_copy" style="background: #ffa50096;padding: 4px 10px;">
                        <i class="far fa-copy"></i>
                    </span>
                </div>
            </div>
        <?php }
        ?>
    </div>
</div>

<?php
include "front_footer.php";
?>