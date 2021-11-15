<?php
include('db_connect.php');
$qry = $conn->query("SELECT COUNT(*) FROM `order_details` order by unix_timestamp(`timeoforder`) desc ");
$rows= mysqli_fetch_row($qry);
 $total=$rows[0];

$arr=array("sound"=>"$total");
echo json_encode($arr);
?>