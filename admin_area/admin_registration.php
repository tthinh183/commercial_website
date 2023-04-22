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
                        <p class="small fw-bold mt-2 p1-1">Don't you have an account <a href="admin_login.php">
                            Login
                        </a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>