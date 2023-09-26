<?php
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>
        <?php
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];

                    }
            ?>
        <form action="" method="POST">
            <table class="tbl_30">
                <tr>
                    <td>Current Password:</td>
                    <td><input type="password" name="current_password"  style="padding: 1%;" placeholder="Current Password"></td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name="new_password"  style="padding: 1%;" placeholder="New Password"></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirm_password"  style="padding: 1%;" placeholder="Confirm Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary" style="padding: 1%;">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    $sql = "SELECT * FROM `tbl-admin` WHERE id=$id AND password='$current_password'";
    $result = mysqli_query($conn, $sql);
            if($result==TRUE){
                $count = mysqli_num_rows($result);
                if($count==1){
                    if($new_password==$confirm_password){

                        // password update query
                    $sql2 = "UPDATE `tbl-admin` SET `password`='$new_password' WHERE id=$id";
                    $result2 = mysqli_query($conn, $sql2);

                    if($result2==TRUE){
                    $_SESSION['password'] = "<h3 style='color: green;'>Password Updated Successfully</h3>";
                    header('location:'.'manage-admin.php');
                    }else{
                        $_SESSION['password'] = "<h3 style='color: red;'>Password Update Failed</h3>";
                        header('location:'.'manage-admin.php');
                    }
                }else{
                        $_SESSION['pwd_not_match'] = "<h3 style='color: red;'>Error_Password missmatch</h3>";
                        header('location:'.'manage-admin.php');
                    }
                    $_SESSION['user_found'] = "<h3 style='color: green;'>User Found Successfully</h3>";
                    header('location:'.'manage-admin.php');
                }else{
                    $_SESSION['user_not_found'] = "<h3 style='color: red;'>User not Found</h3>";
                    header('location:'.'manage-admin.php');
                }
            }
}
?>
<?php
include('partials/footer.php');
?>