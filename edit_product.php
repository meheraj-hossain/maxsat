<?php include_once 'template/header.php'; ?>
<?php include_once 'template/naav.php'; ?>	

            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Edit Product</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a> <a href="#">Admin<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="edit_product.php">Edit Product</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section> 

				<?php 
		if(isset($_SESSION['msg'])){
			$msg = $_SESSION['msg'];
			
		?>
			<h4><img src="img/baseline_done_black_18dp.png"><?php echo $msg; ?></h4>
		<?php unset ($_SESSION['msg']);}
		?>
		<br>
<table class="table table-striped" id="table_id">
		<thead>
		  <tr>
			<th>Product Title</th>
			<th>Product Price</th>
			<th>Product Size</th>
			<th>Product File</th>
			<th>Product Type</th>
			<th>Product Description</th>
		  </tr>
		</thead>
		<tbody>

		<?php 
			include_once 'dbase_connection.php';
			$conect = connect(); 
				
			$sql = "SELECT * FROM products";
			
			$result = $conect->query($sql);
		
		foreach($result AS $row){
		?>
		  <tr>
			<td><?=$row['p_title']?></td>
			<td><?=$row['p_price']?></td>
			<td><?=$row['p_size']?></td>
			<td><?=$row['p_file']?></td>
			<td><?=$row['p_type']?></td>
			<td><?=$row['p_desc']?></td>
			<td>
				<a class="view-btn color-2" href="product_update.php?prodId=<?=$row['product_id']?>"> <span>Update </span></a>
				<a class="view-btn color-2" href="delete_product.php?prodId=<?=$row['product_id']?>"><span>Delete</span></a>
			</td>
		  </tr>

		<?php } ?> 
		</tbody>
	  </table>


<?php include_once 'template/footer.php'; ?>