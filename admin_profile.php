<?php
include "header.php";
// print_r($_SESSION);

$id = $_SESSION['id'];
if (empty($id)) {
    header("Location: signin.php");
}

$sql = "SELECT * FROM `admin_login` WHERE `id`='$id'";
$join = mysqli_query($connect,$sql);
$data = mysqli_fetch_assoc($join);

$details_sql = "SELECT * FROM `admin_details` WHERE `m_id`='$id'";
$details_join = mysqli_query($connect,$details_sql);
$details_data = mysqli_fetch_assoc($details_join);

$country = $details_data['country'];
$state = $details_data['state'];

$country_sql = "SELECT * FROM `countries` WHERE `c_id`='$country'";
$country_join = mysqli_query($connect,$country_sql);
$country_data = mysqli_fetch_assoc($country_join);

$state_sql = "SELECT * FROM `states` WHERE `s_id`='$state'";
$state_join = mysqli_query($connect,$state_sql);
$state_data = mysqli_fetch_assoc($state_join);

?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded h-100 p-4">
        <div class="row">
            <div class="col-6 text-center">
                <div class="mb-4" style="height:80%">
                    <img src="img/user.jpg" alt="" class="h-100 img-thumbnail rounded-circle">
                    <div class="bg-white fa-2x position-absolute rounded-circle" style="top: 60%;FONT-WEIGHT: 100;FONT-WEIGHT: 100;FONT-WEIGHT: 100;FONT-WEIGHT: 100;right: 53%;color: black;width: 50px;" >
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" id="profile_edit_button">
                        Edit
                    </button>
                </div>
            </div>
            <div class="col-6">
                <h6 class="mb-4">
                    Profile
                </h6>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="profile_name" value="<?php echo $details_data['name'] ?>" placeholder="name@example.com" readonly>
                    <label for="profile_name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="profile_country" value="<?php echo $country_data['country'] ?>" placeholder="name@example.com" readonly>
                    <label for="profile_country">Country</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="profile_state" value="<?php echo ucfirst(strtolower($state_data['state'])) ?>" placeholder="name@example.com" readonly>
                    <label for="profile_state">State</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="profile_phone" value="<?php echo $details_data['phone_number'] ?>" placeholder="name@example.com" readonly>
                    <label for="profile_phone">Phone</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="profile_email" value="<?php echo $data['email'] ?>" placeholder="name@example.com" readonly>
                    <label for="profile_email">E-mail</label>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>