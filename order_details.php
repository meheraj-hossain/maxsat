<?php include_once 'template/header.php'; ?>
<?php include_once 'template/naav.php'; ?>	

            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Order details</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a> <a href="#">Admin<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="order_details.php">Order details</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section> 
<table class="table table-striped"  id="table_id">
		<thead>
		  <tr>
			<th>Order ID</th>
			<th>Customer Name</th>
			<th>Address</th>
			<th>Contact Number</th>
			<th>City</th>
			<th>Order Date</th>
			<th>Payable Amount</th>
		  </tr>
		</thead>
		<tbody>

		<?php 
			include_once 'dbase_connection.php';
			$conect = connect(); 
				
			$sql = "SELECT * FROM order_details ";
			
			$result = $conect->query($sql);
		
		foreach($result AS $row){
		?>
		  <tr>
			<td><?=$row['order_id']?></td>
			<td><?=$row['cust_name']?></td>
			<td><?=$row['cust_address']?></td>
			<td><?=$row['cont_number']?></td>
			<td><?=$row['cust_city']?></td>
			<td><?=$row['order_date']?></td>
			<td><?=$row['c_amount']?></td>
			<td><a class="view-btn color-2" href="order.php?orderId=<?=$row['order_id']?>"> <span>Order details </span></a></td>
		  </tr>
		<?php } ?> 
		</tbody>
	  </table>



<?php include_once 'template/footer.php'; ?>	