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
?>

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Customers</p>
                                <h6 class="mb-0"><?php echo $users_rows; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Categories</p>
                                <h6 class="mb-0"><?php echo $categories_rows; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Products</p>
                                <h6 class="mb-0"><?php echo $products_rows; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Orders</p>
                                <h6 class="mb-0"><?php echo $orders_rows; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Products sold</h6>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Revenue</h6>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->


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
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Order group code</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Coupon code</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                while ($orders_list = mysqli_fetch_assoc($orders_join)) { 
                                
                                    $i++;
                                    $cust_id = $orders_list['user_id'];
                                    $users_sql = "SELECT * FROM `user_details` WHERE `m_id`='$cust_id'";
                                    $users_join = mysqli_query($connect,$users_sql);
                                    $users_data = mysqli_fetch_assoc($users_join);

                                    if ($orders_list['is_coupon']==0) {
                                        $coupon = "N/A";
                                    }
                                    else {
                                        $cou_id = $orders_list['coupon_id'];
                                        $cou_sql = "SELECT * FROM `coupons` WHERE `id`='$cou_id'";
                                        $cou_join = mysqli_query($connect,$cou_sql);
                                        $cou_data = mysqli_fetch_assoc($cou_join);
                                        $coupon = $cou_data['coupon_code'];
                                    }
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <?php
                                                $full_date_arr = explode(" ",$orders_list['created_time']);
                                                $date=date_create($full_date_arr[0]);
                                                echo date_format($date,"j,M Y");
                                            ?>
                                        </td>
                                        <td><?php echo $users_data['name'] ?></td>
                                        <td><a href="order_details.php?order_group=<?php echo $orders_list['o_id'] ?>"><?php echo $orders_list['order_group_code']; ?></a></td>
                                        <td>&#8377;<?php echo number_format($orders_list['net_total'],2); ?></td>
                                        <td>
                                            <?php echo $coupon; ?>
                                        </td>
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