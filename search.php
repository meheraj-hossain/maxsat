<?php include_once 'template/header.php'; ?>
<?php include_once 'template/naav.php'; ?>

            <!-- Start Banner Area -->
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Search Result</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="search.php">Search</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->
			<div class="container">
				<div class = "row">
					
<?php 
		if(isset($_GET)){
						$search = $_GET['search'];
						include_once 'dbase_connection.php';
						$conect = connect();
						
						$sql = "SELECT * FROM products WHERE p_title LIKE '%$search%' OR p_type LIKE '%$search%'";
						
						$result = $conect->query($sql);
					if($result->num_rows > 0){
			
			foreach($result AS $row){?>
								<div class="col-xl-3 single-product pb-60">
									<div class="content">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" style="height:300px; width:260px;" src="img/product/<?=$row['p_file']?>" alt="">
												<div class="content-details fadeIn-bottom">
													<div class="bottom d-flex align-items-center justify-content-center">
														<a href="single.php"><span class="lnr lnr-layers"></span></a>
															<a href="cart.php"><span class="lnr lnr-cart"></span></a>
												
													</div>
												</div>
									</div>
										<div class="price">
								  		<h5><?=$row['p_title']?></h5>
								  		<h3>৳<?=$row['p_price']?> </h3>
									   </div>
								</div>
		<?php } 
			} else{ ?>
					<h5 style="margin-left:40%;"><img src="img/baseline_error_black_18dp.png"> <?php echo "No result found";?> </h5> 
		<?php } } ?>
									
				</div>
			</div>			
<?php include_once 'template/footer.php'; ?>