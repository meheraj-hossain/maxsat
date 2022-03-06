<?php 
session_start();
if(isset($_GET["addtocart"])){
	$cart_product_id = $_GET["productid"];
	$quantity = $_GET["quantity"];
	$p_title = $_GET["p_title"];
	$session_id = session_id();

	if($quantity <='0'){
		header('location:index.php');
		exit;
	}
	
	include_once 'dbase_connection.php';
	$conect = connect();
	
	$sql = "SELECT * FROM cart WHERE  session_id = '$session_id'";
	$result = $conect->query($sql);
	
	if ($result  !=false){
		foreach($result AS $row){
			$product_id = $row['product_id'];
			
		}	
		
		if ($product_id  == $cart_product_id) {
			header('location:cart.php');
			exit;
		}
		else {
			$sql = "INSERT INTO cart (product_id,p_quantity,p_title,session_id)
			VALUES ('$cart_product_id','$quantity','$p_title','$session_id')";
			$conect->query($sql);
			header('location:cart.php?productid=$cart_product_id');
		}
		
	}
	
}

?>

<?php 
	if(isset($_GET["id"])){
		$pid = $_GET["id"];
		$session_id = session_id();
		
		include_once 'dbase_connection.php';
		$conect = connect();
		
		
		$sql = "DELETE FROM cart WHERE  session_id = '$session_id' AND product_id = '$pid'";

		if($conect->query($sql)){
			header('location:cart.php');
		}else{
			$_SESSION['msg']="Error:".$conect->error;
		}
		
		
	}



?>