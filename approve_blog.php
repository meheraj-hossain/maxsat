<?php 
	session_start();
	if(isset($_GET['blogid'])){
			$blog_id = $_GET['blogid'];
			
			include_once 'dbase_connection.php';
			$conect = connect(); 
			
			$sql = "UPDATE `blog` SET `b_approval` = 'Approve' WHERE `blog`. blog_id = '$blog_id'";
			
			If($conect->query($sql)){
				$_SESSION['msg'] = "Blog approved successfully.";
			}else{
				$_SESSION['msg'] = "Error ".$conect->error;
			}
	}

header("location:manage_blog.php");

?>