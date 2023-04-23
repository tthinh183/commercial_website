<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>SLno</th>
            <th>Brand title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
            $select_brand = "select * from `brands`";
            $result = mysqli_query($con,$select_brand);
            $number=0;
            while($row = mysqli_fetch_assoc($result)){
                $brand_id = $row['brand_id'];
                $brand_title = $row['brand_tittle'];
                $number++;
        ?>
        <tr class="text-center">
            <td><?php echo $number ?></td>
            <td><?php echo $brand_title ?></td>
            <td><a href='index.php?edit_brand=<?php echo $brand_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_brand=<?php echo $brand_id ?>'   
            type="button" class="btn text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <a href="./index.php?view_brands" class="text-light text-decoration-none">No</a>
        </button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brand=<?php echo $brand_id ?>'   
        class="text-light text-decoration-none" data-toggle="modal" data-target="#exampleModal">Yes</a></button>
      </div>
    </div>
  </div>
</div>