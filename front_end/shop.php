<?php
include "front_header.php";

?>
<style>
    @media only screen and (max-width: 600px) {
        #billing_cart_container {
            margin: -11px;
        }
    }
</style>

<div id="main_hero" class="container content_heading" style="margin-bottom: 7%;">
    <h1 class="text-center fw-bold" style="margin-top: 13%;">
        Shop
    </h1>
    <div class="g-5 row mt-5" id="billing_cart_container">
        <div class="col-sm-3">
            <div class="fw-bold text-white px-3 py-1" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="background: #173a56;">
                Categories
            </div>
            <ul id="collapseExample" class=" px-2">
                <?php
                $fetch_categories_sql = "SELECT * FROM `categories`";
                $fetch_categories_join = mysqli_query($connect,$fetch_categories_sql);
                while ($fetch_categories_data = mysqli_fetch_assoc($fetch_categories_join)) { ?>
                    <li class="list-unstyled mt-2">
                        <a href="shop.php?id=<?php echo $fetch_categories_data['cat_id']; ?>" class="text-decoration-none fw-bold">
                            <i class="fa fad fa-arrow-circle-right"></i>&nbsp;<?php echo $fetch_categories_data['categories'] ?>
                        </a>
                    </li>
                    <hr>
                <?php }
                ?>
            </ul>
        </div>
        <div class="col-sm-9">
            <div class="row g-4 product_list_container">
                <?php
                if (isset($_GET['id']) || !empty($_GET['id'])) {
                    $category_id = $_GET['id'];
                    $fetch_products_sql = "SELECT * FROM `products` WHERE `cat_id`='$category_id'";
                }
                else {
                    $fetch_products_sql = "SELECT * FROM `products`";
                }
                $fetch_products_join = mysqli_query($connect,$fetch_products_sql);
                $fetch_products_row = mysqli_num_rows($fetch_products_join);

                if ($fetch_products_row>0) { 
                    while ($fetch_products_data = mysqli_fetch_assoc($fetch_products_join)) { 
                    $product_img = $fetch_products_data['p_img'];
                    ?>
                        <div class="accordion-body col-md-4 col-sm-4 gapprdt pt-4 px-4">
                            <div>
                                <a href="product.php?id=<?php echo $fetch_products_data['p_id']; ?>" target="_blank">
                                    <img src="../product_images/<?php echo $product_img ?>" alt="" style="height: 230px;">
                                </a>
                            </div>
                            <div class="accordion-body product_name text-center">
                                <a href="product.php?id=<?php echo $fetch_products_data['p_id']; ?>" target="_blank" class="text-decoration-none">
                                    <?php echo $fetch_products_data['product']; ?>
                                </a>
                            </div>
                            <div class="text-center currency_price fw-bold">
                                &#8377;<?php echo $fetch_products_data['price']; ?>
                            </div>
                        </div>
                    <?php }
                    ?>
                <?php }
                else {
                    echo "<div class='accordion-body pt-4 px-4'>";
                    echo "<h3>No products are available in this Category</h3>";
                    echo "</div>";
                } ?>
                
            </div>
        </div>
    </div>
</div>

<?php
include "front_footer.php";
?>