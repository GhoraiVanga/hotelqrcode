<?php
session_start();
ini_set('display_errors', 1);
date_default_timezone_set('Asia/Kolkata');
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
        
		extract($_POST);		
		$qry = $this->db->query("SELECT * FROM `admin` where `admin_name` = '$username' AND `admin_password` = '$password' ");
		if($qry->num_rows > 0){
	foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}

	
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		//header("location:login.php");
		return 1;
	}

//Menu Category 
	function save_category(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM `food_category` where `category_name` ='$category_name' ".(!empty($id) ? " and id != '$id' " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO `food_category`(`id`, `category_name`, `description`, `status`) VALUES ('','$category_name','$description','1')");
		}else{
			$save = $this->db->query("UPDATE `food_category` set `category_name`='$category_name',`description`='$description',`status`='$status' WHERE  `id` = '$id'");
		}
		if($save)
			return 1;
	}

	function delete_category(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM `food_category` where id = ".$id);
		if($delete){
			return 1;
		}
	}


//Food

function save_food(){
	extract($_POST);
	$data = "";
	foreach($_POST as $k => $v){
		if(!in_array($k, array('id')) && !is_numeric($k)){
			if(empty($data)){
				$data .= " $k='$v' ";
			}else{
				$data .= ", $k='$v' ";
			}
		}
	}
  if($_FILES['img']['tmp_name'] != ''){
		$fname = $_FILES['img']['name'];
		$move = move_uploaded_file($_FILES['img']['tmp_name'],'menu/'. $fname);
	   

} 
   $check = $this->db->query("SELECT * FROM `food_items` where `title` ='$title' ".(!empty($id) ? " and id != '$id' " : ''))->num_rows;
	if($check > 0){
		return 2;
		exit;
	}
	if(empty($id)){
		$save = $this->db->query("INSERT INTO `food_items`(`id`, `fcid`, `title`, `description`, `type`, `price`, `photo`, `status`, `available`, `extras`) VALUES ('','$fcid','$title','$description','$type','$price','$fname','$status','$available','777')");
	}else{
		$save = $this->db->query("UPDATE `food_items` SET `fcid`='$fcid',`title`='$title',`description`='$description',`type`='$type',`price`='$price',`status`='$status',`available`='$available' WHERE `id`='$id' ");
		if(!empty($fname))
		{
			$sqlimg ="UPDATE `food_items` SET `photo`='$fname'  where `id` = '$id' ";
		    $save = $this->db->query($sqlimg);
		}
	}
	if($save)
		return 1;
}

//hotel info

function save_info(){
	extract($_POST);
	$data = "";
	foreach($_POST as $k => $v){
		if(!in_array($k, array('id')) && !is_numeric($k)){
			if(empty($data)){
				$data .= " $k='$v' ";
			}else{
				$data .= ", $k='$v' ";
			}
		}
	}
  if($_FILES['img']['tmp_name'] != ''){
		$fname = $_FILES['img']['name'];
		$move = move_uploaded_file($_FILES['img']['tmp_name'],'menu/'. $fname);
	   

} 
   
	if(empty($id)){
		$save = $this->db->query("INSERT INTO `hotel_info` (`id`, `name`, `tagline`, `address`, `working_hours`, `email`, `phone`, `photo`) VALUES ('','$name', '$tagline', '$address', '$working_hours', '$email', '$phone', '$fname')");
	}else{
		$save = $this->db->query("UPDATE `hotel_info` SET `name`='$name',`tagline`='$tagline',`address`='$address',`working_hours`='$working_hours',`email`='$email',`phone`='$phone' WHERE `id`='$id' ");
		if(!empty($fname))
		{
			$sqlimg ="UPDATE `hotel_info` SET `photo`='$fname'  where `id` = '$id' ";
		    $save = $this->db->query($sqlimg);
		}
	}
	if($save)
		return 1;
}


//Delete Hotel
function delete_hotel(){
	extract($_POST);
	$delete = $this->db->query("DELETE FROM `hotel_info` where id = ".$id);
	if($delete){
		return 1;
	}
}

//Delete Hotel Images 


function delete_info_img(){
	extract($_POST);
	$delete = $this->db->query("UPDATE `hotel_info` SET `photo`='' WHERE `id`= ".$id);
	if($delete){
		return 1;
	}
}



//Food Delete
function delete_food(){
	extract($_POST);
	$delete = $this->db->query("DELETE FROM `food_items` where id = ".$id);
	if($delete){
		return 1;
	}
}


//delete Images

function delete_img(){
	extract($_POST);
	$delete = $this->db->query("UPDATE `food_items` SET `photo`='' WHERE `id`= ".$id);
	if($delete){
		return 1;
	}
}

//Total Order

function total_order(){
	extract($_POST);
	$order = $this->db->query("SELECT * FROM `order_details` ");
	if($order){
		//return 1;
		return json_encode($order);
	}
}

//Order Related  Function
function mark_order(){
	extract($_POST);
	$order = $this->db->query("UPDATE `order_details` SET `mark` = '0' WHERE `id`= ".$id);
	if($order){
		return 1;
		//return json_encode($order);
	}
}

//delete_order()

