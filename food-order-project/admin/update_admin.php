<?php
include('partials/menu.php');
?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Admin</h1>
            <br><br>
            <?php
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM `tbl-admin` WHERE id=$id";
                    $result = mysqli_query($conn, $sql);
                    if($result==TRUE){
                        $count = mysqli_num_rows($result);
                        if($count==1){
                            $row = mysqli_fetch_assoc($result);
                            $full_name = $row['full_name'];
                            $username = $row['username'];
                        }else{
                            header('location:'.'manage-admin.php');
                        }
                    }
            ?>
        <form action="" method="POST">
            <table class="tbl_30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name"  style="padding: 1%;" value="<?php echo $full_name;?>"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"  style="padding: 1%;" value="<?php echo $username;?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="add admin" class="btn-secondary" style="padding: 1%;">
                    </td>
                </tr>
            </table>
        </form>
        </div>
    </div>
<?php
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        $sql = "UPDATE `tbl-admin` SET `full_name`='$full_name',`username`='$username' WHERE id=$id";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        if($result==TRUE){
        $_SESSION['update'] = "<h3 style='color: green;'>Admin Updated Successfully</h3>";
        header('location:'.'manage-admin.php');
        }else{
            header('location:'.'manage-admin.php');
            $_SESSION['update'] = "<h3 style='color: red;'>Admin Update Failed</h3>";
        }
    }
?>
<?php
include('partials/footer.php');
?>