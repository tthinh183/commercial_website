<?php
    if(isset($_GET['edit_brand'])){
        $edit_brand = $_GET['edit_brand'];
        $get_brand = "select * from `brands` where brand_id = '$edit_brand'";
        $result = mysqli_query($con,$get_brand);
        $row= mysqli_fetch_assoc($result);
        $brand_title = $row['brand_tittle'];
    }
?>
<div class="container mt-3">
    <h1 class="text-center">Edit Brand</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" name="brand_title" id="brand_title"
            class="form-control" required="required" value="<?php echo $brand_title; ?>">
        </div>
        <input type="submit" name="edit_brand" value="Update" class="btn btn-info px-3 mb-3">
    </form>
</div>
<?php
    if(isset($_POST['edit_brand'])){
        $brand_title = $_POST['brand_tittle'];
        $update_brand = "update `brands` set brand_tittle = '$brand_title' where 
        brand_id =$edit_brand";
        $result_update = mysqli_query($con,$update_brand);
        if($result_update){
            echo "<script>alert('Update successfully')</script>";
            echo "<script>window.open('./index.php?view_brands','_self')</script>";
        }
    }
?>