<?php

function add_to_cart()
{
    session_start();
    $check_product = array_column($_SESSION['cart'],'p_name');

    $product_name = $_POST['product_name'];
    if (in_array($product_name,$check_product)) {
        echo "a";
    }
    else {
        $product_img = $_POST['product_img'];
        $product_price = $_POST['product_price'];
        $product_id = $_POST['product_id'];
    
        $product_details = array('p_id'=>$product_id,'p_name'=>$product_name,'p_img'=>$product_img,'p_price'=>$product_price);
    
        $_SESSION['cart'][] = $product_details;
    
        echo count($_SESSION['cart']);
    }
    
}

function remove_cart_product($id)
{
    session_start();
    unset($_SESSION['cart'][$id]);
    echo 1;
}

function coupon_code($cou)
{
    session_start();
    include "../connection.php";

    $sql = "SELECT * FROM `coupons` WHERE `coupon_code`='$cou'";
    $join = mysqli_query($connect,$sql);
    $row = mysqli_num_rows($join);
    $data = mysqli_fetch_assoc($join);

    if ($row>0) {
        $_SESSION['coupon_details'] = $data;

        if (isset($_SESSION['coupon_details'])) {
            echo 1;
        }
        else {
            echo 0;
        }
        
    }
    else {
        echo 0;
    }

}

function product_inquiry()
{
    include "../connection.php";

    $inquiry_name = $_POST['myinquiry_name'];
    $myinquiry_number = $_POST['myinquiry_number'];
    $myinquiry_email = $_POST['myinquiry_email'];
    $myinquiry_message = $_POST['myinquiry_message'];

    $sql = "INSERT INTO `product_inquiry`(`name`, `email`, `phone`, `message`) VALUES ('$inquiry_name','$myinquiry_email','$myinquiry_number','$myinquiry_message')";
    $join = mysqli_query($connect,$sql);

    if ($join) {
        echo 1;
    }
    else {
        echo 0;
    }

}

function cart_quantity()
{
    session_start();
    
    $quantity = $_POST['input_qunatity'];

    for ($i=0; $i <count($quantity) ; $i++) { 
        $_SESSION['cart'][$i]['p_quantity'] = $quantity[$i];
    }
    echo 1;
}

function checkout()
{
    session_start();
    include "../connection.php";
    
    $id = $_SESSION['user']['id'];

    $order_cart = $_SESSION['cart'];

    if (isset($_SESSION['coupon_details'])) {
        $coupon_status = 1;
        $coupon_id = $_SESSION['coupon_details']['id'];
    }
    else {
        $coupon_status = 0;
        $coupon_id = 0;
    }
    
    $order_group_code = "PRO-GROUP-ORDER".substr(md5(rand()),0,11);

    $checkout_net_total_price = $_POST['checkout_net'];

    $insert_order_sql = "INSERT INTO `orders`(`user_id`, `order_group_code`, `is_counpon`, `coupon_id`,`net_total`) VALUES ('$id','$order_group_code','$coupon_status','$coupon_id','$checkout_net_total_price')";
    $insert_order_join = mysqli_query($connect,$insert_order_sql);

    $last_order_id = mysqli_insert_id($connect);

    for ($i=0; $i <count($order_cart); $i++) { 

        $product_name = $order_cart[$i]['p_name'];
        $product_img = $order_cart[$i]['p_img'];
        $product_price = $order_cart[$i]['p_price'];
        $product_quantity = $order_cart[$i]['p_quantity'];
        $product_id = $order_cart[$i]['p_id'];

        $fetch_product_quantity_sql = "SELECT * FROM `products` WHERE `p_id`='$product_id'";
        $fetch_product_quantity_join = mysqli_query($connect,$fetch_product_quantity_sql);
        $fetch_product_quantity_data = mysqli_fetch_assoc($fetch_product_quantity_join);
        $instock = $fetch_product_quantity_data['in_stock'];

        $netstock = $instock - $product_quantity;

        $update_quantity_sql = "UPDATE `products` SET `in_stock`='$netstock' WHERE `p_id`='$product_id'";
        $update_quantity_join = mysqli_query($connect,$update_quantity_sql);


        $order_product_sql = "INSERT INTO `order_products`(`o_id`, `product_name`, `product_img`, `product_quantity`, `product_price`) VALUES ('$last_order_id','$product_name','$product_img','$product_quantity','$product_price')";
        
        $order_product_join = mysqli_query($connect,$order_product_sql);
    }

    if ($insert_order_join) {
        session_destroy();
        echo 1;
    }
    else {
        echo 0;
    }
    
}

function user_country($id)
{
    include "../connection.php";

    $sql = "SELECT * FROM `states` WHERE `c_id`='$id'";
    $join = mysqli_query($connect,$sql);
    echo "<option value=''>Select state</option>";
    while ($data = mysqli_fetch_assoc($join)) {
        echo "<option value=".$data['s_id'].">".ucfirst(strtolower($data['state']))."</option>";
    }
}

function customer_signin()
{
    include "../connection.php";
    
    $mycust_sign_email = $_POST['mycust_sign_email'];
    $mycust_sign_password = md5($_POST['mycust_sign_password']);
    $mycust_sign_name = $_POST['mycust_sign_name'];
    $mycust_sign_phone = $_POST['mycust_sign_phone'];
    $mycustomer_country = $_POST['mycustomer_country'];
    $mycustomer_state = $_POST['mycustomer_state'];
    $mycustomer_pin_code = $_POST['mycustomer_pin_code'];

    $check_sql = "SELECT * FROM `user_login` WHERE `email`='$mycust_sign_email'";
    $check_join = mysqli_query($connect,$check_sql);
    $check_row = mysqli_num_rows($check_join);
    
    if ($check_row>0) {
        echo 2;
    }
    else {
        $sql = "INSERT INTO `user_login`(`email`, `pass`) VALUES ('$mycust_sign_email','$mycust_sign_password')";
        $join = mysqli_query($connect,$sql);
    
        $last_id = mysqli_insert_id($connect);

        $customer_code = "PRO-CUST-000".$last_id;
    
        $user_details_sql = "INSERT INTO `user_details`(`m_id`, `name`, `phone`, `country`, `state`, `pin`, `customer_code`) VALUES ('$last_id','$mycust_sign_name','$mycust_sign_phone','$mycustomer_country','$mycustomer_state','$mycustomer_pin_code','$customer_code')";
        $user_details_join = mysqli_query($connect,$user_details_sql);
    
        if ($user_details_join) {
            echo 1;
        }
        else {
            echo 0;
        }
    }
}

function customer_login()
{
    session_start();
    include "../connection.php";
    
    $mycust_login_email = $_POST['mycust_login_email'];
    $mycust_login_password = md5($_POST['mycust_login_password']);

    $sql = "SELECT * FROM `user_login` WHERE `email`='$mycust_login_email' AND `pass`='$mycust_login_password'";
    $join = mysqli_query($connect,$sql);
    $data = mysqli_fetch_assoc($join);
    $rows = mysqli_num_rows($join);

    

    if ($rows==0) {
        echo 2;
    }
    else {
        $_SESSION['user']['id'] = $data['id'];
        if (!empty($_SESSION['cart'])) {
            echo 3;
        }
        else {
            echo 1;
        }

    }
}

?>