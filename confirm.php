<?php 
session_start();
if(isset($_POST['confirm'])){
	$cName = $_POST['cust_name'];	
	$caddress = $_POST['cust_address'];	
	$phone = $_POST['cont_number'];		
	$city = $_POST['cust_city'];	
	$sum_total = $_POST['c_amount'];
	
	$session_id = session_id();
	
	$six_digit_random_number = mt_rand(100000, 999999);
	$OrderId = 'O'.$six_digit_random_number;
	

	if($cName == ''){
		header('location:cart.php?msg=Please type  Your Name');exit;
	}
	
	if($caddress == ''){
		header('location:cart.php?msg=Please type  Your Full Address');exit;
	}
	
	if($phone == ''){
		header('location:cart.php?msg=Please type  Your Contact number ');exit;
	}
	
	
	if($city == ''){
		header('location:cart.php?msg=Please type  City Name');exit;
	}
	
	if($sum_total == 0){
		header('location:cart.php?msg=Please select a product first');exit;
	}

	include_once 'dbase_connection.php';
	$conect= connect();
	
	$sql = "UPDATE `cart` SET `order_id`='$OrderId' WHERE session_id='$session_id'";
	$conect->query($sql);	

	
	$sql = "INSERT INTO order_details(order_id,cust_name,cust_address,cont_number,cust_city,c_amount) 
		    VALUES ('$OrderId','$cName','$caddress','$phone','$city','$sum_total')"; 
	
	if($conect->query($sql)){
		session_regenerate_id (true);
		$_SESSION['msg'] = 'Your order is confirmed.';
	header('location:cart.php');
	}
}
	
	
	
	
	







?>