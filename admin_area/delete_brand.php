<?php
    if(isset($_GET['delete_brand'])){
        $delete_brand = $_GET['delete_brand'];
        $delete_query = "delete from `brands` where brand_id=$delete_brand";
        $delete_rs = mysqli_query($con,$delete_query);
        if($delete_rs){
            echo "<script>alert('Delete successfully')</script>";
            echo "<script>window.open('./index.php?view_brands','_self')</script>";
        }
    }
?>