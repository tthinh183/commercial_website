<?php
    //getting product
    function getproducts(){
      global $con;
      if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
        $select_query = "select * from `products` order by rand() limit 0,9";
                      $result_query = mysqli_query($con,$select_query);
                      while($row = mysqli_fetch_assoc($result_query)){
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        $product_img1 = $row['product_img1'];
                        $product_price = $row['product_price'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brand_id'];
                        echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                    <img src='./admin_area/product_images/$product_img1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_description</p>
                      <p class='card-text'>Price: $product_price</p>
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to card</a>
                      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    </div>
                  </div>
                        </div>";
                      }
        }
      }
    }
    //display all
    function display_all(){
      global $con;
      if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
        $select_query = "select * from `products` order by rand()";
                      $result_query = mysqli_query($con,$select_query);
                      while($row = mysqli_fetch_assoc($result_query)){
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        $product_img1 = $row['product_img1'];
                        $product_price = $row['product_price'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brand_id'];
                        echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                    <img src='./admin_area/product_images/$product_img1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_description</p>
                      <p class='card-text'>Price: $product_price</p>
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to card</a>
                      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    </div>
                  </div>
                        </div>";
                      }
        }
      }
    }
    // get unique category
    function get_unique_category(){
      global $con;
      if(isset($_GET['category'])){
        $category_id = $_GET['category'];
        $select_query = "select * from `products` where category_id = $category_id";
                      $result_query = mysqli_query($con,$select_query);
                      $num_of_row = mysqli_num_rows($result_query);
                      if($num_of_row == 0){
                        echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
                      }
                      while($row = mysqli_fetch_assoc($result_query)){
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        $product_img1 = $row['product_img1'];
                        $product_price = $row['product_price'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brand_id'];
                        echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                    <img src='./admin_area/product_images/$product_img1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_description</p>
                      <p class='card-text'>Price: $product_price</p>
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to card</a>
                      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    </div>
                  </div>
                        </div>";
                      }
        }
      }
      // get unique brand
    function get_unique_brand(){
      global $con;
      if(isset($_GET['brand'])){
        $brand_id = $_GET['brand'];
        $select_query = "select * from `products` where brand_id = $brand_id";
                      $result_query = mysqli_query($con,$select_query);
                      $num_of_row = mysqli_num_rows($result_query);
                      if($num_of_row == 0){
                        echo "<h2 class='text-center text-danger'>This is no available brand for service</h2>";
                      }
                      while($row = mysqli_fetch_assoc($result_query)){
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        $product_img1 = $row['product_img1'];
                        $product_price = $row['product_price'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brand_id'];
                        echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                    <img src='./admin_area/product_images/$product_img1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_description</p>
                      <p class='card-text'>Price: $product_price</p>
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to card</a>
                      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    </div>
                  </div>
                        </div>";
                      }
        }
      }
    function getbrands(){
      global $con;
      $select_brands = "select * from `brands`";
        $result_brands = mysqli_query($con,$select_brands);
        while($row_data = mysqli_fetch_assoc($result_brands)){
          $brand_title = $row_data['brand_tittle'];
          $brand_id = $row_data['brand_id'];
          echo "<li class='nav-item'>
          <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
        </li>";
        }
    }
    function getcategories(){
      global $con;
      $select_cat = "select * from `categories`";
        $result_cat = mysqli_query($con,$select_cat);
        while($row_data = mysqli_fetch_assoc($result_cat)){
          $cat_title = $row_data['category_tittle'];
          $cat_id = $row_data['category_id'];
          echo "<li class='nav-item'>
          <a href='index.php?category=$cat_id' class='nav-link text-light'>$cat_title</a>
        </li>";
        }
    }
    function search_product(){
      global $con;
      if(isset($_GET['search_data_product'])){
        $get_search = $_GET['search_data'];
        $select_query = "select * from `products` where product_keyword like '%$get_search%'";
                      $result_query = mysqli_query($con,$select_query); 
                      $num_of_row = mysqli_num_rows($result_query);
                      if($num_of_row == 0){
                        echo "<h2 class='text-center text-danger'>No result match. No
                        products found on this category</h2>";
                      }
                      while($row = mysqli_fetch_assoc($result_query)){
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        $product_img1 = $row['product_img1'];
                        $product_price = $row['product_price'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brand_id'];
                        echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                    <img src='./admin_area/product_images/$product_img1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_description</p>
                      <p class='card-text'>Price: $product_price</p>
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to card</a>
                      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    </div>
                  </div>
                        </div>";
                      }
        }
      }
    function view_detail(){
      global $con;
      if(isset($_GET['product_id'])){
      if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
        $product_id = $_GET['product_id'];
        $select_query = "select * from `products` where product_id =$product_id";
                      $result_query = mysqli_query($con,$select_query);
                      while($row = mysqli_fetch_assoc($result_query)){
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        $product_img1 = $row['product_img1'];
                        $product_img2 = $row['product_img2'];
                        $product_img3 = $row['product_img3'];
                        $product_price = $row['product_price'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brand_id'];
                        echo "<div class='col-md-4'>
                        <div class='card'>
                        <img src='./admin_area/product_images/$product_img1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                          <h5 class='card-title'>$product_title</h5>
                          <p class='card-text'>$product_description</p>
                          <p class='card-text'>Price: $product_price</p>
                          <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to card</a>
                          <a href='index.php' class='btn btn-secondary'>Go home</a>
                        </div>
                      </div>
                        </div>
    
                        <div class='col-md-8'>
                            <div class='col-md-12'>
                                <h4 class='text-center text-info mb-5'>Related product</h4>
                            </div>
                            <div class='col-md-6'>
                            <img src='./admin_area/product_images/$product_img2' class='card-img-top' alt='$product_title'>
                            </div>
                            <div class='col-md-6'>
                            <img src='./admin_area/product_images/$product_img3' class='card-img-top' alt='$product_title'>
                            </div>
                        </div>";
                      }
        }
      }
    }
  }
  function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

// cart function
function cart(){
  global $con;
  $ip = getIPAddress();
  if(isset($_GET['add_to_cart'])){
    $get_p_id = $_GET['add_to_cart'];
    $select_query = "select * from `cart_details` where ip_address='$ip' 
    and product_id = $get_p_id";
    $select_result = mysqli_query($con,$select_query);
    $num_row = mysqli_num_rows($select_result);
    if($num_row > 0){
      echo "<script>alert('This item is already present inside cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }else{
      $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) 
      values ($get_p_id,'$ip',1)";
      $insert_result = mysqli_query($con,$insert_query);
      echo "<script>alert('Item is added to cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
}
//function get cart item number
function cart_item(){
  global $con;
  $ip = getIPAddress();
  if(isset($_GET['add_to_cart'])){
    $select_query = "select * from `cart_details` where ip_address='$ip'";
    $select_result = mysqli_query($con,$select_query);
    $count_cart_item = mysqli_num_rows($select_result);
    }else{
      global $con;
      $ip = getIPAddress();
      $select_query = "select * from `cart_details` where ip_address='$ip'";
      $select_result = mysqli_query($con,$select_query);
      $count_cart_item = mysqli_num_rows($select_result);
    }
    echo $count_cart_item;
  }
  //total price
  function total_cart_price(){
    global $con;
    $total = 0;
    $ip = getIPAddress();
    $cart_query = "select * from `cart_details` where ip_address = '$ip'";
    $cart_result = mysqli_query($con,$cart_query);
    while($row = mysqli_fetch_assoc($cart_result)){
      $product_id = $row['product_id'];
      $product_select = "select * from `products` where product_id= $product_id";
      $product_result = mysqli_query($con,$product_select);
      while($row_product = mysqli_fetch_array($product_result)){
        $product_price = array($row_product['product_price']);
        $value = array_sum($product_price);
        $total+=$value;
      }
    }
    echo $total;
  }
  //get user order details
  function get_user_order_details(){
    global $con;
    $username = $_SESSION['username'];
    $get_detail = "select * from `user_table` where username = '$username'";
    $result_query = mysqli_query($con, $get_detail);
    while($row_query=mysqli_fetch_array($result_query)){
      $user_id = $row_query['user_id'];
      if(!isset($_GET['edit_account'])){
        if(!isset($_GET['my_orders'])){
          if(!isset($_GET['delete_account'])){
            $get_order = "select * from `user_orders` where user_id = '$user_id' and order_status
            ='pending'";
            $result_query_order = mysqli_query($con, $get_order);
            $row_count = mysqli_num_rows($result_query_order);
            echo "<h3 class='text-center'>You have <span class ='text-danger'>$row_count </span>
            pending orders</h3>
            <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
          }else{
            echo "<h3 class='text-center'>You have 0
            pending orders</h3>
            <p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>";
          }
        }
      }
    }
  }
?>