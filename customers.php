<?php
include "header.php";
?>


        
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="d-flex align-items-baseline justify-content-between">
                                <h6 class="mb-4">All Customers</h6>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcoupon_modal">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-dark table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr. no</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Code</th>
                                            <th scope="col" style="width: 21%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=0;
                                        $users_sql = "SELECT * FROM `user_login`";
                                        $users_join = mysqli_query($connect, $users_sql);
                                        while ($users_list = mysqli_fetch_assoc($users_join)) { 
                                            
                                            $m_id = $users_list['id'];
                                            
                                            $users_details_sql = "SELECT * FROM `user_details` WHERE `m_id`='$m_id'";
                                            $users_details_join = mysqli_query($connect, $users_details_sql);
                                            $users_details_data = mysqli_fetch_assoc($users_details_join);
                                            
                                        ?>
                                            <tr>
                                                <th scope="row">
                                                    <?php echo ($i+1); ?>
                                                </th>
                                                <td>
                                                    <?php echo $users_details_data['name'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $users_list['email']; ?>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" data-id="<?php echo $m_id; ?>" class="customer_full_details" data-bs-toggle="modal" data-bs-target="#cust_modal">
                                                        <?php echo $users_details_data['customer_code'] ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary m-2 update_coupon" value="<?php echo $coupon_list['id']; ?>" data-bs-toggle="modal" data-bs-target="#updatecoupon_modal">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-primary m-2 delete_coupon" value="<?php echo $coupon_list['id']; ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php 
                                        $i++;
                                        }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->

            <div class="modal fade" id="cust_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Customer Detail</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="anchor_details_customer"></div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6"><strong class="text-dark">Name:</strong></div>
                                        <div class="col-6" id="user_name"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6"><strong class="text-dark">Country:</strong></div>
                                        <div class="col-6" id="user_country"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6"><strong class="text-dark">E-mail:</strong></div>
                                        <div class="col-6" id="user_email"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6"><strong class="text-dark">State:</strong></div>
                                        <div class="col-6" id="user_state"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </div>
                </div>
            </div>


            <!-- Add coupon Modal -->
            <div class="modal fade" id="addcoupon_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Coupon</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="coupons_dataform">
                            <div id="anchor_coupons"></div>
                            <input type="hidden" name="actionname" value="coupons_form">
                            <div class="modal-body">
                                <div class="row">
                                    
                                    <div class="col">
                                        <label for="" class="form-label">Percent</label>
                                        <input type="number" name="mypercent" min="1" id="percent" class="form-control" placeholder="Percent" aria-label="Last name">
                                        <div id="err_percent"></div>
                                    </div>
                                    <div class="col">
                                        <label for="couponFile" class="form-label">Coupon image</label>
                                        <input class="form-control" name="myproductimg" type="file" id="couponFile">
                                        <div id="err_couponFile"></div>
                                        <div id="proimg_holder" class="mt-3">
                                            <img src="" alt="" id="couimg">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="form-label">Coupon code</label>
                                        <input type="text" name="mycoupon_code" id="coupon_code" class="form-control" placeholder="Code" aria-label="Last name" readonly>
                                        <div id="err_coupon_code"></div>
                                        <div class="mt-2">
                                            <button type="button" class="btn btn-primary" id="generate_code_button">
                                                Generate Code
                                            </button>
                                            <span id="generate"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <span id="coupon_success"></span>
                                <button type="button" id="coupon_submit_button" class="btn btn-primary">Add Coupon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Update coupon Modal -->
            <div class="modal fade" id="updatecoupon_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Coupon</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="updateproducts_dataform">
                            <div id="updateanchor_products"></div>
                            <input type="hidden" name="actionname" value="updateproducts_form">
                            <input type="hidden" name="myhidden_id" id="hidden_id" value="">
                            <input type="hidden" name="myold_pimg" id="oldproductimg" value="">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="form-label">Percent</label>
                                        <input type="number" name="updatemyproduct_price" min="1" id="updateproduct_price" class="form-control" placeholder="Percent" aria-label="Last name">
                                        <div id="updateerr_product_price"></div>
                                    </div>
                                    <div class="col">
                                        <label for="proFile" class="form-label">Coupon image</label>
                                        <input class="form-control" name="updatemyproductimg" type="file" id="updateproFile">
                                        <div id="err_proFile"></div>
                                        <div id="updateproimg_holder" class="mt-3">
                                            <img src="" alt="" id="updateproimg" style="height: 150px; width: 150px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="" class="form-label">Coupon code</label>
                                        <input type="text" name="updatemyproduct_name" id="updateproduct_name" class="form-control" placeholder="Code" aria-label="Last name">
                                        <div id="updateerr_product_name"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <span id="updateproduct_success"></span>
                                <button type="button" id="updateproduct_submit_button" class="btn btn-primary">Update Coupon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            <?php
            include "footer.php";
            ?>