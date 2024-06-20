<?php
include "header.php";
?>


        
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="d-flex align-items-baseline justify-content-between">
                                <h6 class="mb-4">Blogs</h6>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addblog_modal">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-dark table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr. no</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Title</th>
                                            <th scope="col" style="width: 21%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=0;
                                        $products_sql = "SELECT * FROM `blog`";
                                        $products_join = mysqli_query($connect, $products_sql);
                                        while ($product_list = mysqli_fetch_assoc($products_join)) { ?>
                                            <tr>
                                                <th scope="row"><?php echo ($i+1); ?></th>
                                                <td><img src="blog_images/<?php echo $product_list['img']; ?>" alt="" class="img-thumbnail" style="width: 102px;height: 116px;"></td>
                                                <td><?php echo $product_list['title']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary m-2 update_blog" value="<?php echo $product_list['b_id']; ?>" data-bs-toggle="modal" data-bs-target="#updateblog_modal">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-primary m-2 delete_blog" value="<?php echo $product_list['b_id']; ?>">
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


            <!-- Add Blog Modal -->
            <div class="modal fade" id="addblog_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Blog</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="blogs_dataform">
                            <div id="anchor_blogs"></div>
                            <input type="hidden" name="actionname" value="blogs_form">
                            <div class="modal-body">
                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="" class="form-label">Title</label>
                                        <input type="text" name="myblog_title" id="blog_title" class="form-control" placeholder="Title" aria-label="Last name">
                                        <div id="err_blog_title"></div>
                                    </div>
                                    <div class="col">
                                        <label for="proFile" class="form-label">Blog image</label>
                                        <input class="form-control" name="myblogimg" type="file" id="blogFile">
                                        <div id="err_blogFile"></div>
                                        <div id="blogimg_holder" class="mt-3">
                                            <img src="" alt="" id="blogimg">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" name="myblog_description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Blog description</label>
                                    <div id="err_blog_description"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <span id="blog_success"></span>
                                <button type="button" id="blog_submit_button" class="btn btn-primary">Add Blog</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Update Blog Modal -->
            <div class="modal fade" id="updateblog_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Blog</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="updateblogs_dataform">
                            <div id="updateanchor_blogs"></div>
                            <input type="hidden" name="actionname" value="updateblogs_form">
                            <input type="hidden" name="myhidden_id" id="hidden_id" value="">
                            <input type="hidden" name="myold_pimg" id="oldpblogimg" value="">
                            <div class="modal-body">
                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="" class="form-label">Title</label>
                                        <input type="text" name="updatemyblog_title" id="updateblog_title" class="form-control" placeholder="Title" aria-label="Last name">
                                        <div id="updateerr_blog_title"></div>
                                    </div>
                                    <div class="col">
                                        <label for="proFile" class="form-label">Blog image</label>
                                        <input class="form-control" name="updatemyblogimg" type="file" id="updateblogFile">
                                        <div id="err_blogFile"></div>
                                        <div id="updateblogimg_holder" class="mt-3">
                                            <img src="" alt="" id="updateblogimg" style="height: 150px; width: 150px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" name="myblog_description" placeholder="Leave a comment here" id="updatefloatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Blog description</label>
                                    <div id="updateerr_blog_description"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <span id="updateblog_success"></span>
                                <button type="button" id="updateblog_submit_button" class="btn btn-primary">Update Blog</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            <?php
            include "footer.php";
            ?>