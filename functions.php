<?php

function country_name($c_id)
{
    include "connection.php";

    $sql = "SELECT * FROM `states` WHERE `c_id`='$c_id'";
    $join = mysqli_query($connect,$sql);

    echo "<option value='Select_state'>Select state</option>";
    while ($state_list = mysqli_fetch_assoc($join)) {
        echo "<option value=".$state_list['s_id'].">".ucfirst(strtolower($state_list['state']))."</option>";
    }
}

function sign_up()
{
    include "connection.php";

    $myUsername = $_POST['myUsername'];
    $myPhonenumber = $_POST['myPhonenumber'];
    $myCountry = $_POST['myCountry'];
    $myState = $_POST['myState'];
    $myEmail = $_POST['myEmail'];
    $myPassword = md5($_POST['myPassword']);

    $check = "SELECT * FROM `user_details` WHERE `email`='$myEmail'";
    $check_join = mysqli_query($connect,$check);
    $rows = mysqli_num_rows($check_join);

    if ($rows>0) {
        echo 2;
    }
    else {
        $sql = "INSERT INTO `user_details`(`name`, `email`, `pass`, `country`, `state`, `phone_number`) VALUES ('$myUsername','$myEmail','$myPassword','$myCountry','$myState','$myPhonenumber')";
        $join = mysqli_query($connect,$sql);
    
        if ($join) {
            echo 1;
        }
        else {
            echo 0;
        }
    }
}

function sign_in()
{
    session_start();

    include "connection.php";

    $myEmail = $_POST['myEmail'];
    $myPassword = md5($_POST['myPassword']);

    $check = "SELECT * FROM `admin_login` WHERE `email`='$myEmail' AND `pass`='$myPassword'";
    $check_join = mysqli_query($connect,$check);
    $rows = mysqli_num_rows($check_join);

    $data = mysqli_fetch_assoc($check_join);
    
    if ($rows==1) {
        echo 1;
        $_SESSION['id'] = $data['id'];
    }
    else {
        echo 0;
    }
}

function forgot_password()
{
    include "connection.php";

    $myEmail = $_POST['myforgotEmail'];

    $sql = "SELECT * FROM `admin_login` WHERE `email`='$myEmail'";
    $join = mysqli_query($connect,$sql);
    $rows = mysqli_num_rows($join);
    $data = mysqli_fetch_assoc($join);
    $id = $data['id'];

    $fetch_admin_details_sql = "SELECT * FROM `admin_details` WHERE `m_id`='$id'";
    $fetch_admin_details_join = mysqli_query($connect,$fetch_admin_details_sql);
    $fetch_admin_details_data = mysqli_fetch_assoc($fetch_admin_details_join);
    $user_name = $fetch_admin_details_data['name'];

    $link = "http://".$_SERVER['HTTP_HOST'];
    $key = rand();

    if ($rows>0) {

        echo 1;

        $to = $myEmail;
        $subject = 'Forgot Password';
        $from = 'info@Productly.com';
            
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from."\r\n";

        $message = '<!doctype html>
            <html lang="en-US">
            
            <head>
                <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                <title>Reset Password Email Template</title>
                <meta name="description" content="Reset Password Email Template.">
                <style type="text/css">
                    a:hover {text-decoration: underline !important;}
                </style>
            </head>
            
            <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
                <!--100% body table-->
                <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
                    style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
                    <tr>
                        <td>
                            <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                                align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="height:80px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                            style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                            <tr>
                                                <td style="height:40px;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0 35px;">
                                                    <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">Hi '. $user_name .'!</h1>
                                                    <span
                                                        style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                        Thank you for Sign up and activate your account by clicking the below button
                                                    </p>
                                                    <a href="'.$link.'/resetpassword.php?key='.$key.'" style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">
                                                        Activate your account
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="height:40px;">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                <tr>
                                    <td style="height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:80px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--/100% body table-->
            </body>
            
            </html>';

            // if(mail($to, $subject, $message, $headers)){
            //     echo 1;
            // } else{
            //     echo 'Unable to send email. Please try again.';
            // }

    }
    else {
        echo 2;
    }

}

