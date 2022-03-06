<?php include_once 'template/header.php'; ?>
<?php include_once 'template/naav.php'; ?>

            <!-- Start Banner Area -->
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Shop Category page</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="Men.php">Men</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->
			<div class="container">
				<div class = "row">
					
							
					<?php 
					if(!isset($_SESSION['files'])){
						include_once 'dbase_connection.php';
						$conect = connect();
						
						$sql = "SELECT * FROM products WHERE p_type = 'Men'";
						
						$result = $conect->query($sql);

					}	
						foreach($result AS $row){
						?>
								<div class="col-xl-3 single-product pb-60">
								  <div class="content">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" style="height:340px; width:260px;" src="img/product/<?=$row['p_file']?>" alt="">
								      <div class="content-details fadeIn-bottom">
									        <div class="bottom d-flex align-items-center justify-content-center">
											
												<a href="single.php?productid=<?=$row['product_id']?>"><span class="lnr lnr-layers"></span></a>
												
												
											</div>
								      </div>
								  </div>
								  <div class="price">
								  		<h5><?=$row['p_title']?></h5>
								  		<h3>৳<?=$row['p_price']?> </h3>
									   </div>
								</div>
									<?php } ?>
									
				</div>
			</div>


			
							
					
					
<?php include_once 'template/footer.php'; ?>
