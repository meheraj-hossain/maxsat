<?php 
	session_start();
	if(isset($_GET['prodId'])){
			$prod_ID = $_GET['prodId'];
			
			include_once 'dbase_connection.php';
			$conect = connect(); 
			
			$sql = "DELETE FROM products WHERE product_id = $prod_ID";
			
			If($conect->query($sql)){
				$_SESSION['msg'] = "Product deleted successfully.";
			}else{
				$_SESSION['msg'] = "Error ".$conect->error;
			}
	}

header("location:edit_product.php");

?>