function reset_password()
{
    include "connection.php";
    $new_password = md5($_POST['mynewPassword']);

    $sql = "UPDATE `admin_login` SET `pass`='$new_password'";
    $join = mysqli_query($connect,$sql);
    if ($join) {
        echo 1;
    }
    else {
        echo 0;
    }
}

function category_checkbox()
{
    include "connection.php";
    
    $id = $_POST['id'];
    $status = $_POST['status_val'];

    $sql = "UPDATE `categories` SET `status`='$status' WHERE `cat_id`='$id'";
    $join = mysqli_query($connect,$sql);

    if ($join) {
        echo 1;
    }
    else {
        echo 0;
    }
}

function categories_form()
{
    include "connection.php";

    $img_name = time().$_FILES['mycatimg']['name'];
    $imgtmp_name = $_FILES['mycatimg']['tmp_name'];
    $folder = "category_images/".$img_name;

    move_uploaded_file($imgtmp_name,$folder);

    $myCategory = $_POST['myCategory'];
    $myTags = $_POST['myTags'];
    $mysubCategory = $_POST['mysubCategory'];
    $mycategory_dropdown = $_POST['mycategory_dropdown'];


    $mycat_or_subcat = $_POST['mycat_or_subcat'];

    if ($mycat_or_subcat==1) {
        
        $sql = "INSERT INTO `categories`(`cat_img`, `categories`, `parent_id`, `tags`) VALUES ('$img_name','$myCategory','0','$myTags')";
        $join = mysqli_query($connect,$sql);
        
        if ($join) {
            echo 1;
        }
        else {
            echo 0;
        }

    }
    else {
        
        $sql = "INSERT INTO `categories`(`cat_img`, `categories`, `parent_id`, `tags`) VALUES ('$img_name','$mysubCategory','$mycategory_dropdown','$myTags')";
        $join = mysqli_query($connect,$sql);
        
        if ($join) {
            echo 1;
        }
        else {
            echo 0;
        }

    }
    
}

function view_category()
{
    include "connection.php";

    $id = $_POST['id'];

    $sql = "SELECT * FROM `categories` WHERE `cat_id`='$id'";
    $join = mysqli_query($connect,$sql);

    $Category_details = mysqli_fetch_assoc($join);
    
    $parent_id = $Category_details['parent_id'];

    if ($parent_id!=0) {
        $parent_idsql = "SELECT * FROM `categories` WHERE `cat_id`='$parent_id'";
        $parent_idjoin = mysqli_query($connect,$parent_idsql);
        $parent_idassoc = mysqli_fetch_assoc($parent_idjoin);
    }
    else {
        $parent_idassoc = "";
    }
    $new_array = array($Category_details,$parent_idassoc);

    print_r(json_encode($new_array));
}

function update_category()
{
    include "connection.php";

    $id = $_POST['id'];

    $sql = "SELECT * FROM `categories` WHERE `cat_id`='$id'";
    $join = mysqli_query($connect,$sql);

    $Category_details = mysqli_fetch_assoc($join);

    print_r(json_encode($Category_details));
}

function products_form()
{
    include "connection.php";

    $img_name = time().$_FILES['myproductimg']['name'];
    $imgtmp_name = $_FILES['myproductimg']['tmp_name'];
    $folder = "product_images/".$img_name;

    move_uploaded_file($imgtmp_name,$folder);

    $myproduct_category_drop = $_POST['myproduct_category_drop'];
    $myproduct_name = $_POST['myproduct_name'];
    $myproduct_price = $_POST['myproduct_price'];

    $code = "PRO-000".substr(md5(rand(10,99)),0,5);

    $sql = "INSERT INTO `products`(`p_img`, `product`, `price`, `cat_id`,`product_code`) VALUES ('$img_name','$myproduct_name','$myproduct_price','$myproduct_category_drop','$code')";
    $join = mysqli_query($connect,$sql);

    if ($join) {
        echo 1;
    }
    else {
        echo 0;
    }
    
}

