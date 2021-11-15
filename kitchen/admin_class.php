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
					$_SESSION['kit_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}
	function login2(){
		
		extract($_POST);		
		$qry = $this->db->query("SELECT * FROM complainants where email = '".$email."' and password = '".md5($password)."' ");
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


	function save_user(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		if(!empty($password))
		$data .= ", password = '".md5($password)."' ";
		$data .= ", type = '$type' ";
		if($type == 1)
			$establishment_id = 0;
		$data .= ", establishment_id = '$establishment_id' ";
		$chk = $this->db->query("Select * from users where username = '$username' and id !='$id' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set ".$data);
		}else{
			$save = $this->db->query("UPDATE users set ".$data." where id = ".$id);
		}
		if($save){
			return 1;
		}
	}
	function delete_user(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM users where id = ".$id);
		if($delete)
			return 1;
	}
	function signup(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", email = '$email' ";
		$data .= ", address = '$address' ";
		$data .= ", contact = '$contact' ";
		$data .= ", password = '".md5($password)."' ";
		$chk = $this->db->query("SELECT * from complainants where email ='$email' ".(!empty($id) ? " and id != '$id' " : ''))->num_rows;
		if($chk > 0){
			return 3;
			exit;
		}
		if(empty($id))
			$save = $this->db->query("INSERT INTO complainants set $data");
		else
			$save = $this->db->query("UPDATE complainants set $data where id=$id ");
		if($save){
			if(empty($id))
				$id = $this->db->insert_id;
				$qry = $this->db->query("SELECT * FROM complainants where id = $id ");
				if($qry->num_rows > 0){
					foreach ($qry->fetch_array() as $key => $value) {
						if($key != 'password' && !is_numeric($key))
							$_SESSION['login_'.$key] = $value;
					}
						return 1;
				}else{
					return 3;
				}
		}
	}
	function update_account(){
		extract($_POST);
		$data = " name = '".$firstname.' '.$lastname."' ";
		$data .= ", username = '$email' ";
		if(!empty($password))
		$data .= ", password = '".md5($password)."' ";
		$chk = $this->db->query("SELECT * FROM users where username = '$email' and id != '{$_SESSION['login_id']}' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
			$save = $this->db->query("UPDATE users set $data where id = '{$_SESSION['login_id']}' ");
		if($save){
			$data = '';
			foreach($_POST as $k => $v){
				if($k =='password')
					continue;
				if(empty($data) && !is_numeric($k) )
					$data = " $k = '$v' ";
				else
					$data .= ", $k = '$v' ";
			}
			if($_FILES['img']['tmp_name'] != ''){
							$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
							$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
							$data .= ", avatar = '$fname' ";

			}
			$save_alumni = $this->db->query("UPDATE alumnus_bio set $data where id = '{$_SESSION['bio']['id']}' ");
			if($data){
				foreach ($_SESSION as $key => $value) {
					unset($_SESSION[$key]);
				}
				$login = $this->login2();
				if($login)
				return 1;
			}
		}
	}

	function save_settings(){
		extract($_POST);
		$data = " name = '".str_replace("'","&#x2019;",$name)."' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", about_content = '".htmlentities(str_replace("'","&#x2019;",$about))."' ";
		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
					$data .= ", cover_img = '$fname' ";

		}
		
		// echo "INSERT INTO system_settings set ".$data;
		$chk = $this->db->query("SELECT * FROM system_settings");
		if($chk->num_rows > 0){
			$save = $this->db->query("UPDATE system_settings set ".$data);
		}else{
			$save = $this->db->query("INSERT INTO system_settings set ".$data);
		}
		if($save){
		$query = $this->db->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['system'][$key] = $value;
		}

			return 1;
				}
	}
	function save_course(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','fid','type','amount')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM courses where course ='$course' and level ='$level' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO courses set $data");
			if($save){
				$id = $this->db->insert_id;
				foreach($fid as $k =>$v){
					$data = " course_id = '$id' ";
					$data .= ", description = '{$type[$k]}' ";
					$data .= ", amount = '{$amount[$k]}' ";
					$save2[] = $this->db->query("INSERT INTO fees set $data");
				}
				if(isset($save2))
						return 1;
			}
		}else{
			$save = $this->db->query("UPDATE courses set $data where id = $id");
			if($save){
				$this->db->query("DELETE FROM fees where course_id = $id and id not in (".implode(',',$fid).") ");
				foreach($fid as $k =>$v){
					$data = " course_id = '$id' ";
					$data .= ", description = '{$type[$k]}' ";
					$data .= ", amount = '{$amount[$k]}' ";
					if(empty($v)){
						$save2[] = $this->db->query("INSERT INTO fees set $data");
					}else{
						$save2[] = $this->db->query("UPDATE fees set $data where id = $v");
					}
				}
				if(isset($save2))
						return 1;
			}
		}

	}
	function delete_course(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM courses where id = ".$id);
		$delete2 = $this->db->query("DELETE FROM fees where course_id = ".$id);
		if($delete && $delete2){
			return 1;
		}
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

//update_list_status


function update_list_status(){
	extract($_POST);
	$save = $this->db->query("UPDATE `food_items` SET `available` = '$status' WHERE `id`= ".$id);
	if($save){
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
$check = $this->db->query("SELECT  * FROM `admin` WHERE  `admin_password` = '$password' AND `id`='2' ")->fetch_object()->admin_password;
if($check == $password){
	return 2;
			exit;
		}
		
else
	{
	   $save = $this->db->query("UPDATE `admin` SET `admin_password`='$password2' AND `id`='2' ");
	   return 1;
	   exit;
	}

	
}

//forget_password()



function forget_password(){
	extract($_POST);
$check = $this->db->query("SELECT  * FROM `admin`  WHERE  `admin_email` = '$email' ")->fetch_object()->admin_email;
if($check == $email){
    
    
     $save = $this->db->query("UPDATE `admin` SET `admin_password`='$password'");
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
	$save = $this->db->query("INSERT INTO `room`(`id`, `name`, `phone`, `address`, `price`, `checkin`, `checkout`, `roomno`) VALUES ('','$name','$phone','$address','$cost','$checkin','$checkout','$room')");
	if($save){
		return 1;
	}
}












	function save_fees(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id')) && !is_numeric($k)){
				if($k == 'total_fee'){
					$v = str_replace(',', '', $v);
				}
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM student_ef_list where ef_no ='$ef_no' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO student_ef_list set $data");
		}else{
			$save = $this->db->query("UPDATE student_ef_list set $data where id = $id");
		}
		if($save)
			return 1;
	}
	function delete_fees(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM student_ef_list where id = ".$id);
		if($delete){
			return 1;
		}
	}
	function save_payment(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id')) && !is_numeric($k)){
				if($k == 'amount'){
					$v = str_replace(',', '', $v);
				}
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO payments set $data");
			if($save)
				$id= $this->db->insert_id;
		}else{
			$save = $this->db->query("UPDATE payments set $data where id = $id");
		}
		if($save)
			return json_encode(array('ef_id'=>$ef_id, 'pid'=>$id,'status'=>1));
	}
	function delete_payment(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM payments where id = ".$id);
		if($delete){
			return 1;
		}
	}
}