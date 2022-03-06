<?php 
	session_start();

		if(isset($_POST['btn_Comment'])){
		$cmnt = $_POST['comment'];
		$C_userId = $_SESSION['userId'];
		$C_username = $_SESSION['userName'];
		$activeBlogId = $_SESSION['blog_id'];
		
		include_once 'dbase_connection.php';
		$conect = connect();
		$sql = "INSERT INTO `comment`(`comment`, `user_id`, `username`,`blog_id`) 
		VALUES ('$cmnt','$C_userId','$C_username','$activeBlogId')";
		$conect->query($sql);	
		header('location:single-blog.php?blogid='.$activeBlogId);
						
}?>