function delete_product($id)
{
    include "connection.php";

    $sql = "DELETE FROM `products` WHERE `p_id`='$id'";
    $join = mysqli_query($connect,$sql);
    
    if ($join) {
        echo 1;
    }
    else {
        echo 0;
    }
    
}

function update_product($id)
{
    include "connection.php";

    $sql = "SELECT * FROM `products` WHERE `p_id`='$id'";
    $join = mysqli_query($connect,$sql);

    $product_details = mysqli_fetch_assoc($join);

    print_r(json_encode($product_details));
}

function updateproducts_form()
{
    include "connection.php";

    $id = $_POST['myhidden_id'];
    $p_name = $_POST['updatemyproduct_name'];
    $p_price = $_POST['updatemyproduct_price'];
    $category = $_POST['updatemyproduct_category_drop'];
    $old_img = $_POST['myold_pimg'];

    if (empty($_FILES['updatemyproductimg']['name'])) {
        $final_img = $old_img;
    }
    else {
        $img_name = time().$_FILES['updatemyproductimg']['name'];
        $imgtmp_name = $_FILES['updatemyproductimg']['tmp_name'];
        $folder = "product_images/".$img_name;

        move_uploaded_file($imgtmp_name,$folder);

        $final_img = $img_name;
    }
    
    $sql = "UPDATE `products` SET `p_img`='$final_img',`product`='$p_name',`price`='$p_price',`cat_id`='$category' WHERE `p_id`='$id'";
    $join = mysqli_query($connect,$sql);

    if ($join) {
        echo 1;
    }
    else {
        echo 0;
    }
}

function blogs_form()
{
    include "connection.php";

    $title = $_POST['myblog_title'];
    $description = $_POST['myblog_description'];

    $img_name = time().$_FILES['myblogimg']['name'];
    $imgtmp_name = $_FILES['myblogimg']['tmp_name'];
    $folder = "blog_images/".$img_name;

    move_uploaded_file($imgtmp_name,$folder);

    $sql = "INSERT INTO `blog`(`img`, `title`, `content`) VALUES ('$img_name','$title','$description')";
    $join = mysqli_query($connect,$sql);

    if ($join) {
        echo 1;
    }
    else {
        echo 0;
    }

}

function delete_blog($id)
{
    include "connection.php";

    $sql = "DELETE FROM `blog` WHERE `b_id`='$id'";
    $join = mysqli_query($connect,$sql);
    
    if ($join) {
        echo 1;
    }
    else {
        echo 0;
    }
}

function update_blog($id)
{
    include "connection.php";

    $sql = "SELECT * FROM `blog` WHERE `b_id`='$id'";
    $join = mysqli_query($connect,$sql);

    $blog_details = mysqli_fetch_assoc($join);

    print_r(json_encode($blog_details));
}

function updateblogs_form()
{
    include "connection.php";

    $id = $_POST['myhidden_id'];
    $p_name = $_POST['updatemyblog_title'];
    $p_description = $_POST['myblog_description'];
    $old_img = $_POST['myold_pimg'];

    if (empty($_FILES['updatemyblogimg']['name'])) {
        $final_img = $old_img;
    }
    else {
        $img_name = time().$_FILES['updatemyblogimg']['name'];
        $imgtmp_name = $_FILES['updatemyblogimg']['tmp_name'];
        $folder = "blog_images/".$img_name;

        move_uploaded_file($imgtmp_name,$folder);

        $final_img = $img_name;
    }
    
    $sql = "UPDATE `blog` SET `img`='$final_img',`title`='$p_name',`content`='$p_description' WHERE `b_id`='$id'";
    $join = mysqli_query($connect,$sql);

    if ($join) {
        echo 1;
    }
    else {
        echo 0;
    }
}

