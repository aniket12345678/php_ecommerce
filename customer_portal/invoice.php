<?php
include "header.php";

$id = $_SESSION['user']['id'];

$fetch_user_order_sql = "SELECT * FROM `orders` WHERE `user_id`='$id'";
$fetch_user_order_join = mysqli_query($connect, $fetch_user_order_sql);


$fetch_user_order_rows = mysqli_num_rows($fetch_user_order_join);
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <?php
                if ($fetch_user_order_rows!=0) { ?>
                    <h6 class="mb-4">
                        Orders
                    </h6>
                    <div class="table-responsive">
                        <table class="table text-dark table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Sr. no</th>
                                    <th scope="col">Order group code</th>
                                    <th scope="col">Generate Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                while ($fetch_user_order_data = mysqli_fetch_assoc($fetch_user_order_join)) { 
                                    $count++;
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $count; ?>
                                        </td>
                                        <td>
                                            <a href="order_details.php?group_id=<?php echo $fetch_user_order_data['o_id']; ?>">
                                                <?php echo $fetch_user_order_data['order_group_code']; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-evenly">
                                                <div>
                                                    <button type="button" class="btn btn-outline-primary">
                                                        <i class="far fa-file-pdf"></i>
                                                    </button>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-outline-primary">
                                                        <i class="fas fa-file-excel"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                                <tr>
    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>