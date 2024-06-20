$(document).ready(function () {

    $("#cart_loader").hide();
    
    $("#add_to_cart").click(function () { 
        var form = $("#add_to_cart_form")[0];
        $.ajax({
            type: "POST",
            url: "front_ajax.php",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {

                if (response!="a") {

                    $("#cart_loader").show();
                    $("#products_count").hide();

                    setTimeout(function () {
                        $("#products_count").show();
                        $("#cart_loader").hide();
                        $("#products_count").html(response);
                    }, 2000);

                }
                else {
                    alert("you've already added this product");
                }
            }
        });
    });

    $(".mobile-nav-toggle").click(function () { 
        $("#mobile_menu_dropdown").toggle();
    });

    $(".product_quantity").on("change", function () {
        
        var gross_net_total = 0;

        let net_total_amount_container = 0;

        let target = $(this)
        let fetch_id = target.closest("tr").attr("id");
        let p_quantity = target.val();
        let base_price = $("#hidden_price_"+fetch_id).val();
        let amount = base_price*p_quantity;
        $("#total_amount_"+fetch_id).html(amount);
        $("#hidden_pro_total_amount_"+fetch_id).val(amount);

        let igst = $("#compo_igst").val();
        let cgst = $("#compo_cgst").val();
        let sgst = $("#compo_sgst").val();

        $(".sum_amount").each(function () {
            let a = $(this).val();
            gross_net_total += Number(a);
        });

        let coupon_percent = $("#coupon_value_percent").val();

        
        let cart_igst = gross_net_total*(igst/100);
        let cart_cgst = gross_net_total*(cgst/100);
        let cart_sgst = gross_net_total*(sgst/100);
        
        if (coupon_percent==undefined) {
            net_total_amount_container = gross_net_total + cart_igst + cart_cgst + cart_sgst;
        }
        else {
            net_total_amount_container = ((gross_net_total + cart_igst + cart_cgst + cart_sgst)-(gross_net_total*(coupon_percent/100)));
        }



        $("#net_amount_container").html("&#8377;"+gross_net_total);
        $("#car_igst").html("&#8377;"+cart_igst);
        $("#car_cgst").html("&#8377;"+cart_cgst);
        $("#car_sgst").html("&#8377;"+cart_sgst);
        $("#net_total_amount_container").html("&#8377;"+net_total_amount_container);
    });

    $(".remove_cart").click(function () { 
        let key = $(this).val();
        if (!confirm("Do you want to remove this product?")) {
            return false;
        }
        else {
            $.ajax({
                type: "POST",
                url: "front_ajax.php",
                data: {
                    id:key,
                    'actionname':'remove_cart_product'
                },
                success: function (response) {
                    if (response==1) {
                        setTimeout(function () {
                            window.location = "cart.php";
                        }, 2000);
                    }
                }
            });
        }
    });

    $(".coupon_code_copy").click(function () { 
        let target = $(this);
        let txt = target.closest(".mt-3").find(".coupon_code").html();
        let coupon_code = txt.trim();
        navigator.clipboard.writeText(coupon_code);

        alert("Copied to clipboard:- "+coupon_code);
    });

    $("#apply_cart_coupon_code_button").click(function () { 
        let coupon_field_value = $("#cart_coupon_field").val();
        if (coupon_field_value=="") {
            alert("Enter coupon code to apply");
        }
        else {
            $.ajax({
                type: "POST",
                url: "front_ajax.php",
                data: {
                    cou:coupon_field_value,
                    'actionname':'coupon_code'
                },
                success: function (response) {
                    if (response==1) {
                        swal({
                            title: "Coupon code applied!",
                            text: "Enjoy your shopping!",
                            icon: "success",
                            button: true
                        });
                        setTimeout(function () {
                            location.reload(true); 
                        },2000)
                    }
                }
            });
        }

    });

    $("#clear_cart_button").click(function () { 
        if (!confirm("Do you want to remove the cart items?")) {
            return false;   
        }
        else {
            window.location = "clear_cart.php";
        }
    });

    $("#inquiry_button").click(function () { 
        
        var form = $("#inquiry_form")[0];

        let inquiry_name = $("#inquiry_name").val();
        let inquiry_number = $("#inquiry_number").val();
        let inquiry_email = $("#inquiry_email").val();
        let inquiry_message = $("#inquiry_message").val();

        let flag = 0;

        if (inquiry_name=="") {
            $("#err_inquiry_name").html("*Enter Name");
            $("#err_inquiry_name").addClass("text-danger");
            flag=1;
        }

        if (inquiry_name!="") {
            $("#err_inquiry_name").hide();
        }


        if (inquiry_number=="") {
            $("#err_inquiry_contact").html("*Enter Contact number");
            $("#err_inquiry_contact").addClass("text-danger");
            flag=1;
        }

        if (inquiry_number!="") {
            $("#err_inquiry_contact").hide();
        }

        if (inquiry_email=="") {
            $("#err_inquiry_email").html("*Enter E-mail");
            $("#err_inquiry_email").addClass("text-danger");
            flag=1;
        }

        if (inquiry_email!="") {
            $("#err_inquiry_email").hide();
        }

        if (inquiry_message=="") {
            $("#err_inquiry_message").html("*Enter Inquiry message");
            $("#err_inquiry_message").addClass("text-danger");
            flag=1;
        }

        if (inquiry_message!="") {
            $("#err_inquiry_message").hide();
        }

        if (flag==1) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: "front_ajax.php",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {

                if (response==1) {
                    $("#inquiry_success").removeClass("text-danger");
                    $("#inquiry_success").html("Your Inquiry was sent successfully");
                    $("#inquiry_success").addClass("text-success");
                    $("#inquiry_success").addClass("fw-bold");
                    setTimeout(function () {
                        location.reload(true);
                    }, 2000);
                }

                if (response==0) {
                    $("#inquiry_success").removeClass("text-success");
                    $("#inquiry_success").html("Some technical issues have arise");
                    $("#inquiry_success").addClass("text-danger");
                    $("#inquiry_success").addClass("fw-bold");
                }
            }
        });
        
    });

    $("#proceed_to_checkout_button").click(function () { 

        let form = $("#cart_table_form")[0];

        $.ajax({
            type: "POST",
            url: "front_ajax.php",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {
                if (response==1) {
                    window.location = "checkout.php";
                }
            }
        });
    });

    $("#cou_button_container").hide();

    $("#ask_coupon").click(function () { 
        if ($(this).is(':checked')) {
            $("#cou_button_container").show();
        }
        else {
            $("#cou_button_container").hide();
            
        }
    });

    $("#payment_method_button").click(function () { 
        $("#list_pay_options").slideToggle();
    });

    $(".checkout_pay_radio").click(function () { 
        let attribute = $(this).attr("id");
        if (attribute=="cod_pay") {
            $("#cod_pay_msg").show();
            $("#razorpay_pay_msg").hide();
            $("#paypal_pay_msg").hide();
        }
        else if (attribute=="razorpay_pay") {
            $("#razorpay_pay_msg").show();
            $("#paypal_pay_msg").hide();
            $("#cod_pay_msg").hide();

        }
        else {
            $("#paypal_pay_msg").show();
            $("#razorpay_pay_msg").hide();
            $("#cod_pay_msg").hide();
        }

        if ($('.terms_and_conditions').is(':checked')) {
            $("#make_payment_button").removeAttr("disabled");
        }
        else {
            $("#make_payment_button").attr("disabled", true);
        }
    });

    $(".terms_and_conditions").click(function () { 
        if ($(this).prop('checked')==true){ 
            if ($('.checkout_pay_radio').is(':checked')) {
                $("#make_payment_button").removeAttr("disabled");
            }
        }
        else {
            $("#make_payment_button").attr("disabled", true);
        }
    });

    $("#make_payment_button").click(function () { 
        let checkout_price = $("#net_total_price").val();
        
        $.ajax({
            type: "POST",
            url: "front_ajax.php",
            data: {
                'actionname':'checkout',
                'checkout_net':checkout_price
            },
            success: function (response) {
                if (response==1) {
                    swal({
                        title: "Order Placed!",
                        text: "Thank you, have a nice day!",
                        icon: "success",
                        button: true
                    });
                    setTimeout(function () {
                        window.location = "index.php";
                    }, 2000);
                }
            }
        });
        
    });

    $("#customer_country").on("change", function () {
        let c_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "front_ajax.php",
            data: {
                'actionname':'user_country',
                c_id:c_id
            },
            success: function (response) {
                $("#customer_state").html(response);
            }
        });
    });

    $("#cust_signup_button").click(function () { 

        let form = $("#customer_signup_form")[0];

        let cust_sign_name =  $("#cust_sign_name").val();
        let cust_sign_email =  $("#cust_sign_email").val();
        let cust_sign_phone =  $("#cust_sign_phone").val();
        let customer_country =  $("#customer_country").val();
        let customer_state =  $("#customer_state").val();
        let customer_pin_code =  $("#customer_pin_code").val();
        
        let flag = 0;

        if (customer_pin_code=="") {
            $("#err_customer_pin_code").show();
            $("#err_customer_pin_code").html("*Enter Pin code");
            $("#err_customer_pin_code").addClass("text-danger");
            $("#err_customer_pin_code").addClass("fw-bold");
            flag=1;
        }

        if (customer_pin_code!="") {
            $("#err_customer_pin_code").hide();
        }

        if (customer_state=="") {
            $("#err_customer_state").show();
            $("#err_customer_state").html("*Enter state");
            $("#err_customer_state").addClass("text-danger");
            $("#err_customer_state").addClass("fw-bold");
            flag=1;
        }

        if (customer_state!="") {
            $("#err_customer_state").hide();
        }

        if (customer_country=="") {
            $("#err_customer_country").show();
            $("#err_customer_country").html("*Enter country");
            $("#err_customer_country").addClass("text-danger");
            $("#err_customer_country").addClass("fw-bold");
            flag=1;
        }

        if (customer_country!="") {
            $("#err_customer_country").hide();
        }

        if (cust_sign_name=="") {
            $("#err_cust_sign_name").show();
            $("#err_cust_sign_name").html("*Enter name");
            $("#err_cust_sign_name").addClass("text-danger");
            $("#err_cust_sign_name").addClass("fw-bold");
            flag=1;
        }

        if (cust_sign_name!="") {
            $("#err_cust_sign_name").hide();
        }

        if (cust_sign_email=="") {
            $("#err_cust_sign_email").show();
            $("#err_cust_sign_email").html("*Enter email");
            $("#err_cust_sign_email").addClass("text-danger");
            $("#err_cust_sign_email").addClass("fw-bold");
            flag=1;
        }

        if (cust_sign_email!="") {
            $("#err_cust_sign_email").hide();
        }

        if (cust_sign_phone=="") {
            $("#err_cust_sign_phone").show();
            $("#err_cust_sign_phone").html("*Enter phone");
            $("#err_cust_sign_phone").addClass("text-danger");
            $("#err_cust_sign_phone").addClass("fw-bold");
            flag=1;
        }

        if (cust_sign_phone!="") {
            $("#err_cust_sign_phone").hide();
        }

        if (flag==1) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: "front_ajax.php",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {

                if (response==1) {
                    swal({
                        title: "Successfully signed up!",
                        text: "Have a nice day!",
                        icon: "success",
                        button: true
                    });
                    setTimeout(function () {
                        location.reload(true);
                    }, 2000);
                }

                if (response==2) {
                    swal({
                        title: "User already exists",
                        text: "",
                        icon: "warning",
                        button: true
                    });
                }

            }
        });

    });

    $("#cust_login_button").click(function () { 

        let form = $("#customer_login_form")[0];
        
        let cust_login_email =  $("#cust_login_email").val();
        let cust_login_password =  $("#cust_login_password").val();
        
        let flag = 0;

        if (cust_login_email=="") {
            $("#err_cust_login_email").show();
            $("#err_cust_login_email").html("*Enter E-mail");
            $("#err_cust_login_email").addClass("text-danger");
            $("#err_cust_login_email").addClass("fw-bold");
            flag=1;
        }

        if (cust_login_email!="") {
            $("#err_cust_login_email").hide();
        }

        if (cust_login_password=="") {
            $("#err_cust_login_password").show();
            $("#err_cust_login_password").html("*Enter Password");
            $("#err_cust_login_password").addClass("text-danger");
            $("#err_cust_login_password").addClass("fw-bold");
            flag=1;
        }

        if (cust_login_password!="") {
            $("#err_cust_login_password").hide();
        }

        if (flag==1) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: "front_ajax.php",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {
                if (response==2) {
                    swal({
                        title: "E-mail or password is incorrect",
                        text: "Be careful!",
                        icon: "warning",
                        button: true
                    });
                }

                if (response==1) {
                    swal({
                        title: "Successfully logged in!",
                        text: "Have a nice day",
                        icon: "success",
                        button: true
                    });
                    setTimeout(function () {
                        let base = window.location.origin;
                        window.location = base+"/admin_panel/customer_portal/index.php";
                    }, 2000);
                }

                if (response==3) {
                    swal({
                        title: "Successfully logged in!",
                        text: "Have a nice day",
                        icon: "success",
                        button: true
                    });
                    
                    setTimeout(function () {
                        let base = window.location.origin;
                        window.location = base+"/admin_panel/front_end/checkout.php";
                    }, 2000);
                }
            }
        });

    });

});