<?php
include "header.php";

$user_id = $_SESSION['user']['id'];

$fetch_user_order_sql = "SELECT * FROM `orders` WHERE `user_id`='$user_id'";
$fetch_user_order_join = mysqli_query($connect, $fetch_user_order_sql);
$fetch_user_order_rows = mysqli_num_rows($fetch_user_order_join);

$store_arr = array();
$amount = array();
while ($fetch_user_order_data = mysqli_fetch_assoc($fetch_user_order_join)) {
    array_push($store_arr,$fetch_user_order_data['o_id']);
    array_push($amount,$fetch_user_order_data['net_total']);
}

$string_arr = "'".implode("','",$store_arr)."'";

$total_products_sql = "SELECT * FROM `order_products` WHERE `o_id` IN ($string_arr)";
$total_products_join = mysqli_query($connect, $total_products_sql);
$total_products_rows = mysqli_num_rows($total_products_join);

$last_order_sql = "SELECT * FROM `orders` WHERE `user_id`='$user_id' ORDER BY `o_id` DESC LIMIT 1";
$last_order_join = mysqli_query($connect, $last_order_sql);
$last_order_data = mysqli_fetch_assoc($last_order_join);
$store_full_date = explode(" ",$last_order_data['created_time']);
$date = $store_full_date[0];

$date_format=date_create($date);


?>

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Orders made</p>
                                <h6 class="mb-0"><?php echo $fetch_user_order_rows; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Products bought</p>
                                <h6 class="mb-0"><?php echo $total_products_rows; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Amount spend</p>
                                <h6 class="mb-0">&#8377;<?php echo number_format(array_sum($amount),2) ; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Last Order</p>
                                <h6 class="mb-0"><?php echo date_format($date_format,"j, M Y"); ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            


           


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Widgets End -->


<?php
include "footer.php";
?>