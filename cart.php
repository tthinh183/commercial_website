<?php
    // connect file
    include('./includes/connect.php');
    include('./functions/common_function.php');
    session_start();
?>  
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce Website</title>
    <!--bootraps-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="./style.css">


</head>
<body>
    <!--navbar-->
      <div class="container-fluid p-0">
            <!-- first child -->
            <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="./images/logo.jpg" alt="" class="logo">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- calling cart function -->
<?php
  cart();
?>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
  <?php
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome guest</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
        </li>";
        }
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='./user_area/user_login.php'>Login</a>
      </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='./user_area/logout.php'>Logout</a>
      </li>";
          }
        ?>
    
  </ul>
</nav>
<!-- third child -->
<div class="bg-light">
  <h3 class="text-center">Hidden store</h3>
  <p class="text-center">Communications is at the heart of commerce and community</p>
</div>
<!-- fourth child table -->
<div class="container">
    <div class="row">
    <form action="" method="post">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan="2">Operations</th>
                </tr>
            </thead>
            <tbody>
                <!-- php code -->
                <?php
                        global $con;
                        $total = 0;
                        $ip = getIPAddress();
                        $cart_query = "select * from `cart_details` where ip_address = '$ip'";
                        $cart_result = mysqli_query($con,$cart_query);
                        $cart_result_count = mysqli_num_rows($cart_result);
                        if($cart_result_count>0){
                        while($row = mysqli_fetch_assoc($cart_result)){
                          $product_id = $row['product_id'];
                          $product_select = "select * from `products` where product_id= $product_id";
                          $product_result = mysqli_query($con,$product_select);
                          while($row_product = mysqli_fetch_array($product_result)){
                            $product_price = array($row_product['product_price']);
                            $price_table = $row_product['product_price'];
                            $product_title = $row_product['product_title'];
                            $product_img1 = $row_product['product_img1'];
                            $value = array_sum($product_price);
                            $total+=$value;
                ?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_img1 ?>" alt="" class="cart_img"></td>
                    <td><input type="text" name="quantity" id="" class="form-input w-50 "></td>
                    <?php
                      $ip = getIPAddress();
                      if(isset($_POST['update_cart'])){
                        $quantity = $_POST['quantity'];
                        $update_query_quantity = "update `cart_details` set quantity = $quantity where
                        ip_address = '$ip'";
                        $product_result_quantity = mysqli_query($con,$update_query_quantity);
                        $total = $total * $quantity;
                        }
                    ?>
                    <td><?php echo $price_table ?></td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                    <td>
                        <!-- <button class="bg-info px-3 border-0 py-2 px-3 mx-3">Update</button> -->
                        <input type="submit" value="Update" name="update_cart" class="bg-info px-3 border-0 py-2 px-3 mx-3">
                        <input type="submit" value="Remove" name="remove_cart" class="bg-info px-3 border-0 py-2 px-3 mx-3">
                    </td>
                </tr>
                <?php }}}
                else{
                  echo "<h2 class = 'text-center text-danger'>Cart is empty</h2>";
                } ?>
            </tbody>
        </table>
        <!-- suptotal -->
        <div class="d-flex mb-5">
          <?php
          global $con;
          $ip = getIPAddress();
          $cart_query = "select * from `cart_details` where ip_address = '$ip'";
          $cart_result = mysqli_query($con,$cart_query);
          $cart_result_count = mysqli_num_rows($cart_result);
          if($cart_result_count>0){
            echo " <h4 class='px-3'>
            Subtotal: <strong class='text-info'><?php echo $total ?></strong>
        </h4>
        <input type='submit' value='Continue Shoping' name='continue_shoping' class='bg-info px-3 border-0 py-2 px-3 mx-3'>
        <button class='bg-secondary px-3 border-0 py-2 p-3'><a href='./user_area/checkout.php'
        class='text-light text-decoration-none'>Check out</a></button>";
          }else{
            echo "<input type='submit' value='Continue Shoping' name='continue_shoping' class='bg-info px-3 border-0 py-2 px-3 mx-3'>";
          }
          if(isset($_POST['continue_shoping'])){
            echo "<script>window.open('index.php','_self')</script>";
          }
          ?>
        </div>
    </div>
</div>
</form>
<!-- function remove item -->
<?php
  function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
      foreach($_POST['removeitem'] as $remove_id){
        echo $remove_id;
        $delete_query = "delete from `cart_details` where product_id=$remove_id";
        $run_delete = mysqli_query($con, $delete_query);
        if($run_delete){
          echo "<script>window.open('cart.php','_self')</script>";
        }
      }
    }
  }
  echo $remove_item = remove_cart_item();
?>
<!-- last child -->
<div class="bg-info p-3 text-center">
  <p>All rights reserved © Designed by Truong Thinh - 2023</p>
</div>
      </div>

<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
</body>
</html>
