<?php 

$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'maxsat';

$con = new mysqli($host,$user,$pass);

$sql = "CREATE DATABASE $dbName";
$con->query($sql);

$con = new mysqli($host,$user,$pass,$dbName);


$sql= "CREATE TABLE `customer` (
  `cust_id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `cust_full_name` varchar(255) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_phn` varchar(255) NOT NULL,
  `cust_username` varchar(255) NOT NULL,
  `cust_pass` varchar(255) NOT NULL,
  `cust_role` int(50) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

if($con->query($sql)){
	echo 'Table customer created successfully<br>';
}
include_once 'dbase_connection.php';
$conect = connect();

$sql = "SELECT * FROM customer WHERE cust_username ='admin' ";
$output= $conect->query($sql);

if($output-> num_rows > 0){
	echo 'Admin already exists.<br>';
}else{
	$sql="INSERT INTO `customer` (`cust_full_name`, `cust_email`, `cust_username`, `cust_pass`, `cust_role`) VALUES
('Miraj Hossain', 'mirajho111@gmail.com', 'admin', '123', 1,)";
	$conect->query($sql);
		echo 'Admin created successfully.<br>
		Use cust_username=admin and password=123 to login<br>';
}

$sql= "INSERT INTO `customer` (`cust_id`, `cust_full_name`, `cust_email`, `cust_phn`, `cust_username`, `cust_pass`, `cust_role`, `Status`) VALUES
(1, 'Miraj Hossain', 'mirajho111@gmail.com', '01875781788', 'admin', '123', 1, 'Active'),
(2, 'Miraj Hossain', 'miraj@gmail.com', '01521255051', 'Meheraj', '123', 0, 'Activate')";
if($con->query($sql)){
	echo 'Data inserted into customer successfully.<br>';
}

