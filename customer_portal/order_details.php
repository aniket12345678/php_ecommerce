<?php
include "header.php";
$group_id = $_GET['group_id'];

$fetch_user_order_sql = "SELECT * FROM `order_products` WHERE `o_id`='$group_id'";
$fetch_user_order_join = mysqli_query($connect, $fetch_user_order_sql);
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="h-100 bg-light rounded p-4">
                <div class="table-responsive">
                    <table class="table text-dark table-bordered">
                        <thead>
                            <tr>
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
                                    <td><img src="../product_images/<?php echo $fetch_user_order_data['product_img'] ; ?>" alt="" style="width: 80px;height: 80px;" class="img-thumbnail" /></td>
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
    </div>
</div>

<?php
include "footer.php";
?>