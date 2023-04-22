<?php
    if(isset($_GET['edit_category'])){
        $edit_cat = $_GET['edit_category'];
        $get_cat = "select * from `categories` where category_id = '$edit_cat'";
        $result = mysqli_query($con,$get_cat);
        $row= mysqli_fetch_assoc($result);
        $cat_title = $row['category_tittle'];
    }
?>
<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" name="category_title" id="category_title"
            class="form-control" required="required" value="<?php echo $cat_title; ?>">
        </div>
        <input type="submit" name="edit_cat" value="Update" class="btn btn-info px-3 mb-3">
    </form>
</div>
<?php
    if(isset($_POST['edit_cat'])){
        $cat_title = $_POST['category_tittle'];
        $update_cat = "update `categories` set category_tittle = '$cat_title' where 
        category_id =$edit_cat";
        $result_update = mysqli_query($con,$update_cat);
        if($result_update){
            echo "<script>alert('Update successfully')</script>";
            echo "<script>window.open('./index.php?view_categories','_self')</script>";
        }
    }
?>