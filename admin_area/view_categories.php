<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>SLno</th>
            <th>Category title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
            $select_cat = "select * from `categories`";
            $result = mysqli_query($con,$select_cat);
            $number=0;
            while($row = mysqli_fetch_assoc($result)){
                $cat_id = $row['category_id'];
                $cat_title = $row['category_tittle'];
                $number++;
        ?>
        <tr class="text-center">
            <td><?php echo $number ?></td>
            <td><?php echo $cat_title ?></td>
            <td><a href='' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>