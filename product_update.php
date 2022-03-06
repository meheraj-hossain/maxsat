<?php include_once 'template/header.php'; ?>
<?php include_once 'template/naav.php'; ?>	

            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Update Product</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a> <a href="#">Admin<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="product_update.php">Product Update</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>

<?php 

	$prodId=$_GET['prodId'];

	include_once 'dbase_connection.php';
	$conect=connect();
	$sql = "SELECT * FROM products WHERE product_id = $prodId";
	$result = $conect->query($sql);
	foreach ($result as $row){
?>

					<div class="container">
			<div class="row">

				<div class="col-md-6">
					<div class="register-form">
						<h3 class="billing-title text-center"> Update</h3>
								<?php 
			if(isset($_SESSION['msg'])){
				$msg = $_SESSION['msg'];
				unset ($_SESSION['msg']);
			?>
			<h5><img src="img/baseline_error_black_18dp.png"><?php echo $msg; ?></h5>
		<?php } ?>
						
			<form action="update_product.php" method="POST"">
						
							<input type="text" name = "p_title" value="<?=$row['p_title']?>" required class="common-input mt-20">
							
							<input type="text" name = "p_price" value="<?=$row['p_price']?>"  required class="common-input mt-20">

								<div class="single-element-widget mt-30">
									<h5 class="mb-20"  style="margin-bottom: 2px;">Product Type</h5>
									<div class="default-select"  style="margin-top: 10px;">
										<select name="p_type" value="<?=$row['p_type']?>">
											<option >Select</option>
											<option >Men</option>
											<option >Women</option>
											<option>Children</option>
										</select>
									</div>
								</div>

							<textarea rows="6"  name="p_desc" value="" required class="common-input mt-20" ><?=$row['p_desc']?></textarea>
							
							<input type="hidden" name="prodId" class="form-control quantity" value="<?=$row['product_id']?>"/>
					<button type="submit" class="genric-btn success circle" style=" margin-left: 80px; margin-top:40px "> Update</button>
					
					
					<a class="genric-btn warning circle" href="delete_product.php?prodId=<?=$row['product_id']?>"><span>Delete</span></a>
						</form>

				</div>
					
				</div>
					<div class="col-md-6">
					<img style="width:90%;height:650px;" src="img/product/<?=$row['p_file']?>">
					</div>
				<?php } ?>
		</div>
		</div>
<?php include_once 'template/footer.php'; ?>	