$sql="CREATE TABLE `products` (
  `product_id` int(50) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `p_title` text NOT NULL,
  `p_price` int(255) NOT NULL,
  `p_size` varchar(255) NOT NULL,
  `p_file` varchar(255) NOT NULL,
  `p_type` text NOT NULL,
  `p_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

if($con->query($sql)){
	echo 'Table product created successfully<br>';
}

$sql= "INSERT INTO `products` (`product_id`, `p_title`, `p_price`, `p_size`, `p_file`, `p_type`, `p_desc`) VALUES
(1, 'Khaki Singham', 1000, '', 'khaki Singham.jpg', 'Men', 'Revere Collar shirts for Summer\r\n\r\nFabric- Cotton\r\nAvailable at BDT 1000\r\nMeasurements (in inches):\r\nSmall: Length: 27 | Chest: 38\r\nMedium: Length: 28 | Chest: 40\r\nLarge: Length: 29 | Chest: 42\r\nExtra Large: Length: 31 | Chest: 46'),
(2, 'Admiral General Aladeen Shirt', 1000, '', 'sdf.jpg', 'Men', 'Revere Collar shirts for Summer\r\n\r\nFabric- Cotton\r\nAvailable at BDT 1000\r\n.Measurements (in inches):\r\nSmall: Length: 27 | Chest: 38\r\nMedium: Length: 28 | Chest: 40\r\nLarge: Length: 29 | Chest: 42\r\nExtra Large: Length: 31 | Chest: 46'),
(3, 'The VLC Media Player Shirt', 1000, '', 'IMG_4050-Edit.jpg', 'Men', 'A tribute to software we grew up with. One always crashed while the other played whatever you threw at it. You probably never paid for the software but you can pay for this tribute.\r\n\r\nWindows Media Player Button Down Shirt\r\nVLC Media Player Button Down S'),
(4, 'Internet Explorer Blue Shirt', 1000, '', 'internet blue explorer shirt.jpg', 'Men', 'Revere Collar shirts for Summer\r\n\r\nFabric- Linen\r\nAvailable at BDT 1000\r\nMeasurements (in inches):\r\nSmall: Length: 27 | Chest: 38\r\nMedium: Length: 28 | Chest: 40\r\nLarge: Length: 29 | Chest: 42\r\nExtra Large: Length: 31 | Chest: 46'),
(5, 'Not RABâ€™s Uniform', 1000, '', 'no rab.jpg', 'Women', 'Revere Collar shirts for Summer\r\n\r\nFabric- Linen\r\nAvailable at BDT 1000\r\nMeasurements (in inches):\r\nSmall: Length: 27 | Chest: 38\r\nMedium: Length: 28 | Chest: 40\r\nLarge: Length: 29 | Chest: 42\r\nExtra Large: Length: 31 | Chest: 46'),
(7, 'Khaki Singham', 1000, '', 'khaki.jpg', 'Women', 'Revere Collar shirts for Summer\r\n\r\nFabric- Cotton\r\nAvailable at BDT 1000\r\nMeasurements (in inches):\r\nSmall: Length: 27 | Chest: 38\r\nMedium: Length: 28 | Chest: 40\r\nLarge: Length: 29 | Chest: 42\r\nExtra Large: Length: 31 | Chest: 46\r\n\r\nRelated products'),
(8, 'Admiral General Aladeen Shirt', 1000, '', 'admiral general aladin.jpg', 'Women', 'Revere Collar shirts for Summer\r\n\r\nFabric- Cotton\r\nAvailable at BDT 1000\r\nMeasurements (in inches):\r\nSmall: Length: 27 | Chest: 38\r\nMedium: Length: 28 | Chest: 40\r\nLarge: Length: 29 | Chest: 42\r\nExtra Large: Length: 31 | Chest: 46'),
(9, 'Internet Explorer Blue Shirt', 1000, '', 'adf.jpg', 'Women', 'Revere Collar shirts for Summer\r\n\r\nFabric- Cotton\r\nAvailable at BDT 1000\r\nMeasurements (in inches):\r\nSmall: Length: 27 | Chest: 38\r\nMedium: Length: 28 | Chest: 40\r\nLarge: Length: 29 | Chest: 42\r\nExtra Large: Length: 31 | Chest: 46'),
(12, 'Boys Black & Maroon Solid Sherwani', 2000, '', '0eb0f878-838d-4c61-acf5-6ce54a2cb10b1560638321878-1.jpg', 'Children', 'Black and maroon sherwani\r\nBlack solid sherwani, has a mandarin collar, long sleeves, full button closures and a chest pocket\r\nA pair of maroon solid mid-rise woven dhoti pants, has an elasticated waistband with drawstring fastening'),
(13, 'Pink Ready to Wear Lehenga & Blouse with Dupatta', 1500, '', '2a1fb3c1-e8dd-4309-b18c-54547cfb92ee1564138973078-LilPicks-Pink-Ready-to-Wear-Lehenga--Blouse-with-Dupatta-501-1.jpg', 'Children', 'Pink lehenga choli\r\nPink and yellow blouse, short sleeves\r\nPink ready to wear lehenga, flared hem\r\nPink solid dupatta'),
(14, 'Plaid Long Sleeve Shirt', 1200, '', '3de91d44-6f49-42fb-b554-a7b73aa3a19a1571812553021-GAP-Boys-Plaid-Long-Sleeve-Shirt-3761571812550591-1.jpg', 'Children', 'Smooth weave\r\nLong sleeves with button cuffs\r\nSpread collar\r\nButton front\r\nPatch pocket at chest\r\nCurved shirttail\r\nAllover plaid'),
(15, 'Girls Coral Pink & White Printed Top', 600, '', 'c2aab7eb-2293-45f3-8454-8a5cdf1200cc1571810044030-US-Polo-Assn-Kids-Girls-Coral-Pink--White-Printed-Top-989157-1.jpg', 'Children', 'Smooth weave\r\nLong sleeves with button cuffs\r\nSpread collar\r\nButton front\r\nPatch pocket at chest\r\nCurved shirttail\r\nAllover plaid'),
(16, 'Boys Blue Regular Fit Solid Casual Shirt', 1000, '', 'f47c59d8-011d-4087-a29b-aa44ccf973bf1559134062890-US-Polo-Assn-Kids-Boys-Blue-Regular-Fit-Solid-Casual-Shirt-6-1.jpg', 'Children', 'Blue solid casual shirt, has a spread collar, button placket, long sleeves, curved hem'),
(17, 'The Windows Media Player Shirt', 800, '', 'IMG_3959-Edit-7.jpg', 'Men', 'A tribute to software we grew up with. One always crashed while the other played whatever you threw at it. You probably never paid for the software but you can pay for this tribute.\r\n\r\nWindows Media Player Button Down Shirt\r\nVLC Media Player Button Down S'),
(18, 'Careless White', 800, '', 'IMG_2705-Edit_800.jpg', 'Women', 'Get the new unisex Irregular Shirt by Ghash! Embrace the irregular, yet super comfy texture and the irregular collar that makes quite a statement!\r\nAvailable at an irregularly low price of BDT 800\r\nMeasurements (in inches):\r\nSmall: Length: 27 | Chest: 38\r');";
if($con->query($sql)){
	echo 'Data inserted into products successfully.<br>';
}

$sql="CREATE TABLE `blog` (
  `blog_id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `b_title` text NOT NULL,
  `b_name` text NOT NULL,
  `b_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `b_blog` varchar(1000) NOT NULL,
  `b_image` varchar(255) NOT NULL,
  `b_approval` varchar(20) NOT NULL DEFAULT 'Not approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
if($con->query($sql)){
	echo 'Table blog created successfully<br>';
}

$sql= "INSERT INTO `blog` (`blog_id`, `b_title`, `b_name`, `b_time`, `b_blog`, `b_image`, `b_approval`) VALUES
(2, 'BRINGING BACK A REEBOK CLASSIC THIS SUMMERâ€¦ THE CLUB C-85 VINTAGE SNEAKER', 'Meheraj Hossain', '2019-10-26 19:31:02', 'For as long as I can remember, I love to wear sneakers with dresses more than anything in the world. And as Iâ€™m writing this article, Iâ€™m sitting behind my laptop outside at the pool, wearing my new Reebok Club C-85 Vintage sneaker with a long floral linen dress. Heaven! In fact, the Reebok Club C-85 Vintage sneakers are a favorite in our household; Thomas and James were the first to own a pair, and now finally I have my own pair! Needless to say, Stella is asking for a pair now tooâ€¦', 'IMG_6165.jpg', 'Approve'),
(3, 'ELIE SAAB HAUTE COUTURE', 'Fahim Hayder', '2019-10-26 19:34:09', 'Right off the plane from New York, straight to Elie Saab Haute Couture Fall 2015 in Paris. This clearly explains my sleepy head, hence the beautifully distracting bright yellow Chloe dress. I wish Parisâ€™ heat wave was still going on that day, as I prepared to go all-yellow, but the denim jacket was a necessity, it was cold. The show? More about that laterâ€¦\r\n\r\n\r\nThanks to the great street style photographers out there, who completely overwhelmed me with this photos moment â€“ I have to learn to get my game face on and not look so unblushingly surprised every time this happensâ€¦ Anyway they look slightly awkward, but Iâ€™m still in love with these shots!', 'Girl-With-Curves-FW-2019-Collection-Coming-Soon-trench-clothing-.jpg', 'Approve');";
if($con->query($sql)){
	echo 'Data inserted into blog successfully.<br>';
}

$sql="CREATE TABLE `comment` (
  `comment_id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `comment` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

