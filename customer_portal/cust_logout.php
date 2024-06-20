<?php
session_start();
session_unset();
header("Location: http://localhost/admin_panel/front_end/customer_signup.php");
?>