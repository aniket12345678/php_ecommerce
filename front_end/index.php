<?php
include "front_header.php";
?>
        <div id="main_hero" class="container-fluid">
            <div class="row">
                <div class="col-md-6 mySlides" id="main_hero_content">
                    <h1 class="mb-4">
                        <span>
                            Sale 20% Off
                        </span>
                        <br>
                        On Everything
                    </h1>
                    <p class="mb-4">
                        Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam maxime accusamus enim dignissimos ea
                    </p>
                </div>
                <div class="col-md-6 mySlides" id="main_hero_content">
                    <h1 class="mb-4">
                        <span>
                            One stop solution
                        </span>
                        <br>
                        New Arrivals
                    </h1>
                    <p class="mb-4">
                        Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                    </p>
                </div>
                <div class="col-md-6 mySlides" id="main_hero_content">
                    <h1 class="mb-4">
                        <span style="word-break: break-word;">
                            Shopping junction
                        </span>
                        <br>
                        Men, Women and Kids
                    </h1>
                    <p class="mb-4">
                        Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="../slider-bg-removebg-preview.png" alt="">
                </div>
            </div>
        </div>

        <div class="content_heading">
            <h1 class="text-center fw-bold mb-5 mt-5">Our Categories</h1>
            <div class="d-flex justify-content-around py-4 container">
                <?php
                $i =0;
                while ($cat_list = mysqli_fetch_assoc($join)) { 
                    if ($cat_list['categories']=="Clothing") {
                        $src = "front_img/laundry.png";
                    }
                    elseif ($cat_list['categories']=="Books") {
                        $src = "front_img/book.png";
                    }
                    elseif ($cat_list['categories']=="Bags") {
                        $src = "front_img/online-shopping.png";
                    }
                    elseif ($cat_list['categories']=="Gadgets & Devices") {
                        $src = "front_img/gadget.png";
                    }
                    else {
                        $src = "front_img/accessories.png";
                    }
                    ?>

                    <div class="card card_numbers border-0" style="width: 18rem;">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?php echo $src; ?>" alt="" class="border-0 img-thumbnail">
                            </div>
                            <h5 class="card-title text-center fw-bold mt-3">
                                <?php echo $cat_list['categories']; ?>
                            </h5>
                            <p class="card-text text-center">
                                <?php echo $cat_list['tags']; ?>
                            </p>
                            <div class="text-center">
                                <a href="#" class="card-link">
                                    Card link
                                </a>
                                <a href="#" class="card-link">
                                    Another link
                                </a>
                            </div>
                        </div>
                    </div>

                <?php 
                $i++;
                }
                ?>
            </div>
        </div>


        <div class="content_heading">
            <h1 class="fw-bold text-center" style="margin-bottom: 6%;">Why Shop With Us</h1>
            <div class="container" id="why_shop_with_us">
            
                <div class="row">
                    <div class="col">
                        <div class="card border-0" style="width: 20rem;">
                            <div class="card-body text-white">
                                <div class="p-4 text-center">
                                    <i class="fas fa-smile fa-3x"></i>
                                </div>
                                <h5 class="card-title text-center text-white fw-bold mt-2 mb-4">Free Shiping</h5>
                                <p class="card-text text-center mb-3">variations of passages of Lorem Ipsum available</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0" style="width: 20rem;">
                            <div class="card-body text-white">
                                <div class="p-4 text-center">
                                    <i class="fas fa-truck fa-3x"></i>
                                </div>
                                <h5 class="card-title text-center text-white fw-bold mt-2 mb-4">Fast Delivery</h5>
                                <p class="card-text text-center mb-3">variations of passages of Lorem Ipsum available</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0" style="width: 20rem;">
                            <div class="card-body text-white">
                                <div class="p-4 text-center">
                                    <!-- <i class="fas fa-badge-check fa-3x"></i> -->
                                    <i class="fas fa-medal fa-3x"></i>
                                </div>
                                <h5 class="card-title text-center text-white fw-bold mt-2 mb-4">Best Quality</h5>
                                <p class="card-text text-center mb-3">variations of passages of Lorem Ipsum available</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content_heading">
            <h1 class="text-center fw-bold mb-5" style="margin-top: 10%;">New Arrivals</h1>
            <div class="container">
                <div class="row">
                    <div class="newsplide">
                        <div class="splide__track">
                            <div class="splide__list">
                                <?php
                                $latest_arrival_sql = "SELECT * FROM `products` ORDER BY `p_id` DESC LIMIT 6";
                                $latest_arrival_join = mysqli_query($connect,$latest_arrival_sql);
                                while ($latest_arrival_list = mysqli_fetch_assoc($latest_arrival_join)) { ?>
                                    <div class="col-sm-4 splide__slide m-2">
                                        <a href="product.php?id=<?php echo $latest_arrival_list['p_id'] ?>" target="_blank" class="text-decoration-none">
                                            <div class="card bg-white text-white border-0">
                                                <div class="text-center">
                                                    <img src="../product_images/<?php echo $latest_arrival_list['p_img']; ?>" alt="" class="w-50">
                                                </div>
                                                <div class="card-body text-black">
                                                    <h5 class="text-center card-title fw-bold"><?php echo $latest_arrival_list['product']; ?></h5>
                                                    <!-- <p class="card-text" style="text-align: justify;">
                                                        <?php echo $latest_arrival_list['product_desc']; ?>
                                                    </p> -->
                                                    <div class="text-center currency_price fw-bold">
                                                        &#8377;<?php echo $latest_arrival_list['price']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="background: #d6d6d6;">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <img src="../pro_images/download_6-removebg-preview.png" alt="">
                    </div>
                    <div class="col">
                        Sale Ends in <span id="current_time"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="content_heading" style="margin-bottom: 7%;">
            <h1 class="text-center fw-bold mb-5 mt-5">Productly Diaries</h1>
            <div class="container">
                <div class="row">
                    <div class="splide">
                        <div class="splide__track">
                            <div class="splide__list">
                                <?php
                                    $blog_sql = "SELECT * FROM `blog` ORDER BY `b_id` DESC LIMIT 5";
                                    $blog_join = mysqli_query($connect,$blog_sql);
                                    while ($blog_list = mysqli_fetch_assoc($blog_join)) { 
                                        $blog_img = $blog_list['img'];
                                        $arr = explode(" ",$blog_list['content']);
                                        $full_date = explode(" ",$blog_list['publish']);
                                        $date = date_create($full_date[0]);
                                        $publish_date = date_format($date,"d,M y");
                                        ?>
                                        <div class="col-sm-4 splide__slide m-2">
                                            <a href="front_single_blog.php?id=<?php echo $blog_list['b_id']; ?>" target="_blank" class="text-decoration-none">
                                                <div class="card bg-white text-white border-0">
                                                    <div class="" style="background: url(../blog_images/<?php echo $blog_img; ?>);height: 170px;background-size: cover;border-top-right-radius: 19px;border-top-left-radius: 19px">
                                                        <!-- <img src="../blog_images/<?php echo $blog_list['img']; ?>" alt="" class="w-50"> -->
                                                    </div>
                                                    <div class="fw-bold px-4 py-1 text-white" style="position: absolute;background: rebeccapurple;top: 138px;">
                                                        <?php echo $publish_date; ?>
                                                    </div>
                                                    <div class="card-body text-white bg-black" style="border-bottom-left-radius: 19px;border-bottom-right-radius: 19px;">
                                                        <h5 class="card-title fw-bold text-white text-center"><?php echo $blog_list['title']; ?></h5>
                                                        <div class="currency_price text-white text-center">
                                                            <?php
                                                                // for ($i=0; $i<20; $i++) { 
                                                                //     echo $arr[$i];
                                                                // }
                                                                echo "#Blog".$blog_list['b_id'];
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>
        <script>

            setInterval(current_time, 1000);

            function current_time() {
                let full_date = new Date();
                $("#current_time").html(full_date);
            }

            var slideIndex = 0;
            carousel();

            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i<x.length; i++) {
                    x[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > x.length)
                {
                    slideIndex = 1
                }
                x[slideIndex-1].style.display = "block";
                setTimeout(carousel, 2000);
            }

            var splide = new Splide('.splide', {
                type: 'loop',
                perPage: 3,
                rewind: true,
            });

            splide.mount();

            var newsplide = new Splide('.newsplide', {
                type: 'loop',
                perPage: 3,
                rewind: true,
            });

            newsplide.mount();
        </script>

        <?php include "front_footer.php"; ?>