function coupons_form()
{
    include "connection.php";

    $mycoupon_code = $_POST['mycoupon_code'];
    $mypercent = $_POST['mypercent'];

    $img_name = time().$_FILES['myproductimg']['name'];
    $imgtmp_name = $_FILES['myproductimg']['tmp_name'];
    $folder = "coupon_img/".$img_name;

    move_uploaded_file($imgtmp_name,$folder);

    $sql = "INSERT INTO `coupons`(`c_img`, `coupon_code`, `percent`) VALUES ('$img_name','$mycoupon_code','$mypercent')";
    $join = mysqli_query($connect,$sql);

    if ($join) {
        echo 1;
    }
    else {
        echo 0;
    }
}

function update_coupon($id)
{
    include "connection.php";
    print_r($_POST);
    echo "<br>";
    
    $fetch_coupon_details_sql = "SELECT * FROM `coupons` WHERE `id`='$id'";
    $fetch_coupon_details_join = mysqli_query($connect, $fetch_coupon_details_sql);
    $fetch_coupon_details_data = mysqli_fetch_assoc($fetch_coupon_details_join);
    
    // echo "<pre>";
    // print_r($fetch_coupon_details_data);
    // echo "</pre>";
    print_r(json_encode($fetch_coupon_details_data));
}

function updatecoupons_form($hidden_id)
{
    echo $hidden_id;

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $update_cou_sql = "UPDATE `coupons` SET `c_img`='',`coupon_code`='',`percent`='' WHERE `id`='$hidden_id'";
    echo $update_cou_sql;

}

function delete_coupon($id)
{
    include "connection.php";

    $sql = "DELETE FROM `coupons` WHERE `id`='$id'";
    $join = mysqli_query($connect,$sql);
    
    if ($join) {
        echo 1;
    }
    else {
        echo 0;
    }
}

function customer_details($m_id)
{
    include "connection.php";

    $users_details_sql = "SELECT * FROM `user_details` WHERE `m_id`='$m_id'";
    $users_details_join = mysqli_query($connect, $users_details_sql);
    $users_details_data = mysqli_fetch_assoc($users_details_join);
    
    $user_country = $users_details_data['country'];
    $user_state = $users_details_data['state'];
    
    $fetch_user_country_sql = "SELECT * FROM `countries` WHERE `c_id`='$user_country'";
    $fetch_user_country_join = mysqli_query($connect, $fetch_user_country_sql);
    $fetch_user_country_data = mysqli_fetch_assoc($fetch_user_country_join);


    $fetch_user_state_sql = "SELECT * FROM `states` WHERE `s_id`='$user_state'";
    $fetch_user_state_join = mysqli_query($connect, $fetch_user_state_sql);
    $fetch_user_state_data = mysqli_fetch_assoc($fetch_user_state_join);


    $users_sql = "SELECT * FROM `user_login` WHERE `id`='$m_id'";
    $users_join = mysqli_query($connect, $users_sql);
    $users_data = mysqli_fetch_assoc($users_join);

    $final_array = array($users_details_data,$users_data,$fetch_user_country_data['country'],$fetch_user_state_data['state']);
    print_r(json_encode($final_array));
}

function fetch_monthly_orders()
{
    include "connection.php";

    $monthly_revenue = array();

    for ($i=1; $i<=12; $i++) { 

        $sql = "SELECT * FROM `orders` WHERE month(`created_time`)='$i'";
        $join = mysqli_query($connect, $sql);
        $rows = mysqli_num_rows($join);
        $store = array();
        $net_total = 0;
        
        if ($rows>0) {
            while ($data = mysqli_fetch_assoc($join)) {
                $net_total = $data['net_total'];
                array_push($store,$net_total);
            }
        }
        else {
            array_push($store,0);
        }
        
        $net_sum = array_sum($store);
        array_push($monthly_revenue,$net_sum);
    }
    print_r(json_encode($monthly_revenue));
}

function fetch_monthly_products()
{
    include "connection.php";

    $monthly_revenue = array();

    for ($i=1; $i<=12; $i++) { 

        $sql = "SELECT * FROM `order_products` WHERE month(`create_time`)='$i'";
        $join = mysqli_query($connect, $sql);
        $rows = mysqli_num_rows($join);
        
        array_push($monthly_revenue,$rows);
    }
    print_r(json_encode($monthly_revenue));
}



?>