<h3 class="text-center text-success">All Payment</h3>
<table class="table table-mordered mt-5">
    <thead class="bg-info">
        <?php
            $get_payments="select * from `user_payments`";
            $rs = mysqli_query($con,$get_payments);
            $row_count = mysqli_num_rows($rs);
    if($row_count==0){
        echo "<h2 class='text-danger text-center mt-5'>No payments yet</h2>";
    }else{
        echo "        <tr>
        <th>SLno</th>
        <th>Invoice number</th>
        <th>Amount</th>
        <th>Payment Mode</th>
        <th>Order date</th>
        <th>Delete</th>
    </tr>   
</thead>
<tbody class='bg-secondary text-light'>";
        $number = 0;
        while($row_data=mysqli_fetch_assoc($rs)){
            $order_id = $row_data['order_id'];
            $payment_id = $row_data['payment_id'];
            $invoice_number = $row_data['invoice_number'];
            $amount = $row_data['amount'];
            $payment_mode = $row_data['payment_mode'];
            $date = $row_data['date'];
            $number++;
            echo "<tr>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$date</td>
            <td><a href='index.php?delete_category=<?php echo ?>'   
            type='button' class='btn text-light' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></td>
        </tr>";
        }
    }
        ?>

        
    </tbody>
</table>