//Food Delete
function delete_order(){
  
	extract($_POST);
	$delete = $this->db->query("DELETE FROM `order_details` where id = ".$id);
	$delete = $this->db->query("DELETE FROM `order_content` where `oid` = ".$id);
	if($delete){
		return 1;
	}
}

//update_order_status

function update_order_status(){
    $date= date('d-m-Y H:i');
	extract($_POST);
	$order = $this->db->query("UPDATE `order_details` SET `order_status` = '$status' WHERE `id`= ".$id);
	if($status=='2')
	{
	    $order = $this->db->query("UPDATE `order_details` SET `timeofapprove` = '$date' WHERE `id`= ".$id);
	}
	
	if($status=='4')
	{
	    $order = $this->db->query("UPDATE `order_details` SET `timeofapprove` = '$date' WHERE `id`= ".$id);
	}
	
	
	 if($status=='3')
	{
	    $order = $this->db->query("UPDATE `order_details` SET `timeofdelivery` = '$date' WHERE `id`= ".$id);
	    $order = $this->db->query("UPDATE `order_details` SET `mark` = '0' WHERE `id`= ".$id);
	}
	

	if($order){
		return 1;
		//return json_encode($order);
	}
}

//update_payment_status



function update_payment_status(){
	extract($_POST);
	$payment = $this->db->query("UPDATE `order_details` SET `paid` = '$paid' WHERE `id`= ".$id);
	if($payment){
		return 1;
		//return json_encode($order);
	}
}


//update link 


function update_link_status(){
	extract($_POST);
	$order = $this->db->query("UPDATE `qrcode` SET  `status` = '$status' WHERE `id`= ".$id);
	if($order){
		return 1;
		//return json_encode($order);
	}
}

//delete Qrcode delete_qrcode

function delete_qrcode(){
	extract($_POST);
	$delete = $this->db->query("DELETE FROM `qrcode` where id = ".$id);
	
	if($delete){
		return 1;
	}
}


//payment_success()

function payment_success(){
	extract($_POST);
	$date= date('d-m-Y H:i');
	$date1=date('H:i');
//	$invoiceid=$date1. "-".$id;
   $room=$id;
//$qry = $this->db->query("SELECT * FROM `order_details` WHERE roomno='$room' AND `paid`='0' ");
	//	if($qry->num_rows > 0){
		//	foreach ($qry->fetch_array() as $key => $value) { 
			    
//	$save = $this->db->query("INSERT INTO `invoice` (`id`, `invoiceid`, `roomno`, `customaername`, `phnumber`, `datetime`, `subtotal`, `cgst`, `sgst`, `total`, `oid`) VALUES ('','','$room','{$name[$key]}','','','','','','','')");		    
			
		//	}
		
		
$qry = $this->db->query("SELECT * FROM `order_details` WHERE roomno='$room' AND `paid` ='0' ");
$rows = array();
while($row = $qry->fetch_array() )
    $rows[] = $row;
foreach($rows as $row){ 
  	
  	$oid.=$row[id].",";
  	$total12=$total12+$row[total];
}	
  	
 $save = $this->db->query("INSERT INTO `invoice` (`id`, `roomno`, `customaername`, `phnumber`, `datetime`, `total`,`oid`) VALUES ('','$room','$name','$address','$row[timeoforder]','$total12','$oid')");		    
	
		
		
$save = $this->db->query("UPDATE `order_details` SET `paid`='1' WHERE  `roomno`=".$id);
	
//	if($save){
		return 1;
//	}
}



//change_password()

function change_password(){
extract($_POST);
$check = $this->db->query("SELECT  admin_password FROM admin WHERE  admin_password = '$password1' AND `id` = '1' ")->fetch_object()->admin_password;
if($check == $password){
	return 2;
       exit;
		}
		else
	{
	   $save = $this->db->query("UPDATE `admin` SET `admin_password`='$password2' WHERE `id`='1' ");
	   return 1;
	   exit;
	}
}

//forget_password()

function forget_password(){
	extract($_POST);
$check = $this->db->query("SELECT  * FROM `admin`  WHERE  `admin_email` = '$email' AND `id` = '1' ")->fetch_object()->admin_email;
if($check == $email){
$newpassword = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 8);    
$save = $this->db->query("UPDATE `admin` SET `admin_password`='$newpassword'  WHERE  `id` = '1'   ");
$to = $email;
$subject = "New Password";
$txt = "Please Change Password From Admin Panel and Your New auto Generate password is  ".$newpassword;

mail($to,$subject,$txt);
      
      
      
	   return 1;
	   exit;

		}
		
else
	{
	  	return 2;
			exit;
	}

	
}




//save_roominvoice()

function save_roominvoice(){
	extract($_POST);
	$save = $this->db->query("INSERT INTO `room`(`id`, `name`, `phone`, `address`, `price`, `checkin`, `checkout`, `roomno`,`roomtype`) VALUES ('','$name','$phone','$address','$cost','$checkin','$checkout','$room','$roomtype')");
	if($save){
		return 1;
	}
}

//change_cookpassword

function change_cookpassword(){
extract($_POST);

	   $save = $this->db->query("UPDATE `admin` SET `admin_password`='$password2' WHERE `id`='2' ");
	   return 1;
	   exit;
	
}

}