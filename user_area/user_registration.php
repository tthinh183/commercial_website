<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootraps-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="./style.css">
    <title>User-Register</title>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control"
                        placeholder="Enter your username" autocomplete="off" required="required"
                        name="user_username">
                    </div>
                    <!-- email -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control"
                        placeholder="Enter your email" autocomplete="off" required="required"
                        name="user_email">
                    </div>
                    <!-- image -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control"
                        placeholder="Enter your email" autocomplete="off" required="required"
                        name="user_image">
                    </div>
                    <!-- password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control"
                        placeholder="Enter your password" autocomplete="off" required="required"
                        name="user_password">
                    </div>
                    <!-- confirm password -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control"
                        placeholder="Confirm password" autocomplete="off" required="required"
                        name="conf_user_password">
                    </div>
                    <!-- address -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control"
                        placeholder="Enter your address" autocomplete="off" required="required"
                        name="user_address">
                    </div>
                    <!-- contact -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control"
                        placeholder="Enter your mobile number" autocomplete="off" required="required"
                        name="user_contact">
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3
                        border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?
                        <a href="user_login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    if(isset($_POST['user_register'])){
        $user_username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
        $conf_user_password = $_POST['conf_user_password'];
        $user_address = $_POST['user_address'];
        $user_contact = $_POST['user_contact'];  
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        $user_ip = getIPAddress();
        //select query
        $select_query = "select * from `user_table` where username = '$user_username'
        or user_email = '$user_email'";
        $result = mysqli_query($con, $select_query);
        $row_count = mysqli_num_rows($result);
        if($row_count>0){
            echo "<script>alert('Username already exist')</script>";
        }else if($user_password!=$conf_user_password){
            echo "<script>alert('Password do not match')</script>";
        }else{
        //insert query
        move_uploaded_file($user_image_tmp,"./user_image/$user_image");
        $insert_query = "insert into `user_table` (username,user_email,user_password,
        user_image,user_ip,user_address,user_mobile) values ('$user_username','$user_email',
        '$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
        $execute_sql = mysqli_query($con,$insert_query);
        if($execute_sql){
            echo "<script>alert('Data insert successfully')</script>";
        }else{
            die(mysqli_error($con));
        }
        }
        //select cart item
        $select_cart_item = "select * from `cart_details` where ip_address = '$user_ip'";
        $result_cart = mysqli_query($con,$select_cart_item);
        $row_count_cart = mysqli_num_rows($result_cart);
        if($row_count_cart>0){
            $_SESSION['username'] = $user_username;
            echo "<script>alert('You have an item in your cart')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }else{
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
?>