<!-- Start Header Area -->
			<header class="default-header">
				<div class="menutop-wrap">
					<div class="menu-top container">
						 <div class="d-flex">
						  <div class="mr-auto p-2"><a href="mailto:1000747@daffodil.ac">1000747@daffodil.ac</a></div>
						  <div class="p-2"><form action="search.php" method= "GET">
										<input  class =" VRC" type="search" placeholder="Search.." name="search">
										<button type="submit"><i class="fa fa-search"></i></button>
										
										</form>
							</div>
						  <div class="p-2"><?php 
											if(!isset($_SESSION['loggedin'])){ ?>
											<a href="login.php">login</a> <?php }?></div>
						</div> 
					</div>					
				</div>
				<nav class="navbar navbar-expand-lg  navbar-light">
					<div class="container">
						  <a class="navbar-brand" href="index.php">
						  	<img src="img/logo.png" alt="">
						  </a>
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						  </button>
						  <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
						    <ul class="navbar-nav">
								<li><a href="index.php">Home</a></li>							
								<li><a href="men.php">Men</a></li>
								<li><a href="women.php">Women</a></li>
								<li><a href="children.php">Children</a></li>
								<li><a href="blog.php">Blog</a></li>
								
								<?php 
									if(isset($_SESSION['loggedin']) && $_SESSION['userRole']==1){ 
										
									}else{?>
									<li><a href="contact.php">Contact Us</a></li>
								<li><a href="cart.php">Cart</a></li>
								<?php }?>
								<?php if(!isset($_SESSION['loggedin'])){?>
								<li><a href="login.php">Registration</a></li> 
			<?php } ?>
								<?php 
									if(isset($_SESSION['loggedin']) && $_SESSION['userRole']!=1){ ?>
								 <li class="dropdown">
                                      <a class="dropdown-toggle" href="#" > <?= $_SESSION['userName']?>
                                      </a>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="logout.php">Logout</a>
                                      </div>
                                    </li>  
								<?php } elseif (isset($_SESSION['loggedin']) && $_SESSION['userRole']==1){ ?>
								 <li class="dropdown">
                                      <a class="dropdown-toggle" href="#" > ADMIN </a>
									   <div class="dropdown-menu">
									    <a class="dropdown-item" href="order_details.php">Order details</a>
										<a class="dropdown-item" href="user_manage.php">Manage User</a>
										<a class="dropdown-item" href="product_entry_form.php">Manage Product</a>
										<a class="dropdown-item" href="manage_blog.php">Manage Blogs</a>
										<a class="dropdown-item" href="edit_product.php">Edit Products</a>
										<a class="dropdown-item" href="show_message.php">Messages</a>
                                        <a class="dropdown-item" href="logout.php">Logout</a>
                                      </div>
                                    </li>  
											<?php } ?>
						    </ul>
						  </div>						
					</div>
				</nav>
			</header>
			<!-- End Header Area -->