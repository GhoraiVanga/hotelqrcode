<?php
ob_start();

$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();
if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'login2'){
	$login = $crud->login2();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$save = $crud->logout();
	if($save)
		echo $save;
}
if($action == 'logout2'){
	$logout = $crud->logout2();
	if($logout)
		echo $logout;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}
if($action == 'signup'){
	$save = $crud->signup();
	if($save)
		echo $save;
}
if($action == 'update_account'){
	$save = $crud->update_account();
	if($save)
		echo $save;
}
if($action == "save_settings"){
	$save = $crud->save_settings();
	if($save)
		echo $save;
}
if($action == "save_course"){
	$save = $crud->save_course();
	if($save)
		echo $save;
}
//Working Part
if($action == "delete_category"){
	$delete = $crud->delete_category();
	if($delete)
		echo $delete;
}

if($action == "delete_hotel"){
	$delete = $crud->delete_hotel();
	if($delete)
		echo $delete;
}


if($action == "delete_info_img"){
	$delete = $crud->delete_info_img();
	if($delete)
		echo $delete;
}
//Order Change
if($action == "mark_order"){
	$save = $crud->mark_order();
	if($save)
		echo $save;
}

//Delete Order delete_order

if($action == "delete_order"){
	$delete = $crud->delete_order();
	if($delete)
		echo $delete;
}

//update_order_status

if($action == "update_order_status"){
	$save = $crud->update_order_status();
	if($save)
		echo $save;
}


//update_payment_status

if($action == "update_payment_status"){
	$save = $crud->update_payment_status();
	if($save)
		echo $save;
}




//update link 

if($action == "update_link_status"){
	$save = $crud->update_link_status();
	if($save)
		echo $save;
}

//delete Qrcode delete_qrcode

if($action == "delete_qrcode"){
	$delete = $crud->delete_qrcode();
	if($delete)
		echo $delete;
}


if($action == "save_category"){
	$save = $crud->save_category();
	if($save)
		echo $save;
}

if($action == "save_food"){
	$save = $crud->save_food();
	if($save)
		echo $save;
}

if($action == "save_info"){
	$save = $crud->save_info();
	if($save)
		echo $save;
}

if($action == "delete_food"){
	$delete = $crud->delete_food();
	if($delete)
		echo $delete;
}

//Delete Images

if($action == "delete_img"){
	$delete = $crud->delete_img();
	if($delete)
		echo $delete;
}


if($action == "total_order"){
	$save = $crud->total_order();
	if($save)
	   echo $save;
}


//payment_success

if($action == "payment_success"){
	$save = $crud->payment_success();
	if($save)
	   echo $save;
}

//change_password()

if($action == "change_password"){
	$save = $crud->change_password();
	if($save)
		echo $save;
}

//Forget Password  forget_password

if($action == "forget_password"){
	$save = $crud->forget_password();
	if($save)
		echo $save;
}


//save_roominvoice


if($action == "save_roominvoice"){
	$save = $crud->save_roominvoice();
	if($save)
		echo $save;
}


//change_cookpassword



if($action == "change_cookpassword"){
	$save = $crud->change_cookpassword();
	if($save)
		echo $save;
}





if($action == "delete_fees"){
	$delete = $crud->delete_fees();
	if($delete)
		echo $delete;
}
if($action == "save_payment"){
	$save = $crud->save_payment();
	if($save)
		echo $save;
}
if($action == "delete_payment"){
	$delete = $crud->delete_payment();
	if($delete)
		echo $delete;
}
ob_end_flush();
?>
