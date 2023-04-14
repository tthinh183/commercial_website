<?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    if(isset($_GET['edit_account'])){
        $user_session_name =$_SESSION['username'];
        $select_query_update = "select * from `user_table` where username = '$user_session_name'";
        $result_query_update = mysqli_query($con, $select_query_update);
        $row_fetch = mysqli_fetch_assoc($result_query_update);
        $user_id = $row_fetch['user_id'];
        $username = $row_fetch['username'];
        $user_email = $row_fetch['user_email'];
        $user_address = $row_fetch['user_address'];
        $user_mobile = $row_fetch['user_mobile'];
    }


        if(isset($_POST['user-update'])){
            $update_id = $user_id;
            $username = $_POST['user-username'];
            $user_email = $_POST['user-email'];
            $user_address = $_POST['user-address'];
            $user_mobile = $_POST['user-mobile'];
            $user_img = $_FILES['user-image']['name'];
            $user_img_tmp = $_FILES['user-image']['tmp_name'];
            move_uploaded_file($user_img_tmp,"./user_image/$user_img");
            //update query
            $update_data = "update `user_table` set username='$username',
            user_email='$user_email',user_image = '$user_img',user_address='$user_address',user_mobile='$user_mobile' where
            user_id = '$update_id'";
            $result_update = mysqli_query($con, $update_data);
            if($result_update){
                echo "<script>alert('data update success)</script>";
                echo "<script>window.open('logout.php','_self')</script>";
            }
        }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $username ?>" name="user-username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" name="user-email" value="<?php echo $user_email ?>">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto" name="user-image">
            <img src="./user_image/<?php echo $user_img ?>" class="edit_img" alt="">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user-address" value="<?php echo $user_address ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user-mobile" value="<?php echo $user_mobile ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" value="Update" class="bg-info py-2 px-3 border-0" name="user-update">
        </div>
    </form>
</body>
</html>