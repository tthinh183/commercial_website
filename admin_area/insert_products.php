<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_product'])){
        $product_title = $_POST['product_title'];
        $decription = $_POST['decription'];
        $product_keywords = $_POST['product_keyword'];
        $product_categories = $_POST['product_categories'];
        $product_brands = $_POST['product_brands'];
        $product_price = $_POST['product_price'];
        $product_status = 'true';
        // img name
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];
        // img tmp name
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];
        //check empty condition
        if($product_title == '' or $decription == '' or $product_keywords == '' or
        $product_categories == '' or $product_brands == '' or $product_price == '' or
        $product_image1 == '' or $product_image2 == '' or $product_image3 == ''){
            echo "<script>alert('Please fill all available fields')</script>";
            var_dump($_POST);
            exit();
        }else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_image3,"./product_images/$product_image3");
        }
        //insert query
        $insert_product = "insert into `products` (product_title,product_description,product_keyword,
        category_id,brand_id,product_img1,product_img2,product_img3,product_price,date,status) values (
            '$product_title','$decription','$product_keywords','$product_categories','$product_brands',
            '$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_product = mysqli_query($con,$insert_product);
        if($result_product){
            echo "<script>alert('Successfully inserted the product')</script>";
        }else{
            echo "Error: " . $insert_product . "<br>" . mysqli_error($con);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Insert Products-Admin Dashboard</title>
</head>
<body class="bg_light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                placeholder="Enter product title" autocomplete="off" required="required">
            </div>
            <!-- decription -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="decription" class="form-label">Product decription</label>
                <input type="text" name="decription" id="decription" class="form-control"
                placeholder="Enter product decription" autocomplete="off" required="required">
            </div>
            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product keywords</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control"
                placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id=""
                class="form-select">
                    <option value="">Select a category</option>
                    <?php
                        $select_query = "select * from `categories`";
                        $resul_select = mysqli_query($con, $select_query);
                        while($row_data = mysqli_fetch_assoc($resul_select)){
                            $cat_id = $row_data['category_id'];
                            $cat_title = $row_data['category_tittle'];
                            echo "<option value='$cat_id'>$cat_title</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id=""
                class="form-select">
                    <option value="">Select a brand</option>
                    <?php
                        $select_query = "select * from `brands`";
                        $result_select = mysqli_query($con,$select_query);
                        while($row_data = mysqli_fetch_assoc($result_select)){
                            $brand_id = $row_data['brand_id'];
                            $brand_title = $row_data['brand_tittle'];
                            echo "<option value='$brand_id'>$brand_title</option>" ;
                        }
                    ?>
                </select>
            </div>
            <!-- image1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control"
                required="required">
            </div>
            <!-- image2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control"
                required="required">
            </div>
            <!-- image3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control"
                required="required">
            </div>
            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                placeholder="Enter product price" autocomplete="off" required="required">
            </div>
            <!-- submit button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>
        </form>
    </div>
</body>
</html>