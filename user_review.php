<?php 
	session_start();

		if(isset($_POST['btn_Review'])){
		$rev = $_POST['review'];
		$R_userId = $_SESSION['userId'];
		$R_username = $_SESSION['userName'];
		$activeProdId = $_SESSION['product_id'];
		
		if( empty($_POST['review']) ){
			$_SESSION['msg'] .= 'Please insert your Username first.<br>';
			header('location:single.php?productid='.$activeProdId);
			exit;
		}
		
		include_once 'dbase_connection.php';
		$conect = connect();
		$sql = "INSERT INTO `review`(`review`, `user_id`, `username`,`product_id`) 
		VALUES ('$rev','$R_userId','$R_username','$activeProdId')";
		$conect->query($sql);	
		header('location:single.php?productid='.$activeProdId);
						
}?>