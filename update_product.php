<?php 

session_start();
if($_POST){
	$p_title     = $_POST['p_title'];
	$p_price     = $_POST['p_price'];
	$p_size  	 = $_POST['p_size'];
	$p_type      = $_POST['p_type'];
	$p_desc      = $_POST['p_desc'];
	$prodId      = $_POST['prodId'];

if($p_type == 'Select'){
	$_SESSION['msg'] = 'Insert product Type. <br>';
	header('location:product_update.php?prodId='.$prodId);
	exit;
	}
	include_once 'dbase_connection.php';
	$conect = connect();
	$sql = "UPDATE `products` SET `p_title`='$p_title',`p_price`='$p_price',`p_size`='$p_size',`p_type`='$p_type',`p_desc`='$p_desc' WHERE product_id=$prodId";
		If($conect->query($sql)){
				$_SESSION['msg'] = "Product updated successfully.";
			}else{
				$_SESSION['msg'] = "Error ".$conect->error;
			}
			
}
header("location:edit_product.php");
?>