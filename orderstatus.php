<?php 
include "include/link.php";
date_default_timezone_set('Asia/Kolkata');
$date= date('d-m-Y H:i');
$action = $_GET['action'];

if($action=='accept')
{
    extract($_POST);

$sql="UPDATE `order_details` SET `order_status`='2',`timeofapprove`='$date' WHERE `id`='$id' ";
$qry = mysqli_query($conn,$sql);
return 1;

}

if($action=='Cancel')
{
    extract($_POST);
    $sql="UPDATE `order_details` SET `order_status`='4' ,`timeofdelivery`='$date' WHERE `id`='$id' ";
    $qry = mysqli_query($conn,$sql);
    return 1;

}

?>


