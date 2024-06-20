<?php
include "front_header.php";
?>

<div id="main_hero" class="container content_heading" style="margin-bottom: 7%;">
    <h1 class="text-center fw-bold" style="margin-top: 13%;">Contact us</h1>

    <div class="mapouter mt-4 mb-4">
        <div class="gmap_canvas">
            <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=ambaji road,gopipura,surat,gujarat,India&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">

            </iframe>
            <a href="https://mcpenation.com/">
                MCPE Nation
            </a>
        </div>
        <style>
            .mapouter {
                position:relative;
                text-align:right;
                width:100%;
                height:400px;
            }
            .gmap_canvas {
                overflow:hidden;
                background:none!important;
                width:100%;
                height:400px;
            }
            .gmap_iframe {
                height:400px!important;
            }
        </style>
    </div>

    <div class="row">
        <div class="col" id="contact_logo">
            <h2>
                Contact us
            </h2>
            <p>
                There are many ways to contact us. You may drop us a line, give us a call or send an email, choose what suits you the most.
            </p>
            <p>
                +91 8780552358
                <br>
                aniketadak148@gmail.com
            </p>
            <h2>
                Follow us
            </h2>
            <p>
                <a href="https://www.instagram.com/ash_______123/?hl=en" class="text-decoration-none">
                    <img src="front_img/instagram.png" alt="" style="width: 10%;">
                </a>
                <a href="https://www.linkedin.com/in/aniket-adak-3b46b4134/" class="text-decoration-none">
                    <img src="front_img/linkedin.png" alt="" style="width: 10%;">
                </a>
                <a href="https://www.facebook.com/aniket.adak.543/" class="text-decoration-none">
                    <img src="front_img/meta.png" alt="" style="width: 10%;">
                </a>
                <a href="mailto:aniketadak148@gmail.com" class="text-decoration-none">
                    <img src="front_img/gmail.png" alt="" style="width: 10%;">
                </a>
                <!-- <i class="fa fa-linkedin"></i>
                <i class="fa fa-instagram"></i> -->
            </p>
        </div>
        <div class="col">
            <h2>
                Get in touch with us
            </h2>
            <p>
                Fill out the form below to recieve a free and confidential.
            </p>
            <div class="row g-3 mt-3">
                <div class="col">
                    <input type="text" class="form-control px-4 py-3" placeholder="Name" aria-label="First name">
                </div>
            </div>
            <div class="row g-3 mt-2">
                <div class="col">
                    <input type="email" class="form-control px-4 py-3" placeholder="Eamil" aria-label="First name">
                </div>
            </div>
            <div class="row g-3 mt-2">
                <div class="col">
                    <input type="number" class="form-control px-4 py-3" placeholder="Phone number" aria-label="First name">
                </div>
            </div>
            <div class="form-floating mt-4">
                <textarea class="form-control" style="height: 100px;" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Comments</label>
            </div>
            <div class="mt-3">
                <button type="button" style="background: #173a56;" class="text-white accordion-body border-0">Send message</button>
            </div>
        </div>
    </div>

</div>


<?php
include "front_footer.php";
?>