<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_cat'])){
        $category_title = $_POST['cat_title'];
        //select data from database
        $select_query = "select * from `categories` where category_tittle = '$category_title'";
        $resul_select = $result = mysqli_query($con,$select_query);
        $number = mysqli_num_rows($resul_select);
        if($number > 0){
            echo "<script>alert('This category has been inside the database')</script>";
        }else{
        //insert data to database
        $insert_query = "insert into `categories` (category_tittle) values ('$category_title')";
        $result = mysqli_query($con,$insert_query);
        if($result){
            echo "<script>alert('Category has been inserted successfully')</script>";
        }
        }
    }
?>
<h2 class="text-center">Insert Category</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <!-- <button class="bg-info p-2 my-3 border-0">Insert Categories</button> -->
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="Insert Categories">
    </div>
</form>