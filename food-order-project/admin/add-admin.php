<?php
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        <form action="" method="POST">
            <table class="tbl_30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter Admin Name" style="padding: 1%;"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="Enter username" style="padding: 1%;"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="password" style="padding: 1%;"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="add admin" class="btn-secondary" style="padding: 1%;">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
include('partials/footer.php');
?>
<?php
if(isset($_POST['submit'])){
    $fullname = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    $sql="INSERT INTO `tbl-admin`(`full_name`, `username`, `password`) VALUES ('$fullname','$username','$password')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());
    if($result==TRUE){
        $_SESSION['add'] = "<h2 style='color: green;'>Admin added Successfully</h2>";
        header('location:'.'manage-admin.php');
    }else{
        $_SESSION['add'] = "<h2 style='color: red;'>Failed to add admin</h2>";
        header('location:'.'add-admin.php');
    }
}
?>