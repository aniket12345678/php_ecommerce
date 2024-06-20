<?php
include "header.php";
?>


        
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="d-flex align-items-baseline justify-content-between">
                                <h6 class="mb-4">All products</h6>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addproduct_modal">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-dark table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr. no</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">price</th>
                                            <th scope="col" style="width: 21%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=0;
                                        $products_sql = "SELECT * FROM `products`";
                                        $products_join = mysqli_query($connect, $products_sql);
                                        while ($product_list = mysqli_fetch_assoc($products_join)) { ?>
                                            <tr>
                                                <th scope="row"><?php echo ($i+1); ?></th>
                                                <td><img src="product_images/<?php echo $product_list['p_img']; ?>" alt="" class="img-thumbnail" style="width: 102px;height: 116px;"></td>
                                                <td><?php echo $product_list['product']; ?></td>
                                                <td><?php echo $product_list['price']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary m-2 update_product" value="<?php echo $product_list['p_id']; ?>" data-bs-toggle="modal" data-bs-target="#updateproduct_modal">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <!-- <button type="button" class="btn btn-success view_product" value="<?php echo $product_list['p_id']; ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </button> -->
                                                    <button type="button" class="btn btn-primary m-2 delete_product" value="<?php echo $product_list['p_id']; ?>">
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


            <!-- Add product Modal -->
            <div class="modal fade" id="addproduct_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="products_dataform">
                            <div id="anchor_products"></div>
                            <input type="hidden" name="actionname" value="products_form">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="form-label">Category</label>
                                        <select name="myproduct_category_drop" id="product_category_drop" class="form-select">
                                            <option value="Select_category">Select category</option>
                                            <?php
                                                $categorydropdown_sql = "SELECT * FROM `categories`";
                                                $categorydropdown_join = mysqli_query($connect, $categorydropdown_sql);
                                                while ($catdropdown_list = mysqli_fetch_assoc($categorydropdown_join)) { ?>
                                                <option value="<?php echo $catdropdown_list['cat_id'] ?>"><?php echo $catdropdown_list['categories'] ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                        <div id="err_product_category_dropdown"></div>
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">Product</label>
                                        <input type="text" name="myproduct_name" id="product_name" class="form-control" placeholder="Product" aria-label="Last name">
                                        <div id="err_product_name"></div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="" class="form-label">Price</label>
                                        <input type="number" name="myproduct_price" min="1" id="product_price" class="form-control" placeholder="Price" aria-label="Last name">
                                        <div id="err_product_price"></div>
                                    </div>
                                    <div class="col">
                                        <label for="proFile" class="form-label">Product image</label>
                                        <input class="form-control" name="myproductimg" type="file" id="proFile">
                                        <div id="err_proFile"></div>
                                        <div id="proimg_holder" class="mt-3">
                                            <img src="" alt="" id="proimg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <span id="product_success"></span>
                                <button type="button" id="product_submit_button" class="btn btn-primary">Add product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Update product Modal -->
            <div class="modal fade" id="updateproduct_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
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
                                        <label for="" class="form-label">Category</label>
                                        <select name="updatemyproduct_category_drop" id="updateproduct_category_drop" class="form-select">
                                            <option value="Select_category">Select category</option>
                                            <?php
                                                $categorydropdown_sql = "SELECT * FROM `categories`";
                                                $categorydropdown_join = mysqli_query($connect, $categorydropdown_sql);
                                                while ($catdropdown_list = mysqli_fetch_assoc($categorydropdown_join)) { ?>
                                                <option value="<?php echo $catdropdown_list['cat_id'] ?>"><?php echo $catdropdown_list['categories'] ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                        <div id="updateerr_product_category_dropdown"></div>
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">Product</label>
                                        <input type="text" name="updatemyproduct_name" id="updateproduct_name" class="form-control" placeholder="Product" aria-label="Last name">
                                        <div id="updateerr_product_name"></div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="" class="form-label">Price</label>
                                        <input type="number" name="updatemyproduct_price" min="1" id="updateproduct_price" class="form-control" placeholder="Price" aria-label="Last name">
                                        <div id="updateerr_product_price"></div>
                                    </div>
                                    <div class="col">
                                        <label for="proFile" class="form-label">Product image</label>
                                        <input class="form-control" name="updatemyproductimg" type="file" id="updateproFile">
                                        <div id="err_proFile"></div>
                                        <div id="updateproimg_holder" class="mt-3">
                                            <img src="" alt="" id="updateproimg" style="height: 150px; width: 150px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <span id="updateproduct_success"></span>
                                <button type="button" id="updateproduct_submit_button" class="btn btn-primary">Update product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            <?php
            include "footer.php";
            ?>