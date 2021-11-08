<?php
include"include/link.php";
date_default_timezone_set('Asia/Kolkata');
$items=$_POST['items'];
//converting json object to php associative array
$data = json_decode($items, true);
$data = str_replace("[", "", $data);
$data = str_replace("]", "", $data);

$data1 = json_decode($items, true);
$data1 = str_replace("[", "", $data1);
$data1 = str_replace("]", "", $data1);
$ordering_type=$_POST['ordering-type'];
$pay_via =$_POST['pay_via'];
$name=$_POST['name'];

//Decripting Room Number
$table= $_POST['table'];
$encrypt_method = "AES-256-CBC";
    $secret_key = 'SUMANGHORAI'; // user define private key
    $secret_iv = 's1f4r8p9'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo    
    $decrypted = openssl_decrypt(base64_decode($table), $encrypt_method, $key, 0, $iv);

    $table=  $decrypted;






$phone_number= $_POST['phone-number'];
$address=$_POST['address'];
$message =$_POST['message'];
$action=$_POST['action'];
$total=0;
// processing total Amount Order
foreach ($data as $row) {
  
    $price = $row['item_price'];
    $unit = $row['quantity'];
    $total=($price*$unit)+$total;
}

$data=date('d-m-Y H:i');
// preparing statement for insert query
$sql="INSERT INTO `order_details`(`id`, `name`, `phone`, `message`, `roomno`, `total`, `status`,`order_status`,`mark`, `timeoforder`,`paid`) VALUES ('','$name','$phone_number','$message','$table','$total','1','0','1','$data','0')";
mysqli_query($conn,$sql);
$last_id = mysqli_insert_id($conn);


// processing total Amount Order
foreach ($data1 as $row1) {
     
     $food = $row1['item_name'];
     $price = $row1['item_price'];
     $unit = $row1['quantity'];
   // preparing statement for insert query
     $sql="INSERT INTO `order_content`(`id`, `oid`, `food`, `price`, `unit`) VALUES ('','$last_id','$food','$price','$unit')";
     mysqli_query($conn,$sql);
     
 }


 $value = array(
        "success"=>true,
        "message"=>"",
       "whatsapp_url"=>"" );
       
    // Use json_encode() function
   $json = json_encode($value);
   
echo $json;









?>