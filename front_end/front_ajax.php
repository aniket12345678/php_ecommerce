<?php

include "front_functions.php";

if ($_POST['actionname']=='add_to_cart') {
    add_to_cart();
}

if ($_POST['actionname']=='checkout') {
    checkout();
}

if ($_POST['actionname']=='cart_quantity') {
    cart_quantity();
}

if ($_POST['actionname']=='product_inquiry') {
    product_inquiry();
}

if ($_POST['actionname']=='remove_cart_product') {
    remove_cart_product($_POST['id']);
}

if ($_POST['actionname']=='coupon_code') {
    coupon_code($_POST['cou']);
}

if ($_POST['actionname']=='user_country') {
    user_country($_POST['c_id']);
}

if ($_POST['actionname']=='customer_signin') {
    customer_signin();
}

if ($_POST['actionname']=='customer_login') {
    customer_login();
}

?>