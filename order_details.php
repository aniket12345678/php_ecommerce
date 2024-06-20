<?php
include "header.php";

$products_sql = "SELECT * FROM `products`";
$products_join = mysqli_query($connect,$products_sql);
$products_rows = mysqli_num_rows($products_join);

$categories_sql = "SELECT * FROM `categories`";
$categories_join = mysqli_query($connect,$categories_sql);
$categories_rows = mysqli_num_rows($categories_join);

$users_sql = "SELECT * FROM `user_login`";
$users_join = mysqli_query($connect,$users_sql);
$users_rows = mysqli_num_rows($users_join);

$orders_sql = "SELECT * FROM `orders`";
$orders_join = mysqli_query($connect,$orders_sql);
$orders_rows = mysqli_num_rows($orders_join);

$group_id = $_GET['order_group'];

$fetch_user_order_sql = "SELECT * FROM `order_products` WHERE `o_id`='$group_id'";
$fetch_user_order_join = mysqli_query($connect, $fetch_user_order_sql);
?>

          

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">All Orders</h6>
                        <!-- <a href="">Show All</a> -->
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Sr. no</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $count = 0;
                                while ($fetch_user_order_data = mysqli_fetch_assoc($fetch_user_order_join)) { 
                                    $count++;
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><img src="product_images/<?php echo $fetch_user_order_data['product_img'] ; ?>" alt="" style="width: 80px;height: 80px;" class="img-thumbnail" /></td>
                                        <td><?php echo $fetch_user_order_data['product_name'] ; ?></td>
                                        <td>&#8377;<?php echo $fetch_user_order_data['product_price'] ; ?></td>
                                        <td><?php echo $fetch_user_order_data['product_quantity'] ; ?></td>
                                    </tr>
                                <?php }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
            

            <?php
            include "footer.php";
            ?>