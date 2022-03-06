<?php include_once 'template/header.php'; ?>
<?php include_once 'template/naav.php'; ?>	

            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Order</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a> <a href="#">Admin<i class="fa fa-caret-right" aria-hidden="true"></i></a><a href="order_details.php">Order Details<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="order.php">Order</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section> 
			<table class="table table-striped"  id="table_id">
		<thead>
		  <tr>
			<th> Order ID</th>
			<th>Product Title</th>
			<th>Product Quantity</th>
			<th>Product ID</th>
		  </tr>
		</thead>
		<tbody>

		<?php 
		$orderId=$_GET['orderId'];
			include_once 'dbase_connection.php';
			$conect = connect(); 
				
			$sql = "SELECT * FROM cart WHERE order_id='$orderId'";
			
			$result = $conect->query($sql);
		
		foreach($result AS $row){
		?>
		  <tr>
			<td><?=$row['order_id']?></td>
			<td><?=$row['p_title']?></td>
			<td><?=$row['p_quantity']?></td>
			<td><?=$row['product_id']?></td>
		  </tr>
		<?php } ?> 
		</tbody>
	  </table>
<?php include_once 'template/footer.php'; ?>	