<?php

if(!isset($_SESSION['user'])){
    $_SESSION['no_login_message'] ="<div style='color: purple;' class='text-center' >Please login to access admin panel</div>";
    header('location'.'localhost/food-order/admin/login.php');
}
?>