if($con->query($sql)){
	echo 'Table comment created successfully<br>';
}

$sql= "INSERT INTO `comment` (`comment_id`, `comment`, `user_id`, `username`, `blog_id`) VALUES
(1, 'Nice one', 1, 'admin', 1),
(2, 'Nice blog', 1, 'admin', 2);";
if($con->query($sql)){
	echo 'Data inserted into comment successfully.<br>';
}

$sql="CREATE TABLE `review` (
  `review_id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `review` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
if($con->query($sql)){
	echo 'Table blog review successfully<br>';
}

$sql= "INSERT INTO `review` (`review_id`, `review`, `user_id`, `username`, `product_id`) VALUES
(1, 'Nice ', 2, 'Meheraj', 1);";
if($con->query($sql)){
	echo 'Data inserted into review successfully.<br>';
}

$sql="CREATE TABLE `contact` (
  `msg_id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `m_email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `msg_sub` text NOT NULL,
  `c_msg` varchar(500) NOT NULL,
  `m_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
if($con->query($sql)){
	echo 'Table contact created successfully<br>';
}

$sql= "INSERT INTO `contact` (`msg_id`, `f_name`, `l_name`, `m_email`, `number`, `msg_sub`, `c_msg`, `m_time`) VALUES
(1, 'Miraj', 'Hossain', 'miraj@gmail.com', '01875781788', 'About getting reply', 'why do not you reply?', '2019-10-26 20:06:18'),
(2, 'sadf', 'saf', 'sadf@gmail.com', '01875781788', 'saf', 'safasf', '2019-10-26 20:30:57');";
if($con->query($sql)){
	echo 'Data inserted into contact successfully.<br>';
}

$sql="CREATE TABLE `order_details` (
  `order_details_id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `order_id` varchar(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_address` varchar(255) NOT NULL,
  `cont_number` varchar(255) NOT NULL,
  `cust_city` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `c_amount` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
if($con->query($sql)){
	echo 'Table order_details created successfully<br>';
}
$sql= "INSERT INTO `order_details` (`order_details_id`, `order_id`, `cust_name`, `cust_address`, `cont_number`, `cust_city`, `order_date`, `c_amount`) VALUES
(1, 'O957189', 'Meheraj', '74/C,kollyanpur', '01760762046', 'Dhaka', '2019-10-27 13:26:05', '3000');";
if($con->query($sql)){
  echo 'Data inserted into order_details successfully.<br>';
}

$sql="CREATE TABLE `cart` (
  `cart_id` int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `product_id` int(10) NOT NULL,
  `p_quantity` int(5) NOT NULL,
  `p_title` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `order_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
if($con->query($sql)){
	echo 'Table cart created successfully<br>';
}
$sql= "INSERT INTO `cart` (`cart_id`, `product_id`, `p_quantity`, `p_title`, `session_id`, `order_id`) VALUES
(5, 13, 2, 'Pink Ready to Wear Lehenga & Blouse with Dupatta', 'jkq3uaiekgcvhor5d2i1pmgqtn', 'O957189');";
if($con->query($sql)){
  echo 'Data inserted into cart successfully.<br>';
}