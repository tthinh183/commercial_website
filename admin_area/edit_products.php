<?php
    if(isset($_GET['edit_products'])){
        $edit_id = $_GET['edit_products'];
        $get_data = "select * from `products` where product_id=$edit_id";
        $result = mysqli_query($con,$get_data);
        $row = mysqli_fetch_assoc($result);
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keyword = $row['product_keyword'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_img1 = $row['product_img1'];
        $product_img2 = $row['product_img2'];
        $product_img3 = $row['product_img3'];
        $product_price = $row['product_price'];
        // fetching category name
        $select_category = "select * from `categories` where category_id =$category_id ";
        $result_category = mysqli_query($con,$select_category);
        $row_category = mysqli_fetch_assoc($result_category);
        $category_title = $row_category['category_tittle'];
        // fetching brand name
        $select_brand = "select * from `brands` where brand_id =$brand_id ";
        $result_brand = mysqli_query($con,$select_brand);
        $row_brand= mysqli_fetch_assoc($result_brand);
        $brand_title = $row_brand['brand_tittle'];
    }
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" class="form-control"
            required="required" value="<?php echo $product_title  ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" name="product_desc" id="product_desc" class="form-control"
            required="required" value="<?php echo $product_description  ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" name="product_keywords" id="product_keywords" class="form-control"
            required="required" value="<?php echo $product_keyword  ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_categories" class="form-label">Product Category</label>
            <select name="product_categories" class="form-select">  
            <?php
                $select_category_all = "select * from `categories`";
                $result_category_all = mysqli_query($con,$select_category_all);
                while($row_category_all = mysqli_fetch_assoc($result_category_all)){
                    $category_title = $row_category_all['category_tittle'];
                    $category_id = $row_category_all['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                
            ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brands" class="form-label">Product Brand</label>
            <select name="product_brands" class="form-select">
            <?php
                $select_brand_all = "select * from `brands`";
                $result_brand_all = mysqli_query($con,$select_brand_all);
                while($row_brand_all = mysqli_fetch_assoc($result_brand_all)){
                    $brand_title = $row_brand_all['brand_tittle'];
                    $brand_id = $row_brand_all['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
                
            ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_img1" class="form-label">Product Image1</label>
            <div class="d-flex">
            <input type="file" name="product_img1" id="product_img1" 
            class="form-control w-50 m-auto"
            required="required">
            <img src="./product_images/<?php echo $product_img1 ?>" alt="" class="edit_image">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_img2" class="form-label">Product Image2</label>
            <div class="d-flex">
            <input type="file" name="product_img2" id="product_img2" 
            class="form-control w-50 m-auto"
            required="required">
            <img src="./product_images/<?php echo $product_img2 ?>" alt="" class="edit_image">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_img3" class="form-label">Product Image3</label>
            <div class="d-flex">
            <input type="file" name="product_img3" id="product_img3" 
            class="form-control w-50 m-auto"
            required="required">
            <img src="./product_images/<?php echo $product_img3 ?>" alt="" class="edit_image">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control"
            required="required" value="<?php echo $product_price ?>">
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_product" value="Update product"
            class="btn btn-info px-3 mb-3 ">
        </div>
    </form>
</div>
<!-- editing product -->
<?php
    if(isset($_POST['edit_product'])){
        $product_title = $_POST['product_title'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];
        $product_categories = $_POST['product_categories'];
        $product_brands = $_POST['product_brands'];
        $product_price = $_POST['product_price'];

        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];

        $temp_img1 = $_FILES['product_img1']['tmp_name'];
        $temp_img2 = $_FILES['product_img2']['tmp_name'];
        $temp_img3 = $_FILES['product_img3']['tmp_name'];
        
        if($product_title=='' or $product_desc=='' or $product_keywords=='' or 
        $product_categories=='' or $product_brands=='' or $product_price=='' or 
        $product_img1=='' or $product_img2=='' or $product_img3==''){
            echo "<script>alert(please fill all the fileds and continue
            the process)</script>";
        }else{
            move_uploaded_file($temp_img1,"./product_images/$product_img1");
            move_uploaded_file($temp_img2,"./product_images/$product_img2");
            move_uploaded_file($temp_img3,"./product_images/$product_img3");
            //query to update
            $update_product = "update `products` set product_title='$product_title',
            product_description = '$product_desc',product_keyword='$product_keywords',
            category_id = '$product_categories',brand_id = '$product_brands',
            product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',
            product_price='$product_price',date = NOW() where product_id = '$edit_id'";
            $result_update=mysqli_query($con,$update_product);
            if($result_update){
                echo "<script>alert('Update successfully')</script>";
                echo "<script>window.open('./insert_products.php','_self')</script>";
            }
        } 

    }
?>