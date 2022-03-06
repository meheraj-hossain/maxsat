<?php include_once 'template/header.php'; ?>
<?php include_once 'template/naav.php'; ?>	

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="container-fluid">
					<div class="row fullscreen align-items-center justify-content-center">
						<div class="col-lg-6 col-md-12 d-flex align-self-end img-right no-padding">
							<img class="img-fluid" src="img/header-img.png" alt="">
						</div>
						<div class="banner-content col-lg-6 col-md-12">
						
							<h1 class="text-uppercase">
								It’s Happening <br>
								this Season!
							</h1>
						</div>							
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start category Area -->
			<section class="category-area section-gap section-gap" id="catagory">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-40">
							<div class="title text-center">
								<h1 class="mb-10">Shop for Different Categories</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>					
					<div class="row">
						<div class="col-lg-8 col-md-8 mb-10">
							<div class="row category-bottom">
								<div class="col-lg-6 col-md-6 mb-30">
									<div class="content">
									    <a  href="women.php" >
									      <div class="content-overlay"></div>
									  		 <img class="content-image img-fluid d-block mx-auto" src="img/c1.jpg" alt="">
									      <div class="content-details fadeIn-bottom">
									      <h3 class="content-title" >Women</h3>
									      </div>
									    </a>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 mb-30">
									<div class="content">
									    <a   href="men.php" >
									      <div class="content-overlay"></div>
									  		 <img class="content-image img-fluid d-block mx-auto" src="img/c2.jpg" alt="">
									      <div class="content-details fadeIn-bottom">
									        <h3 class="content-title">Men</h3>
									      </div>
									    </a>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="content">
										<a   href="children.php" >
									      <div class="content-overlay"></div>
									  		 <img class="content-image img-fluid d-block mx-auto" src="img/c3.jpg" alt="">
									      <div class="content-details fadeIn-bottom">
									        <h3 class="content-title">Children</h3>
									      </div>
									    </a>
									</div>
							  	</div>																
							</div>							
						</div>
						<div class="col-lg-4 col-md-4 mb-10">
						  <div class="content">
						    <a   href="blog.php" >
						      <div class="content-overlay"></div>
						  		 <img class="content-image img-fluid d-block mx-auto" src="img/c4.jpg" alt="">
						      <div class="content-details fadeIn-bottom">
						        <h3 class="content-title">Blog</h3>
						      </div>
						    </a>
						  </div>
						</div>						
					</div>
				</div>	
			</section>
			<!-- End category Area -->
			
			<!-- Start men-product Area -->
			<section class="men-product-area section-gap relative" id="men">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-40">
							<div class="title text-center">
								<h1 class="text-white mb-10">New realeased Products for Men</h1>
								<p class="text-white">Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>
					<div class="row">
					<?php 
					if(!isset($_SESSION['files'])){
						include_once 'dbase_connection.php';
						$conect = connect();
						
						$sql = "SELECT * FROM products WHERE p_type = 'Men' LIMIT 4";
						
						$result = $conect->query($sql);

					}	
						foreach($result AS $row){
						?>
						<div class="col-xl-3 single-product">
					
						  <div class="content">
						  		 <img class="content-image img-fluid d-block mx-auto" style="height:320px;" src="img/product/<?=$row['p_file']?>" alt="">
						      <div class="content-details fadeIn-bottom">
							        <div class="bottom d-flex align-items-center justify-content-center">
										<a href="single.php?productid=<?=$row['product_id']?>"><span class="lnr lnr-layers"></span></a>
									</div>
						      </div>
						  </div>
						  <div class="price">
						  		<h5 class="text-white"><?=$row['p_title']?></h5>
						  		<h3 class="text-white">৳<?=$row['p_price']?> </h3>
						   </div>
							
						</div>	
						<?php } ?>
					</div>
				</div>	
			</section>
			<!-- End men-product Area -->

			<!-- Start women-product Area -->
			<section class="women-product-area section-gap" id="women">
				<div class="container">
					<div class="countdown-content pb-40">
						<div class="title text-center">
							<h1 class="mb-10">New realeased Products for Women</h1>
							<p>Who are in extremely love with eco friendly system.</p>
						</div>
					</div>
					<div class="row">
					<?php 
					if(!isset($_SESSION['files'])){
						include_once 'dbase_connection.php';
						$conect = connect();
						
						$sql = "SELECT * FROM products WHERE p_type = 'Women' LIMIT 4";
						
						$result = $conect->query($sql);

					}	
						foreach($result AS $row){
						?>
						<div class="col-xl-3 single-product">
					
						  <div class="content">
						  		 <img class="content-image img-fluid d-block mx-auto" style="height:320px;" src="img/product/<?=$row['p_file']?>" alt="">
						      <div class="content-details fadeIn-bottom">
							        <div class="bottom d-flex align-items-center justify-content-center">
										<a href="single.php?productid=<?=$row['product_id']?>"><span class="lnr lnr-layers"></span></a>
									</div>
						      </div>
						  </div>
						  <div class="price">
						  		<h5><?=$row['p_title']?></h5>
						  		<h3>৳<?=$row['p_price']?></h3>
						   </div>						  
						</div>	
							<?php } ?>												
					</div>
				</div>	
			</section>
			<!-- End women-product Area -->
			
			

			<!-- Start related-product Area --> 

			<!-- End related-product Area -->
	


<?php include_once 'template/footer.php'; ?>		