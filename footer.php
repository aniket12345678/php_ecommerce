<!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a>Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            <!-- Designed By <a href="https://htmlcodex.com">HTML Codex</a> -->
                        <!-- </br> -->
                        <!-- Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/custom.js"></script>

    <script>
    $("#add_invoice_product_button").click(function () { 
        $("#add_products_field").append('<div class="row"><div class="col-md-6"><select name="" id="" class="form-control"><option value="">Select Category</option>'
                            <?php
                                $fetch_categories_sql = "SELECT * FROM `categories` WHERE `status`='1'";
                                $fetch_categories_join = mysqli_query($connect, $fetch_categories_sql);
                                while ($fetch_categories_data = mysqli_fetch_assoc($fetch_categories_join)) { ?>
                                    <option value=""><?php echo $fetch_categories_data['categories'] ?></option>
                                <?php }
                            ?>'</select></div><div class="col-md-6"><select name="" id="" class="form-control"><option value="">Select Product</option></select></div></div>');
    });
    </script>
</body>

</html>