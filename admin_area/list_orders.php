<h3 class="text-center text-success">All Orders</h3>
<table class="table table-mordered mt-5">
    <thead class="bg-info">
        <?php
            $get_order="select * from `user_orders`";
            $rs = mysqli_query($con,$get_order);
            $row_count = mysqli_num_rows($rs);
    if($row_count==0){
        echo "<h2 class='text-danger text-center mt-5'>No orders yet</h2>";
    }else{
        echo "        <tr>
        <th>SLno</th>
        <th>Due Amount</th>
        <th>Invoice number</th>
        <th>Total products</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody class='bg-secondary text-light'>";
        $number = 0;
        while($row_data=mysqli_fetch_assoc($rs)){
            $order_id = $row_data['order_id'];
            $user_id = $row_data['user_id'];
            $amount_due = $row_data['amount_due'];
            $invoice_number = $row_data['invoice_number'];
            $total_products = $row_data['total_products'];
            $order_date = $row_data['order_date'];
            $order_status = $row_data['order_status'];
            $number++;
            echo "<tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$invoice_number</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$order_status</td>
            <td><a href='index.php?delete_category=<?php echo ?>'   
            type='button' class='btn text-light' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></td>
        </tr>";
        }
    }
        ?>

        
    </tbody>
</table>