<?php
include "header.php";
?>


        
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="d-flex align-items-baseline justify-content-between">
                                <h6 class="mb-4">Categories</h6>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcategory_modal">
                                    <!-- Primary -->
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-dark table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr. no</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">SubCategory</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=0;
                                        $category_sql = "SELECT * FROM `categories`";
                                        $category_join = mysqli_query($connect, $category_sql);
                                        while ($cat_list = mysqli_fetch_assoc($category_join)) { ?>
                                            <tr>
                                                <th scope="row"><?php echo ($i+1); ?></th>
                                                <td><?php echo $cat_list['categories']; ?></td>
                                                <td>
                                                    <?php
                                                        if ($cat_list['parent_id']!=0) {
                                                            $parent_id = $cat_list['parent_id']; 
                                                            $fetch_cat = "SELECT * FROM `categories` WHERE `cat_id`='$parent_id'";
                                                            $fetch_catjoin = mysqli_query($connect, $fetch_cat);
                                                            $fetch_category = mysqli_fetch_assoc($fetch_catjoin);
                                                            echo $fetch_category['categories'];
                                                        }
                                                        else {
                                                            echo "N/A";
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input valid_checkbox" type="checkbox" id="flexSwitchCheckDefault<?php echo $cat_list['cat_id']; ?>" data-id="<?php echo $cat_list['cat_id']; ?>" <?php if ($cat_list['status']==1) { echo "checked"; } ?>>
                                                        <label class="form-check-label" for="flexSwitchCheckDefault<?php echo $cat_list['cat_id']; ?>"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary m-2 update_category" value="<?php echo $cat_list['cat_id']; ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-success view_category" value="<?php echo $cat_list['cat_id']; ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php $i++;}
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


            <!-- Add Modal -->
            <div class="modal fade" id="addcategory_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="categories_dataform" enctype="multipart/form-data">
                            <input type="hidden" name="actionname" value="categories_form">
                            <input type="hidden" name="mycat_or_subcat" id="cat_or_subcat" value="none">
                            <div id="anchor_test"></div>
                            <div class="modal-body">
                                <div class="form-check">
                                    <input class="form-check-input category_checkbox" type="radio" name="myflexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Add Category
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input category_checkbox" type="radio" name="myflexRadioDefault" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Add Subcategory
                                    </label>
                                </div>
                                <div class="mt-3" id="category_fields">
                                    <div class="row">
                                        <div class="col-md-6" id="category_dropdown_div">
                                            <label for="inputEmail4" class="form-label">Category</label>
                                            <select class="form-select" name="mycategory_dropdown" id="category_dropdown" aria-label="Default select example">
                                                <option value="Select_category">Select category</option>
                                                <?php
                                                $categorydropdown_sql = "SELECT * FROM `categories`";
                                                $categorydropdown_join = mysqli_query($connect, $categorydropdown_sql);
                                                while ($catdropdown_list = mysqli_fetch_assoc($categorydropdown_join)) { ?>
                                                    <option value="<?php echo $catdropdown_list['cat_id'] ?>"><?php echo $catdropdown_list['categories'] ?></option>
                                                    <?php }
                                                ?>
                                            </select>
                                            <div id="err_category_dropdown"></div>
                                        </div>
                                        <div class="col-md-6" id="inputEmail4_div">
                                            <label for="inputEmail4" class="form-label">Category</label>
                                            <input type="text" name="myCategory" class="form-control" id="inputEmail4">
                                            <div id="err_category"></div>
                                        </div>
                                        <div class="col-md-6" id="inputPassword4_div">
                                            <label for="inputPassword4" class="form-label">Tags</label>
                                            <input type="text" name="myTags" class="form-control" id="inputPassword4">
                                            <div id="err_tags"></div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6" id="formFile_div">
                                            <label for="formFile" class="form-label">Category image</label>
                                            <input class="form-control" name="mycatimg" type="file" id="formFile">
                                            <div id="err_formfile"></div>
                                            <div id="previewimg_holder" class="mt-3">
                                                <img src="" alt="" id="previewimg">
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="subinputEmail4_div">
                                            <label for="inputEmail4" class="form-label">Sub Category</label>
                                            <input type="text" name="mysubCategory" class="form-control" id="subinputEmail4">
                                            <div id="err_subcategory"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                <button type="button" id="category_submit_button" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <!-- Update Modal -->
            <div class="modal fade" id="updatecategory_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="categories_dataform" enctype="multipart/form-data">
                            <input type="hidden" name="actionname" value="updatecategories_form">
                            <!-- <input type="hidden" name="mycat_or_subcat" id="cat_or_subcat" value="none"> -->
                            <div id="updateanchor_test"></div>
                            <div class="modal-body">
                                <div class="mt-3" id="category_fields">
                                    <div class="row">
                                        <div class="col-md-6" id="updatecategory_dropdown_div">
                                            <label for="inputEmail4" class="form-label">Category</label>
                                            <select class="form-select" name="mycategory_dropdown" id="updatecategory_dropdown" aria-label="Default select example">
                                                <option value="Select_category">Select category</option>
                                                <?php
                                                $categorydropdown_sql = "SELECT * FROM `categories`";
                                                $categorydropdown_join = mysqli_query($connect, $categorydropdown_sql);
                                                while ($catdropdown_list = mysqli_fetch_assoc($categorydropdown_join)) { ?>
                                                    <option value="<?php echo $catdropdown_list['cat_id'] ?>"><?php echo $catdropdown_list['categories'] ?></option>
                                                    <?php }
                                                ?>
                                            </select>
                                            <div id="update_err_category_dropdown"></div>
                                        </div>
                                        <div class="col-md-6" id="updateinputEmail4_div">
                                            <label for="updateinputEmail4" class="form-label">Category</label>
                                            <input type="text" name="myCategory" class="form-control" id="updateinputEmail4">
                                            <div id="update_err_category"></div>
                                        </div>
                                        <div class="col-md-6" id="inputPassword4_div">
                                            <label for="updateinputPassword4" class="form-label">Tags</label>
                                            <input type="text" name="myTags" class="form-control" id="updateinputPassword4">
                                            <div id="update_err_tags"></div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6" id="formFile_div">
                                            <label for="formFile" class="form-label">Category image</label>
                                            <input class="form-control" name="mycatimg" type="file" id="formFile">
                                            <div id="update_err_formfile"></div>
                                            <div id="updatepreviewimg_holder" class="mt-3">
                                                <img src="" alt="" id="updatepreviewimg">
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="updatesubinputEmail4_div">
                                            <label for="inputEmail4" class="form-label">Sub Category</label>
                                            <input type="text" name="mysubCategory" class="form-control" id="updatesubinputEmail4">
                                            <div id="update_err_subcategory"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                <button type="button" id="updatecategory_submit_button" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <!-- View Modal -->
            <div class="modal fade" id="viewcategory_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">View Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mt-3">
                                <div class="col-md-6 d-flex">
                                    <div class="fw-bold text-dark">
                                        Category:
                                    </div>
                                    <div id="cat_div" class="ms-3">

                                    </div>
                                </div>
                                <div class="col-md-6 d-flex">
                                    <div class="fw-bold text-dark">
                                        Tags:
                                    </div>
                                    <div id="tags_div" class="ms-3" style="word-break: break-word;">
    
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 d-flex">
                                    <div class="fw-bold text-dark">
                                        Subcategory:
                                    </div>
                                    <div id="subcat_div" class="ms-3">
    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="fw-bold text-dark">
                                        Category Image:
                                    </div>
                                    <div id="catimg_div">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php
            include "footer.php";
            ?>