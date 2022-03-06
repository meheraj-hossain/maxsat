<?php include_once 'template/header.php'; ?>

<?php include_once 'template/naav.php'; ?>	

            <!-- Start Banner Area -->
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Single Product Page</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="single.php">Single Product Page</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Banner Area -->

            <!-- Start Product Details -->
            <div class="container">
			
                <div class="product-quick-view">
                    <div class="row align-items-center">
	
  <?php 
	if(isset($_GET['productid'])){
		$productid=$_GET['productid'];
	}
	
	include_once 'dbase_connection.php';
	$conect=connect();
	$sql = "SELECT * FROM products WHERE product_id=$productid";
	$result = $conect->query($sql);
		foreach ($result as $row){
			$_SESSION['product_id'] = $row['product_id'];
?>

                        <div class="col-lg-6">
                            
 
                               <img style="width:90%;height:650px;" src="img/product/<?=$row['p_file']?>" alt="">

                           
                        </div>
                        <div class="col-lg-6">
                            <div class="quick-view-content">
                                <div class="top">
                                    <h3 class="head" name="title"><?=$row['p_title']?></h3>
                                    <div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">৳<?=$row['p_price']?></span>
									
									</div>
                                </div>
                                <div class="middle">
                                    <p class="content"> <?=$row['p_desc']?></p>
                                </div>
                         <br>
							<?php 
									if(isset($_SESSION['loggedin']) && $_SESSION['userRole']==1){ 
										
									}else{?>
                                 <form action="addtocart.php" method="GET">
									<input type="hidden" name="p_title" class="form-control quantity" value="<?=$row['p_title']?>"/>
										<input type="hidden" name="productid" class="form-control quantity" value="<?=$row['product_id']?>"/>
										<div class="col-lg-4">
										<input type="text" name="quantity" class="form-control quantity" value="1"/>
										</div>
									<div class="d-flex mt-20">
                                        <button type="submit" name="addtocart" class="view-btn color-2"><span>Add to Cart</span></button>
                                   </div>

								</form>
								<?php }?>
                                
                            </div>
                        </div>
							<?php } ?>
						
		
					
                    </div>
					
						<div>
						<h3 class="post-sub-heading">Review</h3>
					
						<?php
						$activeProdId = $_SESSION['product_id'];
						$sql = "SELECT * FROM `review` WHERE `product_id`= '$activeProdId'";
						$reviewResult = $conect->query($sql);	
						foreach($reviewResult as $rev){?>
						<div class="cmnt_sec">
							<h6><i class="fas fa-user-tie" style="margin-right:5px;"></i><?php echo $rev['username'];?></h6>
							<p><?php echo $rev['review'];?></p>
						</div>
						
						<?php }?>
						</div>	
						<?php 
									if(isset($_SESSION['loggedin'])){ ?>
				<div class="comment-form" style="padding-top:40px;">
                  <h4>Leave a Review</h4>
				  	<?php 
						if(isset($_SESSION['msg'])){
							$msg = $_SESSION['msg'];
							unset ($_SESSION['msg']);
						?>
						<h3 class="mb-30" style=" margin-top:20px;"><?php echo $msg; ?> </h3>
					<?php } ?>
                  <form class="form-contact comment_form" method="POST" action="user_review.php" id="commentForm" >
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
						   <input type="hidden" value="<?=$row['product_id']?>">
                              <textarea class="form-control" name="review" id="comment"  rows="9"
                                 placeholder="Write Review"></textarea>
                           </div>
                        </div>
                     </div>
					
                     <div class="form-group mt-3">
                       <button type="submit" name="btn_Review"class="genric-btn primary circle" ><span>Submit</span></button>
                     </div>
					
                  </form>
				</div>
				<?php }?>
				
                </div>
            </div>
 <?php include_once 'template/footer.php'; ?>	