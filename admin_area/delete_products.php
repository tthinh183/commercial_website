<?php
    if(isset($_GET['delete_products'])){
        $delete_id= $_GET['delete_products'];   
        $delete_query = "delete from `products` where product_id = $delete_id";
        $resul_delete = mysqli_query($con, $delete_query);
        if($resul_delete ){
            echo "<script>alert('delete successfully')</script>";
            echo "<script>window.open('./insert_products.php','_self')</script>";
        }
    }
?>