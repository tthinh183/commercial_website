<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
    }
    //getting total item and total price of all item
    $get_ip_address = getIPAddress();
    $total = 0;
    $cart_query = "select * from `cart_details` where ip_address = '$get_ip_address'";
    $result_cart_price = mysqli_query($con,$cart_query);
    $count_product = mysqli_num_rows($result_cart_price);
    $invoice_number = mt_rand();
    $status = 'pending';
    while($row_price=mysqli_fetch_array($result_cart_price)){
        $product_id = $row_price['product_id'];
        $select_product = "select * from `products` where product_id = $product_id";
        $run_price = mysqli_query($con,$select_product);
        while($row_produce_price=mysqli_fetch_array($run_price)){
            $produce_price = array($row_product_price['product_price']);
            $product_value = array_sum($product_price);
            $total += $product_value;
        }
    }
    //getting quantity from cart
    $get_cart = "select * from `cart_details`";
    $run_cart = mysqli_query($con, $get_cart);
    $get_item_quan
?>