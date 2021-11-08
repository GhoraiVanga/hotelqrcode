<?php
error_reporting(0);
include('libs/phpqrcode/qrlib.php'); 
include("db_connect.php");



if(isset($_POST['submit']) ) {
	$tempDir = 'QRCODE/'; 
	$room = $_POST['room'];
	$link=  $_POST['link'];
	$filename =$room;
  //$codeContents =$link;

  //encripted Id 

  $string = $room ;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'SUMANGHORAI'; // user define private key
    $secret_iv = 's1f4r8p9'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $encrypted = base64_encode($output);
    $id="?room_no=";
    $codeContents=$link ."".$id."".$encrypted ; 




  $qry = $conn->query("SELECT * FROM `qrcode`  WHERE `room`= '$room'");
  $total=$qry->num_rows > 0;
  if($total > 0)
  {
    $qry = $conn->query("UPDATE `qrcode` SET `url`='$codeContents' WHERE `room`='$room'");
    
  }
  else{

    $qry = $conn->query("INSERT INTO `qrcode`(`id`, `url`, `status`, `room`) VALUES ('','$codeContents','1','$room')");
  }
	
	  
     QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
}
?>

<div class="row">
          <div class="col-md-6">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <div class=" user-block d-inline-flex">
                <i class='fas fa-qrcode' style='font-size:30px;color:red'></i>
                  <span class="username"><a href="#">QRCODE GENERATE FROM</a></span>
                  
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
              
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
              
                </div>

               <!-- Card Body -->
            <div class="card-body">
                <form method="post" action="index.php?page=qrcode">
				
                <div class="form-group">
				
						<input type="number" class="form-control" name="room" style="width:20em;" placeholder="Enter your room no" value="<?php echo @$number; ?>" required />
					</div>
					<div class="form-group">
                   <textarea rows="15" cols="30" type="text" class="form-control" name="link" style="width:20em;" value="https://wekartlab.in/ADDONS/HOTELDEMO/"  readonly>https://wekartlab.in/ADDONS/HOTELDEMO/</textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-danger submitBtn" style="width:20em; margin:0;" />
					</div>
				</form>
            </div>


        </div>
            
            
          </div>
</div>
          <!-- /.col -->
          <div class="col-md-6">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <div class="user-block d-inline-flex">
               <i class='fas fa-download' style='font-size:30px;color:red'></i>
                  <span class="username"><a href="#">DOWNLOAD QRCODE</a></span>
                  
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
            
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
              
                </div>
                <!-- /.card-tools -->
              </div>

    <!-- Card Body -->
    <div class="card-body">

	<div class="qr-field">
				<h2 style="text-align:center">QR Code Result: </h2>
				<center>
					<div class="qrframe" style="border:2px solid white; width:210px; height:385px;">
							<?php echo '<img src="QRCODE/'. @$filename.'.png" style="width:200px; height:200px;"><br>'; ?>
					</div>
					<a class="btn btn-default submitBtn" style="width:210px; margin:5px 0;" href="download.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
				</center>
			</div>


    </div>



            
            </div>





            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>


    