<?php
include "functions.php";

if ($_POST['actionname']=='country_name') {
    country_name($_POST['country_id']);
}

if ($_POST['actionname']=='sign_up') {
    sign_up();
}

if ($_POST['actionname']=='sign_in') {
    sign_in();
}

if ($_POST['actionname']=='forgot_password') {
    forgot_password();
}

if ($_POST['actionname']=='reset_password') {
    reset_password();
}

if ($_POST['actionname']=='category_checkbox') {
    category_checkbox();
}

if ($_POST['actionname']=='categories_form') {
    categories_form();
}

if ($_POST['actionname']=='view_category') {
    view_category();
}

if ($_POST['actionname']=='update_category') {
    update_category();
}

if ($_POST['actionname']=='update_product') {
    update_product($_POST['id']);
}

if ($_POST['actionname']=='products_form') {
    products_form();
}

if ($_POST['actionname']=='delete_product') {
    delete_product($_POST['id']);
}

if ($_POST['actionname']=='updateproducts_form') {
    updateproducts_form();
}

if ($_POST['actionname']=='blogs_form') {
    blogs_form();
}

if ($_POST['actionname']=='delete_blog') {
    delete_blog($_POST['id']);
}

if ($_POST['actionname']=='update_blog') {
    update_blog($_POST['id']);
}

if ($_POST['actionname']=='updateblogs_form') {
    updateblogs_form();
}

if ($_POST['actionname']=='coupons_form') {
    coupons_form();
}

if ($_POST['actionname']=='update_coupon') {
    update_coupon($_POST['id']);
}

if ($_POST['actionname']=='updatecoupons_form') {
    updatecoupons_form($_POST['myhidden_id']);
}

if ($_POST['actionname']=='delete_coupon') {
    delete_coupon($_POST['id']);
}

if ($_POST['actionname']=='customer_details') {
    customer_details($_POST['id']);
}

if ($_POST['actionname']=='fetch_monthly_orders') {
    fetch_monthly_orders();
}

if ($_POST['actionname']=='fetch_monthly_products') {
    fetch_monthly_products();
}

?>