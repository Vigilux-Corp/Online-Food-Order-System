<?php
include('partials/menu.php');
?>
    <div class="main-content">
    <div class="wrapper">
    <h1>Manage Admin</h1><br><br>

    <?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];

        unset($_SESSION['add']);    
        }
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];

        unset($_SESSION['delete']);    
        }
        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];

        unset($_SESSION['update']);    
        }
        
        if(isset($_SESSION['user_not_found'])){
            echo $_SESSION['user_not_found'];

        unset($_SESSION['user_not_found']);    
        }
        if(isset($_SESSION['user_found'])){
            echo $_SESSION['user_found'];

        unset($_SESSION['user_found']);    
        }
        if(isset($_SESSION['pwd_not_match'])){
            echo $_SESSION['pwd_not_match'];

        unset($_SESSION['pwd_not_match']);    
        }
        if(isset($_SESSION['password'])){
            echo $_SESSION['password'];

        unset($_SESSION['password']);    
        }
        
    ?>
    <br><br>
    <a href="add-admin.php" class="btn-primary">Add Admin</a><br><br>
    <table class="tbl-full">
        <tr>
            <th>S.N.</th>
            <th>Full name</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>

        <?php 
            $sql = "SELECT * FROM `tbl-admin`";
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            if($result==TRUE){
                $count = mysqli_num_rows($result);
                $sn = 1;
                if($count>0){
                    while($rows = mysqli_fetch_assoc($result)){
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

                        ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $full_name; ?></td>
                        <td><?php echo $username; ?></td>
                        <td>
                        <a href="update_password.php?id=<?php echo $id; ?>" class="btn-primary">Change password</a>
                        <a href="update_admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                        <a href="delete_admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                        </td>
                    </tr>
                        <?php
                    }
                }else{

                }
            }
        ?>
    </table>
    </div>
    </div>
    <?php
include('partials/footer.php');?>

</body>
</html>