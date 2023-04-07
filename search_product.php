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
          <a class="nav-link" href="./cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price: <?php total_cart_price();?></a>
        </li>
      </ul>
      <form class="d-flex" role="search"  action="" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
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
<!-- fourth child -->
<div class="row px-3">
  <div class="col-md-10">
                <div class="row">
                  <!-- fetching product -->
                    <?php
                    // calling function
                    search_product();
                      get_unique_category();
                      get_unique_brand();
                    ?>
      <!-- row end -->
    </div>
    <!-- col end -->
  </div>
  <!-- product -->

  <div class="col-md-2 bg-secondary p-0">
    <!-- brand to be displayed -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="" class="nav-link text-light"><h5>Delivery Brands</h5></a>
      </li>
      <?php
        //calling function
        getbrands();
      ?>
    </ul>
    <!-- categories to be displayed -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="" class="nav-link text-light"><h5>Categories</h5></a>
      </li>
      <?php
        //calling function
        getcategories();
      ?>
    </ul>
  </div>
  <!-- sidenav -->
    
</div>
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
