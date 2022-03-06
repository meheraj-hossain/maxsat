<?php include_once 'template/header.php'; ?>
<?php include_once 'template/naav.php'; ?>
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Product Entry</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a><a href="#">Admin<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="product_entry_form">Product Entry</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
					<div class="container">
			<div class="row">

				<div class="col-md-6" style="margin-left: 290px;">
					<div class="register-form">
						<h3 class="billing-title text-center"> Register</h3>
								<?php 
			if(isset($_SESSION['msg'])){
				$msg = $_SESSION['msg'];
				unset ($_SESSION['msg']);
			?>
			 <h4><img src="img/baseline_done_black_18dp.png"><?php echo $msg; ?></h4>
		<?php } ?>
						
			<form action="product_entry.php" method="POST" enctype="multipart/form-data">
						
							<input type="text" name = "p_title" placeholder="Product Title" required class="common-input mt-20">
							
							<input type="text" name = "p_price" placeholder="Product Price"  required class="common-input mt-20">
							
								<div class="single-element-widget mt-30">
									<h5 class="mb-20"  style="margin-bottom: 2px;">Product Type</h5>
									<div class="default-select"  style="margin-top: 10px;">
										<select name="p_type">
											<option >Men</option>
											<option >Women</option>
											<option>Children</option>
										</select>
									</div>
								</div>

							<textarea rows="6" placeholder="Description" name="p_desc" required class="common-input mt-20" ></textarea>
							<input type="file" name = "F_file"  style="margin-top: 35px;">	
							<input type="submit" value = "Register" class="genric-btn success circle" style=" margin-left: 180px; margin-top:40px ">
						</form>
						
				

				</div>
				</div>
		</div>
		</div>
<?php include_once 'template/footer.php'; ?>	