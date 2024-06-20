jQuery(document).ready(function ($) {

    //----------------------------------- start categories -----------------------------------//

    $("#country_select").on("change", function () {

        let c_id = $(this).val();

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: {
                actionname:'country_name',
                country_id:c_id
            },
            success: function (response) {
                // alert(response);
                // $("#anchor_test").html(response);
                $("#state_select").html(response);
            }
        });
    });

    $("#signup_button").click(function () { 

        var form = $("#signup_form")[0];

        let Username = $("#floatingText").val();
        let Email = $("#floatingInput").val();
        let Phone = $("#floatingNumber").val();
        let Password = $("#floatingPassword").val();
        let Country = $("#country_select").val();
        let State = $("#state_select").val();

        var flag = 0;

        if (Username=="") {
            $("#name_error").html("*Enter Name");
            $("#name_error").addClass("text-danger");
            flag=1;
        }

        if (Country=="Select_country") {
            $("#country_error").html("*Select Country");
            $("#country_error").addClass("text-danger");
            flag=1;
        }

        if (State=="Select_State") {
            $("#state_error").html("*Select State");
            $("#state_error").addClass("text-danger");
            flag=1;
        }

        if (Email=="") {
            $("#email_error").html("*Enter Email");
            $("#email_error").addClass("text-danger");
            flag=1;
        }

        if (Phone=="") {
            $("#number_error").html("*Enter Phone");
            $("#number_error").addClass("text-danger");
            flag=1;
        }

        if (Password=="") {
            $("#password_error").html("*Enter Password");
            $("#password_error").addClass("text-danger");
            flag=1;
        }

        if (flag==1) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {
                
                if (response==2) {
                    swal({
                        title: "User already exist!",
                        icon: "warning",
                        button: false
                    });
                    $("#success_msg").removeClass("text-success");
                    // $("#success_msg").html("User already exist");
                    $("#success_msg").addClass("text-center");
                    $("#success_msg").addClass("text-danger");
                    $("#success_msg").addClass("fw-bold");
                    setTimeout(function () {
                        window.location = "signup.php";
                        location.reload(true);
                    }, 2000);
                }

                if (response==1) {
                    swal({
                        title: "Account created successfully!",
                        icon: "success",
                        button: false
                    });
                    $("#success_msg").removeClass("text-danger");
                    // $("#success_msg").html("Account created successfully");
                    $("#success_msg").addClass("text-center");
                    $("#success_msg").addClass("text-success");
                    $("#success_msg").addClass("fw-bold");
                    setTimeout(function () {
                        window.location = "signup.php";
                        location.reload(true);
                    }, 2000);
                }

                if (response==0) {
                    $("#success_msg").removeClass("text-success");
                    $("#success_msg").html("Some technical issues have arise");
                    $("#success_msg").addClass("text-center");
                    $("#success_msg").addClass("text-danger");
                    $("#success_msg").addClass("fw-bold");
                }

            }
        });
    });

    $("#signin_button").click(function () { 

        var form = $("#signin_form")[0];

        let Email = $("#floatingInput").val();
        let Password = $("#floatingPassword").val();

        var flag = 0;

        if (Email=="") {
            $("#email_error").html("*Enter Email");
            $("#email_error").addClass("text-danger");
            flag=1;
        }
        
        if (Password=="") {
            $("#password_error").html("*Enter Password");
            $("#password_error").addClass("text-danger");
            flag=1;
        }

        if (flag==1) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {

                if (response==1) {
                    // swal({
                    //     title: "Good job!",
                    //     text: "You clicked the button!",
                    //     icon: "success",
                    // });
                    $("#signin_success_msg").removeClass("text-danger");
                    $("#signin_success_msg").html("Successfully Signed in");
                    $("#signin_success_msg").addClass("text-center");
                    $("#signin_success_msg").addClass("text-success");
                    $("#signin_success_msg").addClass("fw-bold");
                    setTimeout(function () {
                        window.location = "index.php";
                        // location.reload(true);
                    }, 2000);
                }

                if (response==0) {
                    $("#signin_success_msg").removeClass("text-success");
                    $("#signin_success_msg").html("Incorrect E-mail or Password");
                    $("#signin_success_msg").addClass("text-center");
                    $("#signin_success_msg").addClass("text-danger");
                    $("#signin_success_msg").addClass("fw-bold");
                }

            }
        });
    });

    $(".valid_checkbox").click(function(){

        if ($(this).is(':checked')){
            let attribute = $(this).attr("data-id");
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    status_val:'1',
                    actionname:'category_checkbox',
                    id: attribute
                },
                success: function (response) {
                    if (response==1) {
                        window.location = "categories.php";
                        location.reload(true);
                    }
                }
            });
        }
        else{
            let attribute = $(this).attr("data-id");
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    status_val:'0',
                    actionname:'category_checkbox',
                    id: attribute
                },
                success: function (response) {
                    if (response==1) {
                        window.location = "categories.php";
                        location.reload(true);
                    }
                }
            });
        }
    });

    $("#forgot_password_button").click(function () { 

        var form = $("#forgotpassword_form")[0];

        let Email = $("#forgot_email").val();

        var flag = 0;

        if (Email=="") {
            $("#forgotemail_error").html("*Enter Email");
            $("#forgotemail_error").addClass("text-danger");
            flag=1;
        }

        if (flag==1) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {
                // alert(response);
                // console.log(response);
                if (response==1) {
                    $("#forgot_success_msg").removeClass("text-danger");
                    $("#forgot_success_msg").html("Check your mail");
                    $("#forgot_success_msg").addClass("text-center");
                    $("#forgot_success_msg").addClass("text-success");
                    $("#forgot_success_msg").addClass("fw-bold");
                    setTimeout(function () {
                        window.location = "resetpassword.php";
                    }, 2000);
                }

                if (response==2) {
                    $("#forgot_success_msg").removeClass("text-success");
                    $("#forgot_success_msg").html("User doesn't exist");
                    $("#forgot_success_msg").addClass("text-center");
                    $("#forgot_success_msg").addClass("text-danger");
                    $("#forgot_success_msg").addClass("fw-bold");
                }

            }
        });

    });

    $("#confirm_Password").on("keyup", function () {
        let confirm_pass = $(this).val();
        let new_pass = $("#new_Password").val();

        if (confirm_pass==new_pass) {
            $("#confirm_password_error").removeClass("text-danger");
            $("#confirm_password_error").html("Password matches");
            $("#confirm_password_error").addClass("text-success");
            $("#confirm_password_error").addClass("fw-bold");
        }
        else {
            $("#confirm_password_error").removeClass("text-success");
            $("#confirm_password_error").html("Password does not matches");
            $("#confirm_password_error").addClass("text-danger");
            $("#confirm_password_error").addClass("fw-bold");
        }
    });

    $("#reset_password_button").click(function () {

        var form = $("#resetpassword_form")[0];

        let new_Password = $("#new_Password").val();
        let confirm_Password = $("#confirm_Password").val();

        let flag = 0;

        if (new_Password=="") {
            $("#new_password_error").html("*Enter Password");
            $("#new_password_error").addClass("text-danger");
            flag=1;
        }

        if (new_Password!="") {
            if (new_Password!=confirm_Password) {
                $("#confirm_password_error").removeClass("text-success");
                $("#confirm_password_error").html("*Password does not matches");
                $("#confirm_password_error").addClass("text-danger");
                $("#confirm_password_error").addClass("fw-bold");
                flag=1;
            }
        }

        if (flag==1) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {
                // alert(response);
                // console.log(response);
                if (response==1) {
                    $("#confirm_password_error").hide();
                    $("#reset_success_msg").removeClass("text-danger");
                    $("#reset_success_msg").html("Password changed successfully");
                    $("#reset_success_msg").addClass("text-center");
                    $("#reset_success_msg").addClass("text-success");
                    $("#reset_success_msg").addClass("fw-bold");
                    setTimeout(function () {
                        window.location = "signin.php";
                    }, 2000);
                }

                if (response==0) {
                    $("#reset_success_msg").removeClass("text-success");
                    $("#reset_success_msg").html("Some technical issue have arise");
                    $("#reset_success_msg").addClass("text-center");
                    $("#reset_success_msg").addClass("text-danger");
                    $("#reset_success_msg").addClass("fw-bold");
                }

            }
        });
    });

    $("#category_dropdown_div").hide();
    $("#inputEmail4_div").hide();
    $("#inputPassword4_div").hide();
    $("#formFile_div").hide();
    $("#subinputEmail4_div").hide();

    $(".category_checkbox").click(function () { 

        if ($("#flexRadioDefault1").is(":checked")) {
            
            $("#cat_or_subcat").val(1);
            $("#category_dropdown_div").hide();
            $("#inputEmail4_div").show();
            $("#inputPassword4_div").show();
            $("#formFile_div").show();
            $("#subinputEmail4_div").hide();

        }
        if ($("#flexRadioDefault2").is(":checked")) {

            $("#cat_or_subcat").val(2);
            $("#category_dropdown_div").show();
            $("#inputPassword4_div").show();
            $("#inputEmail4_div").hide();
            $("#formFile_div").show();
            $("#subinputEmail4_div").show();

        }

    });

    $(document).ready(()=>{
        $('#formFile').change(function(){
            const file = this.files[0];
            console.log(file);
            if (file){
                let reader = new FileReader();
                reader.onload = function(event){
                    console.log(event.target.result);
                    $('#previewimg').attr('src', event.target.result);
                    $('#previewimg').css("width", "100px");
                    $('#previewimg').css("height", "100px");
                }
            reader.readAsDataURL(file);
            }
        });
    });
    

    $("#category_submit_button").click(function () {

        var form = $("#categories_dataform")[0];
        
        let category_name = $("#inputEmail4").val();
        let category_tags = $("#inputPassword4").val();
        let formFile = $("#formFile").val();
        let category_dropdown = $("#category_dropdown").val();
        let subinputEmail4 = $("#subinputEmail4").val();

        let cat_or_subcat = $("#cat_or_subcat").val();

        var flag = 0;

        if (cat_or_subcat==1) {

            if (category_name=="") {
                $("#err_category").html("*Enter Category");
                $("#err_category").addClass("text-danger");
                $("#err_category").addClass("fw-bold");
                flag=1;
            }
    
            if (category_name!="") {
                $("#err_category").hide();
            }
            
            if (formFile=="") {
                $("#err_formfile").html("*Select image");
                $("#err_formfile").addClass("text-danger");
                $("#err_formfile").addClass("fw-bold");
                flag=1;
            }
    
            if (formFile!="") {
                $("#err_formfile").hide();
            }
            
        }

        if (cat_or_subcat==2) {

            if (category_dropdown=="Select_category") {
                $("#err_category_dropdown").html("*Enter Category");
                $("#err_category_dropdown").addClass("text-danger");
                $("#err_category_dropdown").addClass("fw-bold");
                flag=1;
            }
    
            if (category_dropdown!="Select_category") {
                $("#err_category_dropdown").hide();
            }

            if (subinputEmail4=="") {
                $("#err_subcategory").html("*Enter Category");
                $("#err_subcategory").addClass("text-danger");
                $("#err_subcategory").addClass("fw-bold");
                flag=1;
            }
    
            if (subinputEmail4!="") {
                $("#err_subcategory").hide();
            }

            if (formFile=="") {
                $("#err_formfile").html("*Select image");
                $("#err_formfile").addClass("text-danger");
                $("#err_formfile").addClass("fw-bold");
                flag=1;
            }
    
            if (formFile!="") {
                $("#err_formfile").hide();
            }

        }


        if (flag==1) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {
                // alert(response);
                console.log(response);
                $("#anchor_test").html(response);
                if (response==1) {
                    setTimeout(function () {
                        window.location = "categories.php";
                        location.reload(true);
                    }, 2000);
                }
            }
        });
    });

    $(".view_category").click(function () { 

        let id_value = $(this).val();
        
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: {
                'actionname':'view_category',
                id:id_value
            },
            success: function (response) {
                
                let category = JSON.parse(response)[0].categories;
                let tags = JSON.parse(response)[0].tags;
                let subcategory = JSON.parse(response)[1].categories;

                $("#cat_div").html(category);
                $("#tags_div").html(tags);
                if (JSON.parse(response)[1]=="") {
                    $("#subcat_div").html("N/A");
                }
                else{
                    $("#subcat_div").html(subcategory);
                }
                
                if (JSON.parse(response)[0].cat_img!="") {
                    $("#catimg_div").html("<img src='category_images/"+JSON.parse(response)[0].cat_img+"' alt='img' style='height: 150px;width: 150px;''>");
                }
                else {
                    $("#catimg_div").html("N/A");
                }
                
            }
        });

        $('#viewcategory_modal').modal('show'); 
    });

    $(".update_category").click(function () { 

        let updatecat_id = $(this).val();

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: {
                'actionname':'update_category',
                id:updatecat_id
            },
            success: function (response) {
                
                let category = JSON.parse(response).categories;
                let tags = JSON.parse(response).tags;
                let subcategory = JSON.parse(response).parent_id;
                let cat_img = JSON.parse(response).cat_img;
                $("#updateinputPassword4").val(tags);
                
                if (subcategory==0) {
                    $("#updateinputEmail4_div").show();
                    $("#updatecategory_dropdown_div").hide();
                    $("#updatesubinputEmail4_div").hide();
                    $("#updateinputEmail4").val(category);
                }
                else{
                    $("#updatesubinputEmail4_div").show();
                    $("#updateinputEmail4_div").hide();
                    $("#updatecategory_dropdown_div").show();
                    $("#updatesubinputEmail4").val(category);
                    $("#updatecategory_dropdown option").each(function(){
                        let cat_val = $(this).val();
                        if (cat_val==subcategory) {
                            $('select>option[value="5"]').prop('selected', true);
                        }
                    });
                }

                if (cat_img!="") {
                    $("#updatepreviewimg").attr('src', 'category_images/'+cat_img);
                    $("#updatepreviewimg").css("height", "150px");
                    $("#updatepreviewimg").css("width", "150px");
                }

            }
        });

        $('#updatecategory_modal').modal('show'); 
    });

    $("#updatecategory_submit_button").click(function () { 
        alert("hi");
    });


    //----------------------------------- end categories -----------------------------------//

    //----------------------------------- start products -----------------------------------//

    $(document).ready(()=>{
        $('#proFile').change(function(){
            const file = this.files[0];
            console.log(file);
            if (file){
                let reader = new FileReader();
                reader.onload = function(event){
                    console.log(event.target.result);
                    $('#proimg').attr('src', event.target.result);
                    $('#proimg').css("width", "100px");
                    $('#proimg').css("height", "100px");
                }
            reader.readAsDataURL(file);
            }
        });
    });
    
    $("#product_submit_button").click(function () { 

        var form = $("#products_dataform")[0];

        let product_category_drop = $("#product_category_drop").val();
        let product_name = $("#product_name").val();
        let product_price = $("#product_price").val();
        let proimg = $("#proimg").val();

        var flag = 0;

        if (product_category_drop=="") {
            $("#err_product_category_dropdown").html("*Select Category");
            $("#err_product_category_dropdown").addClass("text-danger");
            $("#err_product_category_dropdown").addClass("fw-bold");
            flag=1;
        }

        if (product_category_drop!="") {
            $("#err_product_category_dropdown").hide();
        }

        if (product_name=="") {
            $("#err_product_name").html("*Enter product name");
            $("#err_product_name").addClass("text-danger");
            $("#err_product_name").addClass("fw-bold");
            flag=1;
        }

        if (product_name!="") {
            $("#err_product_name").hide();
        }

        if (product_price=="") {
            $("#err_product_price").html("*Enter price");
            $("#err_product_price").addClass("text-danger");
            $("#err_product_price").addClass("fw-bold");
            flag=1;
        }

        if (product_price!="") {
            $("#err_product_price").hide();
        }

        if (flag==1) {
            return false;
        }

        // if (proimg=="") {
        //     $("#err_proFile").html("*Upload image");
        //     $("#err_proFile").addClass("text-danger");
        //     $("#err_proFile").addClass("fw-bold");
        //     flag=1;
        // }

        // if (proimg!="") {
        //     $("#err_proFile").hide();
        // }

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {                
                
                if (response==1) {
                    $("#product_success").html("Product added successfully");
                    $("#product_success").addClass("text-success");
                    $("#product_success").addClass("fw-bold");
                    setTimeout(function () {
                        window.location = "products.php";
                        location.reload(true);
                    }, 2000);
                }
            }
        });


    });

    $(".delete_product").click(function () { 
        
        let product_id = $(this).val();

        if (!confirm("Do you want to delete this product?")) {
            return false;    
        }
        else {
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    id:product_id,
                    'actionname':'delete_product'
                },
                success: function (response) { 
                    if (response==1) {
                        setTimeout(function () {
                            window.location = "products.php";
                            location.reload(true);
                        }, 2000);
                    }
    
                }
            });
        }

    });

    $(".update_product").click(function () { 
        let updateproduct_id = $(this).val();
        $("#hidden_id").val(updateproduct_id);

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: {
                'actionname':'update_product',
                id:updateproduct_id
            },
            success: function (response) {
                
                let product = JSON.parse(response).product;
                let price = JSON.parse(response).price;
                let cat_id = JSON.parse(response).cat_id;
                let p_img = JSON.parse(response).p_img;

                $("#updateproduct_name").val(product);
                $("#updateproduct_price").val(price);
                $("#oldproductimg").val(p_img);

                $("#updateproimg").attr('src', 'product_images/'+p_img);

                
                $("#updateproduct_category_drop option").each(function(){
                    let cat_val = $(this).val();
                    if (cat_val==cat_id) {
                        $('select>option[value='+cat_id+']').prop('selected', true);
                    }
                });

            }
        });
    });

    $("#updateproduct_submit_button").click(function () { 

        var form = $("#updateproducts_dataform")[0];

        let product_category_drop = $("#updateproduct_category_drop").val();
        let product_name = $("#updateproduct_name").val();
        let product_price = $("#updateproduct_price").val();

        var flag = 0;

        if (product_category_drop=="Select_category") {
            $("#updateerr_product_category_dropdown").html("*Select Category");
            $("#updateerr_product_category_dropdown").addClass("text-danger");
            $("#updateerr_product_category_dropdown").addClass("fw-bold");
            flag=1;
        }

        if (product_category_drop!="Select_category") {
            $("#updateerr_product_category_dropdown").hide();
        }

        if (product_name=="") {
            $("#updateerr_product_name").html("*Enter product name");
            $("#updateerr_product_name").addClass("text-danger");
            $("#updateerr_product_name").addClass("fw-bold");
            flag=1;
        }

        if (product_name!="") {
            $("#updateerr_product_name").hide();
        }

        if (product_price=="") {
            $("#updateerr_product_price").html("*Enter price");
            $("#updateerr_product_price").addClass("text-danger");
            $("#updateerr_product_price").addClass("fw-bold");
            flag=1;
        }

        if (product_price!="") {
            $("#updateerr_product_price").hide();
        }

        if (flag==1) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {
                
                if (response==1) {
                    $("#updateproduct_success").html("Product updated successfully");
                    $("#updateproduct_success").addClass("text-success");
                    $("#updateproduct_success").addClass("fw-bold");
                    setTimeout(function () {
                        window.location = "products.php";
                        location.reload(true);
                    }, 2000);
                }

            }
        });


    });

    $(document).ready(()=>{
        $('#updateproFile').change(function(){
            const file = this.files[0];
            console.log(file);
            if (file){
                let reader = new FileReader();
                reader.onload = function(event){
                    console.log(event.target.result);
                    $('#updateproimg').attr('src', event.target.result);
                    $('#updateproimg').css("width", "100px");
                    $('#updateproimg').css("height", "100px");
                }
            reader.readAsDataURL(file);
            }
        });
    });

    //----------------------------------- end products -----------------------------------//

    //----------------------------------- Start blog -----------------------------------//

    $("#blog_submit_button").click(function () { 

        var form = $("#blogs_dataform")[0];
        
        let blog_title = $("#blog_title").val();
        let blogFile = $("#blogFile").val();
        let floatingTextarea2 = $("#floatingTextarea2").val();

        var flag = 0;

        if (blog_title=="") {
            $("#err_blog_title").html("*Enter Blog Title");
            $("#err_blog_title").addClass("text-danger");
            $("#err_blog_title").addClass("fw-bold");
            flag=1;
        }

        if (blog_title!="") {
            $("#err_blog_title").hide();
        }

        if (blogFile=="") {
            $("#err_blogFile").html("*Enter Blog Image");
            $("#err_blogFile").addClass("text-danger");
            $("#err_blogFile").addClass("fw-bold");
            flag=1;
        }

        if (blogFile!="") {
            $("#err_blogFile").hide();
        }

        if (floatingTextarea2=="") {
            $("#err_blog_description").html("*Enter Blog Description");
            $("#err_blog_description").addClass("text-danger");
            $("#err_blog_description").addClass("fw-bold");
            flag=1;
        }

        if (floatingTextarea2!="") {
            $("#err_blog_description").hide();
        }

        if (flag==1) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {
                
                if (response==1) {
                    $("#blog_success").html("Blog added successfully");
                    $("#blog_success").addClass("text-success");
                    $("#blog_success").addClass("fw-bold");
                    setTimeout(function () {
                        window.location = "blog.php";
                        location.reload(true);
                    }, 2000);
                }

            }
        });

    });

    $(document).ready(()=>{
        $('#blogFile').change(function(){
            const file = this.files[0];
            console.log(file);
            if (file){
                let reader = new FileReader();
                reader.onload = function(event){
                    console.log(event.target.result);
                    $('#blogimg').attr('src', event.target.result);
                    $('#blogimg').css("width", "100px");
                    $('#blogimg').css("height", "100px");
                }
            reader.readAsDataURL(file);
            }
        });
    });

    $(document).ready(()=>{
        $('#updateblogFile').change(function(){
            const file = this.files[0];
            console.log(file);
            if (file){
                let reader = new FileReader();
                reader.onload = function(event){
                    console.log(event.target.result);
                    $('#updateblogimg').attr('src', event.target.result);
                    $('#updateblogimg').css("width", "100px");
                    $('#updateblogimg').css("height", "100px");
                }
            reader.readAsDataURL(file);
            }
        });
    });

    $(".delete_blog").click(function () { 
        
        let blog_id = $(this).val();

        if (!confirm("Do you want to delete this product?")) {
            return false;    
        }
        else {
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    id:blog_id,
                    'actionname':'delete_blog'
                },
                success: function (response) {

                    if (response==1) {
                        setTimeout(function () {
                            window.location = "blog.php";
                            location.reload(true);
                        }, 2000);
                    }

                }
            });
        }

    });

    $(".update_blog").click(function () { 
        let updateblog_id = $(this).val();
        
        $("#hidden_id").val(updateblog_id);

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: {
                'actionname':'update_blog',
                id:updateblog_id
            },
            success: function (response) {
                
                let title = JSON.parse(response).title;
                let content = JSON.parse(response).content;
                let img = JSON.parse(response).img;

                $("#updateblog_title").val(title);
                $("#updatefloatingTextarea2").val(content);
                $("#oldpblogimg").val(img);

                $("#updateblogimg").attr('src', 'blog_images/'+img);

            }
        });
    });

    $("#updateblog_submit_button").click(function () { 

        var form = $("#updateblogs_dataform")[0];

        let updateblog_title = $("#updateblog_title").val();
        let updatefloatingTextarea2 = $("#updatefloatingTextarea2").val();

        var flag = 0;

        if (updateblog_title=="") {
            $("#updateerr_blog_title").html("*Enter Blog Title");
            $("#updateerr_blog_title").addClass("text-danger");
            $("#updateerr_blog_title").addClass("fw-bold");
            flag=1;
        }

        if (updateblog_title!="") {
            $("#updateerr_blog_title").hide();
        }

        if (updatefloatingTextarea2=="") {
            $("#updateerr_blog_description").html("*Enter Blog description");
            $("#updateerr_blog_description").addClass("text-danger");
            $("#updateerr_blog_description").addClass("fw-bold");
            flag=1;
        }

        if (updatefloatingTextarea2!="") {
            $("#updateerr_blog_description").hide();
        }

        if (flag==1) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {
                
                if (response==1) {
                    $("#updateblog_success").html("Blog updated successfully");
                    $("#updateblog_success").addClass("text-success");
                    $("#updateblog_success").addClass("fw-bold");
                    setTimeout(function () {
                        window.location = "blog.php";
                        location.reload(true);
                    }, 2000);
                }

            }
        });

    });

    //----------------------------------- End blog -----------------------------------//

    //----------------------------------- Start Coupon -----------------------------------//

    $(document).ready(()=>{
        $('#couponFile').change(function(){
            const file = this.files[0];
            console.log(file);
            if (file){
                let reader = new FileReader();
                reader.onload = function(event){
                    console.log(event.target.result);
                    $('#couimg').attr('src', event.target.result);
                    $('#couimg').css("width", "100px");
                    $('#couimg').css("height", "100px");
                }
            reader.readAsDataURL(file);
            }
        });
    });

    $("#coupon_submit_button").click(function () { 

        var form = $("#coupons_dataform")[0];

        let coupon_code = $("#coupon_code").val();
        let percent = $("#percent").val();
        let couponFile = $("#couponFile").val();

        var flag = 0;

        if (coupon_code=="") {
            $("#err_coupon_code").html("*Enter Coupon");
            $("#err_coupon_code").addClass("text-danger");
            $("#err_coupon_code").addClass("fw-bold");
            flag=1;
        }

        if (coupon_code!="") {
            $("#err_coupon_code").hide();
        }

        if (percent=="") {
            $("#err_percent").html("*Enter Coupon Percent");
            $("#err_percent").addClass("text-danger");
            $("#err_percent").addClass("fw-bold");
            flag=1;
        }

        if (percent!="") {
            $("#err_percent").hide();
        }

        if (couponFile=="") {
            $("#err_couponFile").html("*Upload coupon image");
            $("#err_couponFile").addClass("text-danger");
            $("#err_couponFile").addClass("fw-bold");
            flag=1;
        }

        if (couponFile!="") {
            $("#err_couponFile").hide();
        }

        if (flag==1) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {
                if (response==1) {
                    $("#coupon_success").html("Coupon added successfully");
                    $("#coupon_success").addClass("text-success");
                    $("#coupon_success").addClass("fw-bold");
                    setTimeout(function () {
                        window.location = "coupons.php";
                        location.reload(true);
                    }, 2000);
                }
            }
        });
    });

    $(".delete_coupon").click(function () { 
        
        let product_id = $(this).val();

        if (!confirm("Do you want to delete this coupon?")) {
            return false;    
        }
        else {
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    id:product_id,
                    'actionname':'delete_coupon'
                },
                success: function (response) { 
                    if (response==1) {
                        setTimeout(function () {
                            window.location = "coupons.php";
                            location.reload(true);
                        }, 2000);
                    }
    
                }
            });
        }

    });

    $(".update_coupon").click(function () { 

        let updatecoupon_id = $(this).val();
        $("#hidden_id").val(updatecoupon_id);

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: {
                'actionname':'update_coupon',
                id:updatecoupon_id
            },
            success: function (response) {
                
                alert(response);
                $("#updateanchor_coupon").html(response);
                // let product = JSON.parse(response).product;
                // let price = JSON.parse(response).price;
                // let cat_id = JSON.parse(response).cat_id;
                // let p_img = JSON.parse(response).p_img;

                // $("#updateproduct_name").val(product);
                // $("#updateproduct_price").val(price);
                // $("#oldproductimg").val(p_img);

                // $("#updateproimg").attr('src', 'product_images/'+p_img);

                
                // $("#updateproduct_category_drop option").each(function(){
                //     let cat_val = $(this).val();
                //     if (cat_val==cat_id) {
                //         $('select>option[value='+cat_id+']').prop('selected', true);
                //     }
                // });

            }
        });
    });

    $("#updatecoupon_submit_button").click(function () { 
        
        var form = $("#updatecoupons_dataform")[0];

        let coupon_code = $("#updatecoupon_code").val();
        let percent = $("#updatecoupon_percent").val();
        let couponFile = $("#updatecou_File").val();

        var flag = 0;

        if (coupon_code=="") {
            $("#updateerr_coupon_code").html("*Enter Coupon");
            $("#updateerr_coupon_code").addClass("text-danger");
            $("#updateerr_coupon_code").addClass("fw-bold");
            flag=1;
        }

        if (coupon_code!="") {
            $("#updateerr_coupon_code").hide();
        }

        if (percent=="") {
            $("#updateerr_coupon_percent").html("*Enter Coupon Percent");
            $("#updateerr_coupon_percent").addClass("text-danger");
            $("#updateerr_coupon_percent").addClass("fw-bold");
            flag=1;
        }

        if (percent!="") {
            $("#updateerr_coupon_percent").hide();
        }

        if (couponFile=="") {
            $("#err_cou_File").html("*Upload coupon image");
            $("#err_cou_File").addClass("text-danger");
            $("#err_cou_File").addClass("fw-bold");
            flag=1;
        }

        if (couponFile!="") {
            $("#err_cou_File").hide();
        }

        if (flag==1) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {
                
            }
        });
    });

    function randomString(length, chars) {
        var result = '';
        for (var i = length; i > 0; --i)
        {
            result += chars[Math.round(Math.random()*(chars.length - 1))];
        }
        return 'PRO-coupon-'+result;
    }

    $("#generate_code_button").click(function () { 
        let random_generator = randomString(6,'0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $("#coupon_code").val(random_generator);
    });

    //----------------------------------- End Coupon -----------------------------------//

    //----------------------------------- Start Profile -----------------------------------//

    $("#profile_edit_button").click(function () { 
        $("#profile_name").removeAttr("readonly");
        $("#profile_country").removeAttr("readonly");
        $("#profile_state").removeAttr("readonly");
        $("#profile_phone").removeAttr("readonly");
        $("#profile_email").removeAttr("readonly");
    });

    //----------------------------------- End Profile -----------------------------------//

    //----------------------------------- Start Customer -----------------------------------//

    $(".customer_full_details").click(function () { 
        let customer_id = $(this).attr("data-id");

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: {
                id:customer_id,
                'actionname':'customer_details'
            },
            success: function (response) { 
                $("#anchor_details_customer").html(response);
                let user_details = JSON.parse(response);

                $("#user_name").html(user_details[0].name);
                $("#user_country").html(user_details[2]);
                $("#user_email").html(user_details[1].email);
                $("#user_state").html(user_details[3]);

            }
        });
    });

    //----------------------------------- End Customer -----------------------------------//
});