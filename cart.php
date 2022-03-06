<?php include_once 'template/header.php'; ?>

<?php include_once 'template/naav.php'; ?>	



            <!-- Start Banner Area -->
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Shopping Cart</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="cart.php">Shopping Cart</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->
		
            <!-- Start Cart Area -->
            <div class="container">
		<?php 
		if(isset($_SESSION['msg'])){
			$msg = $_SESSION['msg'];
			
		?>
			<h5><img src="img/baseline_done_black_18dp.png"><?php echo $msg; ?></h5>
		<?php unset ($_SESSION['msg']);}
		?>
                <div class="cart-title">
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="ml-15">Product</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Price</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Quantity</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Total</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Action</h6>
                        </div>
                    </div>
                </div>
				<?php				
						include_once 'dbase_connection.php';
							$conect = connect();
							$total = 0;
							$session_id = session_id();
							$sql = "SELECT cart.*, products.*
							
							FROM cart 
							INNER JOIN products ON cart.product_id = products.product_id	
							WHERE  cart.session_Id = '$session_id'";
							$result = $conect->query($sql);
							
							if ($result  !=false){
								foreach($result AS $row){
								 
									
								
					?>
                <div class="cart-single-item">
                    <div class="row align-items-center">
                        <div class="col-md-4 col-12">
                            <div class="product-item d-flex align-items-center">
                                <img src=" " class="img-fluid" alt="">
                                <h6><?=$row['p_title']?></h6>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="price">৳<?=$row['p_price']?></div>
                        </div>
                        <div class="col-md-2 col-6">
                            <?=$row['p_quantity']?>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="total">৳<?=$row['p_quantity']*$row['p_price']?></div>
                        </div>
						<div class="col-md-2 col-6">
                            <a href="addtocart.php?action=delete&id=<?=$row["product_id"];?>"><span class="genric-btn danger circle">Remove</span></a>
                        </div>
                    </div>
                </div>
				<?php	
					$total = $total + ($row['p_quantity']*$row['p_price']);
				
					} 
				}
				?>
				

				<div class="cupon-area d-flex align-items-center justify-content-between flex-wrap">
                    
                </div>
                
                <div class="subtotal-area d-flex align-items-center justify-content-end">
                    <div class="title text-uppercase">Subtotal</div>
                    <div class="subtotal" style="margin-right: 290px;">৳<?php echo number_format($total, 2); ?></div>
                </div>

			<div class="col-lg-8 col-md-8" style=" margin-top: 20px;margin-left: 200px;">
					<form method="POST" action="confirm.php">
							<div class="mt-10">
							<input type="text" name="cust_name" placeholder="Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'full Name'" required class="single-input">
							</div>
							<div class="input-group-icon mt-10">
							<div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
							<input type="text" name="cust_address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required class="single-input">
							</div>
							<div class="mt-10">
							<input type="text" name="cont_number" placeholder=" Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'" required class="single-input">
							</div>
							<div class="mt-10">
							<input type="text" name="cust_city" placeholder=" City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'" required class="single-input">
							<input type="hidden" class="form-control" name="c_amount" value="<?=$total?>">
							</div>
							<br>
							<input type="submit" class="genric-btn success" style="margin-left:265px;" name="confirm" value="Confirm Buy">
					</form>
			</div>


         </div>


            <?php include_once 'template/footer.php'; ?>	