<?php
include "front_header.php";

$country_sql = "SELECT * FROM `countries`";
$country_join = mysqli_query($connect,$country_sql);
?>

<div id="main_hero" class="container" style="margin-bottom: 15%;margin-top: 13%;">

    <div class="cust_sign_login border py-4 px-5">
        <div>
            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills_signup" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><strong>Sign Up</strong></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills_profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><strong>Login</strong></button>
                </li>
            </ul>
        </div>
        <div class="tab-content mt-4" id="pills-tabContent">

            <div class="tab-pane fade show active" id="pills_signup" role="tabpanel" aria-labelledby="pills-home-tab">
                <form id="customer_signup_form">
                    <input type="hidden" name="actionname" value="customer_signin">
                    <div id="anchor_customer_signin"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="cust_sign_name">Name</label>
                            <input type="text" name="mycust_sign_name" id="cust_sign_name" class="form-control">
                            <div id="err_cust_sign_name"></div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="cust_sign_email">E-mail</label>
                            <input type="text" name="mycust_sign_email" id="cust_sign_email" class="form-control">
                            <div id="err_cust_sign_email"></div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="cust_sign_password">Password</label>
                            <input type="password" name="mycust_sign_password" id="cust_sign_password" class="form-control">
                            <div id="err_cust_sign_password"></div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="cust_sign_phone">Phone</label>
                            <input type="text" name="mycust_sign_phone" id="cust_sign_phone" class="form-control">
                            <div id="err_cust_sign_phone"></div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="customer_country">Country</label>
                            <select name="mycustomer_country" id="customer_country" class="form-control">
                                <option value="">Select country</option>
                                <?php
                                while ($country_data = mysqli_fetch_assoc($country_join)) { ?>
                                    <option value="<?php echo $country_data['c_id'] ?>"><?php echo $country_data['country'] ?></option>
                                <?php }
                                ?>
                            </select>
                            <div id="err_customer_country"></div>
                        </div>
                        <div class="col-md-4">
                            <label for="customer_state">State</label>
                            <select name="mycustomer_state" id="customer_state" class="form-control">
                                <option value="">Select state</option>
                            </select>
                            <div id="err_customer_state"></div>
                        </div>
                        <div class="col-md-4">
                            <label for="mycustomer_pin_code">Pin code</label>
                            <input type="text" name="mycustomer_pin_code" id="customer_pin_code" class="form-control">
                            <div id="err_customer_pin_code"></div>
                        </div>
                    </div>
                    <div id="signup_success"></div>
                    <div class="text-center mt-3">
                        <button type="button" id="cust_signup_button" class="btn btn-outline-success px-5 py-2" style="border-radius: 36px;">
                            Sign up
                        </button>
                    </div>
                </form>
            </div>


            <div class="tab-pane fade" id="pills_profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <form id="customer_login_form">
                    <input type="hidden" name="actionname" value="customer_login">
                    <div id="anchor_customer_login"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="cust_login_email">Login</label>
                            <input type="email" name="mycust_login_email" id="cust_login_email" class="form-control">
                            <div id="err_cust_login_email"></div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="cust_login_password">Password</label>
                            <input type="password" name="mycust_login_password" id="cust_login_password" class="form-control">
                            <div id="err_cust_login_password"></div>
                        </div>
                    </div>
                    <div id="success_customer_login"></div>
                    <div class="text-center mt-3">
                        <button type="button" id="cust_login_button" class="btn btn-outline-success px-5 py-2" style="border-radius: 36px;">Login</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php
include "front_footer.php";
?>