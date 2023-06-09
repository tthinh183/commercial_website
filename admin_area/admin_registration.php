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
    <title>Admin Registration</title>
    <style>
        .body{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/adminreg.jpg" alt="Admin Registration"
                class="image-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username"
                        placeholder="Enter your username" required="required"
                        class="form-control">
                    </div>
                    <div class="form-outline">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email"
                        placeholder="Enter your email" required="required"
                        class="form-control">
                    </div>
                    <div class="form-outline">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password"
                        placeholder="Enter your password" required="required"
                        class="form-control">
                    </div>
                    <div class="form-outline">
                        <label for="c_password" class="form-label">Confirm Password</label>
                        <input type="password" name="c_password" id="password"
                        placeholder="Enter your confirm password" required="required"
                        class="form-control">
                    </div>
                    <div class="form-outline">
                        <input type="submit" class="bg-info py-2 px-3 border-0"
                        name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Do you already have an account? <a href="admin_login.php"
                        class="link-danger">
                            Login
                        </a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    if(isset($_POST['admin_registration'])){
        $admin_name = $_POST['username'];
        $admin_email = $_POST['email'];
        $admin_password = $_POST['password'];
        $hash_password = password_hash($admin_password,PASSWORD_DEFAULT);
        $c_password = $_POST['c_password'];
        $admin_ip = getIPAddress();
        //select query
        $select_query = "select * from `admin_table` where admin_name = '$admin_name'
        or admin_email = '$admin_email'";
        $result = mysqli_query($con, $select_query);
        $row_count = mysqli_num_rows($result);
        if($row_count>0){
            echo "<script>alert('Username already exist')</script>";
        }else if($admin_password!=$c_password){
            echo "<script>alert('Password do not match')</script>";
        }else{
        //insert query
        $insert_query = "insert into `admin_table` (admin_name,admin_email,admin_password,
        admin_ip) values ('$admin_name','$admin_email',
        '$hash_password','$admin_ip')";
        $execute_sql = mysqli_query($con,$insert_query);
        if($execute_sql){
            echo "<script>alert('Data insert successfully')</script>";
        }else{
            die(mysqli_error($con));
        }
        }
    }
?>