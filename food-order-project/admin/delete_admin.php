<?php
include('../config/constants.php');
echo $id = $_GET['id'];
$sql = "DELETE FROM `tbl-admin` WHERE id=$id";
$result = mysqli_query($conn, $sql) or die(mysqli_error());
        if($result==TRUE){
        $_SESSION['delete'] = "<h3 style='color: green;'>Admin deleted Successfully</h3>";
        header('location:'.'manage-admin.php');
        }else{
            header('location:'.'manage-admin.php');
            $_SESSION['delete'] = "<h3 style='color: red;'>Admin Deletion Failed</h3>";
        }
?>