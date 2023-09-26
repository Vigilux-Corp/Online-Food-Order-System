<?php include('../config/constants.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-food order system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

    <div class="login">
        <h1 class="text-center">login</h1><br><br>
        <?Php
        if(isset($_SESSION['login'])){
            echo $_SESSION['login'];

        unset($_SESSION['login']);    
        }
        if(isset($_SESSION['no_login_message'])){
            echo $_SESSION['no_login_message'];

        unset($_SESSION['no_login_message']);    
        }
        ?>
        <br><br>
        <form action="" method="POST" class="text-center">
            Username <br>
            <input type="text" name="username" placeholder="Enter username"><br><br>
            Password <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>
            <input type="submit" name="submit" value="login" class="btn-login"><br><br>
        </form>
        <p class="text-center" style="color: grey; text-decoration: none;">All rights reserved. Designed By &copy; <a style="text-decoration: none;" href="#">Albie_Techs</a></p>
    </div>
        
</body>
</html> 
<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

$sql = "SELECT * FROM `tbl-admin` WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count==1){
        $_SESSION['login'] = "<h3 style='color: green;' class='text-center'>login Successful</h3>";
        $_SESSION['user'] = $username;
        header('location:'.'index.php');
    }else{
        $_SESSION['login'] = "<h3 style='color: red;' class='text-center'>Username or Password Missmatch</h3>";
        header('location:'.'login.php');
    }
}
?>