<?php include_once 'template/header.php'; ?>

<?php include_once 'template/naav.php'; ?>

<body class="bg-white">
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Blog</h1>
                             <nav class="d-flex align-items-center justify-content-start">
                                <a href="index.php">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                <a href="single-blog.php">Single blog</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>

   <!--================Blog Area =================-->
   <?php 
	if(isset($_GET['blogid'])){
		$blogid=$_GET['blogid'];
	}
	
	include_once 'dbase_connection.php';
	$conect=connect();
	$sql = "SELECT * FROM blog WHERE blog_id=$blogid";
	$singleBlog = $conect->query($sql);
		foreach ($singleBlog as $blog){
			$_SESSION['blog_id'] = $blog['blog_id'];
?>
   <section class="blog_area single-post-area section_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                    <img  src="img/Blog/<?=$blog['b_image']?>" style="height: 700px;width: 1000px;margin-top: 20px;;" alt="..." ><br>
                  </div>
                  <div class="blog_details">
                     <h1><?=$blog['b_title']?></h1>
					 	<ul>
							<li>
								<h5><img src="img/baseline_schedule_black_36dp.png"> <b><?=$blog['b_time']?></b></h5>
							</li>
							<li>
								<h5><img src="img/baseline_account_circle_black_36dp.png"><b><?=$blog['b_name']?></b><h5>
							</li>
							
						</ul><br>
 

                     <div class="quote-wrapper">

                     <p><?=$blog['b_blog']?></p>
                  </div>
				  <?php } ?>
				 <?php  if(isset($_SESSION['loggedin']) && $_SESSION['userRole']!=1) { ?>	
				  		<h3 class="post-sub-heading">Comments</h3>
						<?php
						$activeBlogId = $blog['blog_id'];
						$sql = "SELECT * FROM `comment` WHERE `blog_id`= '$activeBlogId'";
						$commentResult = $conect->query($sql);	
		
						foreach($commentResult as $cmnt){?>
						<div class="cmnt_sec">
							<h6><i class="fas fa-user-tie" style="margin-right:5px;"></i><?php echo $cmnt['username'];?></h6>
							<p><?php echo $cmnt['comment'];?></p>
						</div>

						
		<?php }?>	
	
		
               </div>

               </div>
			   
			   

               <div class="comment-form" style="padding-top:40px;">
                  <h4>Leave a comment</h4>
                  <form class="form-contact comment_form" method="POST" action="user_comment.php" id="commentForm" >
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
						   <input type="hidden" value="<?=$blog['blog_id']?>">
                              <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                 placeholder="Write Comment"></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="form-group mt-3">
                       <button type="submit" name="btn_Comment"class="genric-btn primary circle" style="margin-left:300px;"><span>Submit</span></button>
                     </div>
                  </form>
               </div>
<?php }?>
<?php  if(isset($_SESSION['loggedin']) && $_SESSION['userRole']=1) { ?>	
<a class="genric-btn info circle arrow" href="approve_blog.php?blogid=<?=$blog['blog_id']?>"><span>Approve</span></a><?php }?>
            </div>

         </div>
      </div>
   </section>
   <!--================Blog Area end =================-->

   <!-- subscribe_area part start-->

    <!--::subscribe_area part end::-->

    <!--::footer_part start::-->
     <?php include_once 'template/footer.php'; ?>