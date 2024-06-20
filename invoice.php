<?php
include "header.php";
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="bg-light rounded text-center p-4">
            <div class="d-flex justify-content-between align-items-center">
                <button type="button" id="add_invoice_product_button" class="btn btn-primary">
                    Add Product
                </button>
                <button type="button" class="btn btn-primary">
                    User
                </button>
            </div>
            <div id="add_products_field">
                <div class="row">
                    <div class="col-md-6">
                        <select name="" id="" class="form-control">
                            <option value="">Select Category</option>
                            <?php
                                $fetch_categories_sql = "SELECT * FROM `categories` WHERE `status`='1'";
                                $fetch_categories_join = mysqli_query($connect, $fetch_categories_sql);
                                while ($fetch_categories_data = mysqli_fetch_assoc($fetch_categories_join)) { ?>
                                    <option value=""><?php echo $fetch_categories_data['categories'] ?></option>
                                <?php }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select name="" id="" class="form-control">
                            <option value="">Select Product</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>