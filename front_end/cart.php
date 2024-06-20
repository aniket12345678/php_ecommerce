<?php
include "front_header.php";

$fetch_gst_sql = "SELECT * FROM `gst_components`";
$fetch_gst_join = mysqli_query($connect,$fetch_gst_sql);

while ($gst_data = mysqli_fetch_assoc($fetch_gst_join)) { ?>
    <input type="hidden" name="" id="compo_<?php echo $gst_data['title']; ?>" value="<?php echo $gst_data['percent']; ?>">
<?php }
?>


<div id="main_hero" class="container content_heading" style="margin-bottom: 15%;">
    <h1 class="text-center fw-bold mb-5" style="margin-top: 13%;">Cart</h1>

    <div id="anchor_cart_test"></div>

    <?php

        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            $cart_message = "Add some products from <a href='shop.php' class='text-decoration-none'>Shop</a> to fill the cart";
            echo "<div class='fw-bold fs-3'>".$cart_message."</div>";
        }
        else { 
            $cart_content = $_SESSION['cart'];
            ?>
            <div style="overflow-x: auto;">
                <table class="table table-bordered">
                    <thead class="text-white" style="background: #173a56;">
                        <tr>
                            <th scope="col">Sr.no</th>
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form id="cart_table_form">
                            <input type="hidden" name="actionname" value="cart_quantity">
                            <?php
                            $i = 0;
                            foreach ($cart_content as $key => $value) { 
                                $i++;
                                
                                if (isset($value['p_quantity'])) {
                                    $quantity = $value['p_quantity'];
                                }
                                else {
                                    $quantity = 1;
                                }
                                $store_price[] = $value['p_price']*$quantity;
                                ?>
                                <tr id="<?php echo $i; ?>">
        
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td>
                                        <img src="../product_images/<?php echo $value['p_img']; ?>" alt="" style="width: 115px;height: 100px;">
                                    </td>
                                    <td><?php echo $value['p_name']; ?></td>
                                    <td>
                                       
                                        <input type="number" name="input_qunatity[]" id="" value="<?php echo $quantity; ?>" min="1" class="form-control product_quantity" >
                                        <input type="hidden" id="hidden_price_<?php echo $i; ?>" value="<?php echo $value['p_price']; ?>">
                                        <input type="hidden" class="sum_amount" id="hidden_pro_total_amount_<?php echo $i; ?>" value="<?php echo $value['p_price']; ?>">
                                    </td>
                                    <td id="total_amount_<?php echo $i; ?>" class="fw-bold">
                                        <?php echo "&#8377;".($quantity*$value['p_price']); ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn remove_cart" value="<?php echo $key; ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
        
                            <?php }
                            ?>
                        </form>
                        <tfoot style="background: #173a56;" class="text-white">
                            <tr>
                                <td colspan="4" align="right"><strong class="fs-5">Gross Amount</strong></td>
                                <td colspan="2" id="net_amount_container" class="fw-bold fs-5">
                                    &#8377;<?php echo array_sum($store_price); ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right">
                                    <strong class="fs-5">IGST</strong>
                                </td>
                                <td colspan="2" id="car_igst" class="fw-bold fs-5">
                                    &#8377;<?php echo array_sum($store_price)*0.05; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right">
                                    <strong class="fs-5">CGST</strong>
                                </td>
                                <td colspan="2" id="car_cgst" class="fw-bold fs-5">
                                    &#8377;<?php echo array_sum($store_price)*0.025; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right">
                                    <strong class="fs-5">SGST</strong>
                                </td>
                                <td colspan="2" id="car_sgst" class="fw-bold fs-5">
                                    &#8377;<?php echo array_sum($store_price)*0.025; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right">
                                    <strong class="fs-5">Net Amount</strong>
                                </td>
                                <td colspan="2" id="net_total_amount_container" class="fw-bold fs-5">
                                    &#8377;<?php echo array_sum($store_price)*1.1; ?>
                                </td>
                            </tr>
                        </tfoot>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <button type="button" class="btn fw-bold btn-outline-danger" id="clear_cart_button">
                        Clear cart
                    </button>
                </div>
                <button type="button" class="btn btn-success" id="proceed_to_checkout_button">
                    Proceed to checkout
                </button>
            </div>
            <div class="float-lg-end mt-4 fw-bold">
            </div>
        <?php }
    ?>

</div>

<?php
include "front_footer.php";
?>