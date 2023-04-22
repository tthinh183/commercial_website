<?php
    if(isset($_GET['delete_category'])){
        $delete_cat = $_GET['delete_category'];
        $delete_query = "delete from `categories` where category_id=$delete_cat";
        $delete_rs = mysqli_query($con,$delete_query);
        if($delete_rs){
            echo "<script>alert('Delete successfully')</script>";
            echo "<script>window.open('./index.php?view_categories','_self')</script>";
        }
    }
?>