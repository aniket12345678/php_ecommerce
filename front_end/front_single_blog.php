<?php
include "front_header.php";

$id = $_GET['id'];

if (!isset($id) || empty($id)) {
    header("Location: index.php");
}

$sql = "SELECT * FROM `blog` WHERE `b_id`='$id'";
$join = mysqli_query($connect,$sql);
$data = mysqli_fetch_assoc($join);

$img = $data['img'];
$content = $data['content'];
$title = $data['title'];

$full_date = explode(" ",$data['publish']);
$date = date_create($full_date[0]);
$publish_date = date_format($date,"d,M y");
?>

<div id="main_hero" class="container content_heading" style="margin-bottom: 7%;">
    <h1 class="text-center fw-bold" style="margin-top: 13%;">Blog Page</h1>
    <div class="mt-5 text-center">
        <img src="../blog_images/<?php echo $img; ?>" alt="" style="border-radius: 23px;width: 85%;">
    </div>
    <div class="container" style="width: 85%;">
        <div class="mt-4 d-flex justify-content-between">
            <h4 class="fw-bold" style="color: #173a56;">
                <?php echo $title; ?>
            </h4>
            <div class="fw-bold">
                <?php echo $publish_date; ?>
            </div>
        </div>
        <hr>
        <div>
            <?php echo $content; ?>
        </div>
    </div>
</div>

<?php
include "front_footer.php";
?>