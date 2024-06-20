<?php
include "header.php";
?>


        
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="d-flex align-items-baseline justify-content-between">
                                <h6 class="mb-4">All Coupons</h6>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcoupon_modal">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-dark table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr. no</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Coupon Code</th>
                                            <th scope="col">Percent</th>
                                            <th scope="col" style="width: 21%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=0;
                                        $coupons_sql = "SELECT * FROM `coupons`";
                                        $coupons_join = mysqli_query($connect, $coupons_sql);
                                        while ($coupon_list = mysqli_fetch_assoc($coupons_join)) { ?>
                                            <tr>
                                                <th scope="row">
                                                    <?php echo ($i+1); ?>
                                                </th>
                                                <td>
                                                    <img src="coupon_img/<?php echo $coupon_list['c_img']; ?>" alt="" class="img-thumbnail" style="width: 102px;height: 116px;">
                                                </td>
                                                <td>
                                                    <?php echo $coupon_list['coupon_code']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $coupon_list['percent']; ?>
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
                        <form id="updatecoupons_dataform">
                            <div id="updateanchor_products"></div>
                            <input type="hidden" name="actionname" value="updatecoupons_form">
                            <input type="hidden" name="myhidden_id" id="hidden_id" value="">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="form-label">Percent</label>
                                        <input type="number" name="updatemycoupon_percent" min="1" id="updatecoupon_percent" class="form-control" placeholder="Percent" aria-label="Last name">
                                        <div id="updateerr_coupon_percent"></div>
                                    </div>
                                    <div class="col">
                                        <label for="proFile" class="form-label">Coupon image</label>
                                        <input class="form-control" name="updatemycouponimg" type="file" id="updatecou_File">
                                        <div id="err_cou_File"></div>
                                        <div id="updatecou_img_holder" class="mt-3">
                                            <img src="" alt="" id="updatecou_img" style="height: 150px; width: 150px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="" class="form-label">Coupon code</label>
                                        <input type="text" name="updatemycoupon_code" id="updatecoupon_code" class="form-control" placeholder="Code" aria-label="Last name">
                                        <div id="updateerr_coupon_code"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <span id="updateproduct_success"></span>
                                <button type="button" id="updatecoupon_submit_button" class="btn btn-primary">Update Coupon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
            include "footer.php";
            ?>